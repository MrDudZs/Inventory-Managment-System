<button type="button" class="btn-dashboard" data-bs-toggle="modal" data-bs-target="#addProduct">
    Add New Product
</button>

<div class="modal fade" id="addProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('addProduct') }}" method="post">
                    @csrf
                    <div class="productForm">
                        <label for="prodType">{{ __('Product Type') }}</label>
                        <select id="prodTypeAP" name="prodType" required>
                            <option value="">Select Product Type</option>
                            @foreach ($stockTypes as $type) 
                                <option value="{{ $type }}">{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="productForm">
                        <label for="prodBrand">{{ __('Product Brand') }}</label>
                        <select id="prodBrandAP" name="prodBrandE">
                            <option value="">Select Product Brand</option>
                        </select>
                    </div>
                    <div class="productForm">
                        <label for="prodBrand">{{ __('Product Brand') }} if product doesn't exist</label>
                        <input id="prodBrandAP" name="prodBrand" placeholder="Input Product">
                    </div>
                    <div class="productForm">
                        <label for="prodName">{{ __('Product Name') }}</label>
                        <input type="text" id="prodNameAP" name="prodName" required>
                    </div>
                    <div class="productForm">
                        <label for="prodPrice">{{ __('Product Price') }}</label>
                        <input type="number" id="prodPriceAP" name="prodPrice" min="1" max="999" step="0.01" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add New Product</button>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var prodTypeOption = document.getElementById('prodTypeAP');
    prodTypeOption.addEventListener('change', function () {
        var prodType = this.value;
        fetch(`/get-brands?type=${prodType}`)
            .then(response => response.json())
            .then(data => {
                var prodBrandSelect = document.getElementById('prodBrandAP');
                prodBrandSelect.innerHTML = '<option value="">Select Product Brand</option>';
                var brands = Object.values(data);

                if (Array.isArray(brands)) {
                    brands.forEach(brand => {
                        prodBrandSelect.innerHTML += `<option value="${brand}">${brand}</option>`;
                    });
                } else {
                    console.error('Unexpected data format:', data);
                }
            })
            .catch(error => console.error('Error fetching brands:', error));
    });

</script>