const priceContainer = document.querySelector('#Price-container');
const priceCryptos = document.querySelector('#price-cryptos');
const currencyToggle = document.querySelector('#currency-toggle');
const getCurrency = () => currencyToggle.querySelector('input:checked').value;
const currencySymbols = {EUR: '€', USD: '$'};
const textCryptosResponse = (result, trend) => `Prix d'achat du ${result.crypto} en ${result.currency} : <span class="${trend}">${result.price}${currencySymbols[result.currency]}</span>`;
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
    const currency = getCurrency();
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

/* Récupérer le prix du BTC */
const fetchBTCPrice = () =>{
    showLoader(priceContainer);
    fetchPrices('BTC')
        .then(result =>{
            priceContainer.innerHTML = textCryptosResponse(result, previousPrice('single-BTC', result.price));
            priceContainer.className = '';
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
                `<li>${textCryptosResponse(result, previousPrice(`list-${result.crypto}`, result.price))}</li>`
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
let lastTrend = 'gris';

const updateSelectedPrice = selectedCrypto =>{
    showLoader(selectedCryptoPrice);
    fetchPrices(selectedCrypto)
        .then(result =>{
            const key = `select-${result.crypto}`;
            // Pas encore d'ancien prix pour le select : on compare avec celui de la liste
            if (previousPrices[key] === undefined) previousPrices[key] = previousPrices[`list-${result.crypto}`];
            const lastPrice = previousPrices[key];
            const trend = previousPrice(key, result.price);
            selectedCryptoPrice.innerHTML = textCryptosResponse(result, trend);
            selectedCryptoPrice.className = '';
            if (lastPrice !== undefined) {
                selectedHistoryContainer.innerHTML += `<li>Ancien prix : <span class="${lastTrend}">${lastPrice}${currencySymbols[result.currency]}</span></li>`;
            }
            lastTrend = trend;
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
    lastTrend = 'gris';
    updateSelectedPrice(selectedCrypto);
    intervalId = setInterval(() => updateSelectedPrice(selectedCrypto), updateInterval);
});

/* Ajout d'une crypto par l'utilisateur */
const addCryptoForm = document.querySelector('#add-crypto-form');
const newCryptoInput = document.querySelector('#new-crypto');
const addCryptoMessage = document.querySelector('#add-crypto-message');

const showAddMessage = (text, isError) =>{
    addCryptoMessage.textContent = text;
    addCryptoMessage.className = isError ? 'add-crypto-message rouge' : 'add-crypto-message';
};

addCryptoForm.addEventListener('submit', event =>{
    event.preventDefault();
    const crypto = newCryptoInput.value.trim().toUpperCase();
    if (!crypto) return showAddMessage('Saisis un symbole.', true);
    if (cryptos.includes(crypto)) return showAddMessage(`${crypto} est déjà dans la liste.`, true);

    showAddMessage('Recherche...', false);
    // On vérifie que Coinbase connaît la crypto avant de l'ajouter
    fetchPrices(crypto)
        .then(() =>{
            cryptos.push(crypto);
            cryptoSelect.add(new Option(crypto, crypto));
            updateAllPrices();
            newCryptoInput.value = '';
            showAddMessage(`${crypto} ajoutée.`, false);
        })
        .catch(() =>{
            showAddMessage(`${crypto} introuvable sur Coinbase.`, true);
        });
});

/* Changement de devise EUR/USD */
currencyToggle.addEventListener('change', () => {
    previousPrices = {};
    fetchBTCPrice();
    updateAllPrices();
    if (intervalId) {
        selectedHistoryContainer.innerHTML = '';
        lastTrend = 'gris';
        updateSelectedPrice(cryptoSelect.value);
    }
});
