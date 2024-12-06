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
            <select class="form-select categoryDropdown" aria-label="Select Product Category" id="category-${productCount}" required>
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
            <select class="form-select productDropdown" aria-label="Select Product" id="product-${productCount}" required>
                <option selected>Select Product:</option>
            </select>
        </div>
        <div class="col-md-4">
            <select class="form-select" aria-label="Select Quantity" required>
                <option selected>Select Quantity:</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
            </select>
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
    if (e.target.classList.contains("form-select") && e.target.parentNode){
        const selectedCateg = e.target.value;
        const productDropdown = e.target.closest(".row").querySelector(".productDropdown");

        if (selectedCateg === "") {
            productDropdown.innerHTML = "<option>Select Product:</option>";
        }

        fetch('/fetch-data?value=' + selectedCateg)
            .then(response => response.json())
            .then(data => {
                productDropdown.innerHTML = "";
                var defaultOption = document.createElement('option');
                defaultOption.textContent = "Select Product:";
                productDropdown.appendChild(defaultOption);

                data.forEach(function(item) {
                    var option = document.createElement('option');
                    option.textContent = item.stockName;
                    productDropdown.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Fetch error:', error);
                productDropdown.innerHTML = '<option>Error loading data</option>';
            });
    }
});

