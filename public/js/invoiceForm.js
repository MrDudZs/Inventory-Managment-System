const addBtn = document.querySelector(".btn-add");
const addToForm = document.querySelector(".productForm");
const removeProduct = document.querySelector(".btn-remove");
removeProduct.style.display = "none";
const categ = document.getElementById('selectCateg');

let productCount = 0;

addBtn.addEventListener("click", function() {
    productCount++;
    const newProduct = document.createElement("div");
    newProduct.classList.add("row", "add-product-row");
    newProduct.innerHTML = `
        <div class="col-md-4">
            <select class="form-select categoryDropdown" aria-label="Select Product Category" id="category_${productCount}" name="products[${productCount}][category]" required>
                <option value="" selected>Select Category:</option>
                <option value="Keyboard">Keyboards</option>
                <option value="Mouse">Mouse</option>
                <option value="Monitor">Monitor</option>
                <option value="Speakers">Speakers</option>
                <option value="Microphone">Microphone</option>
                <option value="Headset">Headset</option>
            </select>
        </div>
        <div class="col-md-4">
            <select class="form-select productDropdown" aria-label="Select Product" id="product_${productCount}" name="products[${productCount}][product]" required>
                <option value="" selected>Select Product:</option>
            </select>
        </div>
        <div class="col-md-4">
            <input type="number" class="form-select" aria-label="Select Quantity" id="quantity_${productCount}" name="products[${productCount}][quantity]" placeholder="Quantity:" min=1 step=1 required>
        </div>
        <br><br>
    `;

    addToForm.appendChild(newProduct);
    removeProduct.style.display = "inline-block";
})

removeProduct.addEventListener("click", function() {
    const products = document.querySelectorAll(".add-product-row");
    const lastProduct = document.querySelector(".add-product-row:last-child");
    productCount--;

    if (products.length > 0) {
        addToForm.removeChild(lastProduct);

        if (products.length === 1) {
            removeProduct.style.display = "none";
        }
    }
})

addToForm.addEventListener("change", function(e) {
    if (e.target.classList.contains("form-select") && e.target.name.includes("category")){
        const selectedCateg = e.target.value;
        const productDropdown = e.target.closest(".row").querySelector(".productDropdown");

        if (selectedCateg === "Selected Category:") {
            productDropdown.innerHTML = "<option>Select Product:</option>";
        } else {
            fetch('/fetch-product?value=' + selectedCateg)
            .then(response => response.json())
            .then(data => {
                productDropdown.innerHTML = "";
                var defaultOption = document.createElement('option');
                defaultOption.textContent = "Select Product:";
                productDropdown.appendChild(defaultOption);

                data.forEach(function(item) {
                    var option = document.createElement('option');
                    option.textContent = item.stockName;
                    option.value = item.stockName;
                    productDropdown.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Fetch error:', error);
                productDropdown.innerHTML = '<option>Error loading data</option>';
            });
        }
    }
});

