const priceContainer = document.querySelector('#Price-container');
const priceCryptos = document.querySelector('#price-cryptos');
const textCryptosResponse = result => `Prix d'achat du ${result.crypto} en EUR : ${result.price}€`;

/* Récupérer le prix du BTC en euro */
fetch('https://api.coinbase.com/v2/prices/BTC-EUR/buy')
    .then(response =>{
        if(!response.ok){
            throw new Error('Erreur Coinbase api');
        }
        return response.json();
    })
    .then(data =>{
        const price = data.data.amount;
        priceContainer.textContent = `Prix d'achat du BTC en EUR : ${price}€`;
    })
    .catch(error =>{
        priceContainer.textContent = 'Erreur';
    });

/* Récupérer les prix des 6 cryptos en euro */
const cryptos = ['BTC', 'ETH', 'ADA', 'DOT', 'CRO', 'MATIC'];
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

Promise.all(cryptos.map(fetchPrices))
    .then(results =>{
        priceCryptos.innerHTML = results.map(result => `<li>${textCryptosResponse(result)}</li>`).join('');
    })
    .catch(error =>{
        priceCryptos.textContent = 'Erreur';
    });

/* Récupérer le prix de la crypto select */
const cryptoSelect = document.querySelector('#crypto-select');
const selectedCryptoPrice = document.querySelector('#selected-crypto-price');

let intervalId;

const updateSelectedPrice = selectedCrypto =>
    fetchPrices(selectedCrypto)
        .then(result =>{
            selectedCryptoPrice.textContent = textCryptosResponse(result);
            console.log('prix updated');
        })
        .catch(error =>{
            selectedCryptoPrice.textContent = 'Erreur';
        });

cryptoSelect.addEventListener('change', () => {
    const selectedCrypto = cryptoSelect.value;
    clearInterval(intervalId);
    updateSelectedPrice(selectedCrypto);
    intervalId = setInterval(() => updateSelectedPrice(selectedCrypto), 60000);
});