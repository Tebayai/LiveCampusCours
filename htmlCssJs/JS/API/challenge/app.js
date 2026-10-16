const priceContainer = document.querySelector('#Price-container');
const priceCryptos = document.querySelector('#price-cryptos');
const textCryptosResponse = result => `Prix d'achat du ${result.crypto} en EUR : ${result.price}€`;
const updateInterval = 60000;

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
const fetchPrices = crypto =>
    fetch(`https://api.coinbase.com/v2/prices/${crypto}-EUR/buy`)
        .then(response =>{
            if(!response.ok){
                throw new Error('Erreur Coinbase api');
            }
            return response.json();
        })
        .then(data =>{
            const price = data.data.amount;
            return {crypto: crypto, price};
        });

/* Récupérer le prix du BTC en euro */
const fetchBTCPrice = () =>
    fetchPrices('BTC')
        .then(result =>{
            priceContainer.textContent = `Prix d'achat du BTC en EUR : ${result.price}€`;
            priceContainer.className = previousPrice('single-BTC', result.price);
        })
        .catch(error =>{
            priceContainer.textContent = 'Erreur';
        });

fetchBTCPrice();
setInterval(fetchBTCPrice, updateInterval);

/* Récupérer les prix des 6 cryptos en euro */
const cryptos = ['BTC', 'ETH', 'ADA', 'DOT', 'CRO', 'MATIC'];

const updateAllPrices = () =>
    Promise.all(cryptos.map(fetchPrices))
        .then(results =>{
            priceCryptos.innerHTML = results.map(result =>
                `<li class="${previousPrice(`list-${result.crypto}`, result.price)}">${textCryptosResponse(result)}</li>`
            ).join('');
        })
        .catch(error =>{
            priceCryptos.textContent = 'Erreur';
        });

updateAllPrices();
setInterval(updateAllPrices, updateInterval);

/* Récupérer le prix de la crypto select */
const cryptoSelect = document.querySelector('#crypto-select');
const selectedCryptoPrice = document.querySelector('#selected-crypto-price');

let intervalId;

const updateSelectedPrice = selectedCrypto =>
    fetchPrices(selectedCrypto)
        .then(result =>{
            selectedCryptoPrice.textContent = textCryptosResponse(result);
            selectedCryptoPrice.className = previousPrice(`select-${result.crypto}`, result.price);
        })
        .catch(error =>{
            selectedCryptoPrice.textContent = 'Erreur';
        });

cryptoSelect.addEventListener('change', () => {
    const selectedCrypto = cryptoSelect.value;
    clearInterval(intervalId);
    updateSelectedPrice(selectedCrypto);
    intervalId = setInterval(() => updateSelectedPrice(selectedCrypto), updateInterval);
});