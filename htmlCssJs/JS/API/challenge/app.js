const priceContainer = document.querySelector('#Price-container');
const priceCryptos = document.querySelector('#price-cryptos');

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

/* utiliser promise.all pour récupérer les prix des 6 cryptos en euro */
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
        priceCryptos.innerHTML = results.map(result => `<li>Prix d'achat du ${result.crypto} en EUR : ${result.price}€</li>`).join('');
    })
    .catch(error =>{
        priceCryptos.textContent = 'Erreur';
    });

const cryptoSelect = document.querySelector('#crypto-select');
const selectedCryptoPrice = document.querySelector('#selected-crypto-price');

cryptoSelect.addEventListener('change', () => {
    const selectedCrypto = cryptoSelect.value;
    fetch(`https://api.coinbase.com/v2/prices/${selectedCrypto}-EUR/buy`)
        .then(response =>{
            if(!response.ok){
                throw new Error('Erreur Coinbase api');
            }
            return response.json();
        })
        .then(data =>{
            const price = data.data.amount;
            selectedCryptoPrice.textContent = `Prix d'achat du ${selectedCrypto} en EUR : ${price}€`;
        })
        .catch(error =>{
            selectedCryptoPrice.textContent = 'Erreur';
        });
});