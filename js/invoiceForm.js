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
            <select class="form-select" aria-label="Select Product Category" required>
                <option selected>Select Category:</option>
                <option value="Keyboard">Keyboards</option>
                <option value="Mouse">Mouse</option>
                <option value="Monitor">Monitor</option>
                <option value="Speakers">Speakers</option>
                <option value="Microphone">Microphone</option>
                <option value="Headset">Headset</option>
            </select>
        </div>
        <div class="col-md-4">
            <select class="form-select productDropdown" aria-label="Select Product" required>
                <option selected>Select Product:</option>

=            </select>
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

    if (products.length > 0) {
        addToForm.removeChild(lastProduct);

        if (products.length === 1) {
            removeProduct.style.display = "none";
        }
    }
})

function onChange() {
    var value = categ.value;

    if (value == "Select Category:") {
        return;
    } else {
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "php/Includes/productList.php?q=" + value, true);
        // Function runs everytime the readyState property of the xmlhttp changes
        xmlhttp.onreadystatechange = function() {
            // readyState returns the state the xmlhttp is in.
            // 4 means the operation is complete. State = DONE
            if (xmlhttp.readyState === 4) {
                // Outputs the productList.php echos in the select with ID=productDropdown
                const pDrop = document.querySelector(".productDropdown");
                pDrop.innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.send();
    }
    console.log("Selected Index: " + value);
}

categ.onchange = onChange;
onChange();