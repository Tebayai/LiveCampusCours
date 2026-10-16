const priceContainer = document.querySelector('#Price-container');
const priceCryptos = document.querySelector('#price-cryptos');
const currencySelect = document.querySelector('#currency-select');
const currencySymbols = {EUR: '€', USD: '$'};
const textCryptosResponse = result => `Prix d'achat du ${result.crypto} en ${result.currency} : ${result.price}${currencySymbols[result.currency]}`;
const updateInterval = 60000;

/* Affichage du loader pendant la récupération du prix */
const showLoader = element =>{
    element.textContent = 'Chargement...';
    element.className = 'loading';
};

/* Affichage de la variation des prix vert=>Monte rouge=>Baisse gris=>Stable */
let previousPrices = {};

function previousPrice(crypto, currentPrice) {
    currentPrice = Number(currentPrice);
    const lastPrice = previousPrices[crypto];
    previousPrices[crypto] = currentPrice;
    if (lastPrice === undefined) return 'gris';
    if (currentPrice > lastPrice) return 'vert';
    if (currentPrice < lastPrice) return 'rouge';
    return 'gris';
}

/* Fetch unique crypto */
const fetchPrices = crypto =>{
    const currency = currencySelect.value;
    return fetch(`https://api.coinbase.com/v2/prices/${crypto}-${currency}/buy`)
        .then(response =>{
            if(!response.ok){
                throw new Error('Erreur Coinbase api');
            }
            return response.json();
        })
        .then(data =>{
            const price = data.data.amount;
            return {crypto: crypto, price, currency};
        });
};

/* Graphique d'évolution : barres proportionnelles au prix, colorées selon la tendance */
const chartTitle = document.querySelector('#chart-title');
const priceChart = document.querySelector('#price-chart');
const chartRange = document.querySelector('#chart-range');
const maxChartPoints = 20;
let chartPrices = [];

const renderChart = () =>{
    const min = Math.min(...chartPrices);
    const max = Math.max(...chartPrices);
    const symbol = currencySymbols[currencySelect.value];
    priceChart.innerHTML = chartPrices.map((price, i) =>{
        const height = max === min ? 100 : 10 + 90 * (price - min) / (max - min);
        const before = chartPrices[i - 1];
        const trend = before === undefined || price === before ? 'gris' : price > before ? 'vert' : 'rouge';
        return `<div class="chart-bar ${trend}" style="height: ${height}%" title="${price}${symbol}"></div>`;
    }).join('');
    chartRange.textContent = `Min : ${min}${symbol} · Max : ${max}${symbol}`;
};

const addChartPoint = (crypto, price) =>{
    chartTitle.textContent = `Évolution du ${crypto} en ${currencySelect.value}`;
    chartPrices.push(Number(price));
    if (chartPrices.length > maxChartPoints) chartPrices.shift();
    renderChart();
};

const resetChart = () =>{
    chartPrices = [];
    priceChart.innerHTML = '';
    chartRange.textContent = '';
};

/* Récupérer le prix du BTC */
const fetchBTCPrice = () =>{
    showLoader(priceContainer);
    fetchPrices('BTC')
        .then(result =>{
            priceContainer.textContent = textCryptosResponse(result);
            priceContainer.className = previousPrice('single-BTC', result.price);
            // Le graphique suit le BTC tant qu'aucune crypto n'a été choisie
            if (!intervalId) addChartPoint('BTC', result.price);
        })
        .catch(error =>{
            priceContainer.textContent = 'Erreur';
            priceContainer.className = '';
        });
};

fetchBTCPrice();
setInterval(fetchBTCPrice, updateInterval);

/* Récupérer les prix des 6 cryptos */
const cryptos = ['BTC', 'ETH', 'ADA', 'DOT', 'CRO', 'MATIC'];

const updateAllPrices = () =>{
    priceCryptos.innerHTML = '<li class="loading">Chargement...</li>';
    Promise.all(cryptos.map(fetchPrices))
        .then(results =>{
            priceCryptos.innerHTML = results.map(result =>
                `<li class="${previousPrice(`list-${result.crypto}`, result.price)}">${textCryptosResponse(result)}</li>`
            ).join('');
        })
        .catch(error =>{
            priceCryptos.textContent = 'Erreur';
        });
};

updateAllPrices();
setInterval(updateAllPrices, updateInterval);

/* Récupérer le prix de la crypto select */
const cryptoSelect = document.querySelector('#crypto-select');
const selectedCryptoPrice = document.querySelector('#selected-crypto-price');
const selectedHistoryContainer = document.querySelector('.selected-history');

let intervalId;

const updateSelectedPrice = selectedCrypto =>{
    showLoader(selectedCryptoPrice);
    fetchPrices(selectedCrypto)
        .then(result =>{
            const lastPrice = previousPrices[`select-${result.crypto}`];
            const trend = previousPrice(`select-${result.crypto}`, result.price);
            selectedCryptoPrice.textContent = textCryptosResponse(result);
            selectedCryptoPrice.className = trend;
            addChartPoint(result.crypto, result.price);
            if (lastPrice !== undefined) {
                selectedHistoryContainer.innerHTML += `<li>Ancien prix : ${lastPrice}${currencySymbols[result.currency]}</li>`;
            }
        })
        .catch(error =>{
            selectedCryptoPrice.textContent = 'Erreur';
            selectedCryptoPrice.className = '';
        });
};

cryptoSelect.addEventListener('change', () => {
    const selectedCrypto = cryptoSelect.value;
    clearInterval(intervalId);
    selectedHistoryContainer.innerHTML = '';
    resetChart();
    updateSelectedPrice(selectedCrypto);
    intervalId = setInterval(() => updateSelectedPrice(selectedCrypto), updateInterval);
});

/* Changement de devise EUR/USD */
currencySelect.addEventListener('change', () => {
    previousPrices = {};
    resetChart();
    fetchBTCPrice();
    updateAllPrices();
    if (intervalId) {
        selectedHistoryContainer.innerHTML = '';
        updateSelectedPrice(cryptoSelect.value);
    }
});
