const categorySelect = document.getElementById("category-select");
const productList = document.getElementById("product-list");
let products = [];

function displayProducts(category) {
    productList.innerHTML = "";

    products
        .filter((product) => category === "all" || product.category === category)
        .forEach((product) => {
            const card = document.createElement("div");
            const image = document.createElement("img");
            const name = document.createElement("h2");
            const price = document.createElement("p");

            image.src = product.image;
            image.alt = product.name;
            name.textContent = product.name;
            price.textContent = `${product.price} €`;

            card.append(image, name, price);
            productList.append(card);
        });
}

fetch("https://grippy.learn.pierre-godino.com/api/mock/dom-products")
    .then((response) => {
        if (!response.ok) {
            throw new Error("Erreur");
        }
        return response.json();
    })
    .then((data) => {
        products = data;

        const allOption = document.createElement("option");
        allOption.value = "all";
        allOption.textContent = "Toutes";
        categorySelect.append(allOption);

        const categories = [...new Set(products.map((product) => product.category))];
        categories.forEach((category) => {
            const option = document.createElement("option");
            option.value = category;
            option.textContent = category;
            categorySelect.append(option);
        });

        displayProducts("all");
    })
    .catch((error) => {
        console.error(error);
    });

categorySelect.addEventListener("change", () => {
    displayProducts(categorySelect.value);
});
