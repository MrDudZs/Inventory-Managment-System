<button type="button" class="btn-dashboard" data-bs-toggle="modal" data-bs-target="#newProduct">
    Add Product
</button>

<div class="modal fade" id="newProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('newProduct') }}" method="post">
                    @csrf
                    <div class = "productForm">
                    <label for="prodType">{{ __('Product Type') }}</label>
                    <select id="prodType" name="prodType" required>
                        <option value="">Select Product Type</option>
                        @foreach ($stockTypes as $type) 
                            <option value="{{ $type }}">{{ $type }}</option>
                        @endforeach
                    </select>
                    </div> 
                    <div class = "productForm">
                     <label for="prodBrand">{{ __('Product Brand') }}</label> <select id="prodBrand"
                        name="prodBrand" required>
                        <option value="">Select Product Brand</option>
                    </select></div>
                     <div class = "productForm">
                     <label for="prodName">{{ __('Product Name') }}</label> <select id="prodName"
                        name="prodName" required>
                        <option value="">Select Product Name</opti on>
                    </select>
                    </div>
                     <div class = "productForm">
                         <label for="prodAmount">{{ __('Product Amount') }}</label>
                    <input type="number" id="prodAmount" name="prodAmount" min="1" max="999" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('prodType').addEventListener('change', function () {
        var prodType = this.value;
        fetch(`/get-brands?type=${prodType}`).then(response => response.json()).then(data => {
            var prodBrandSelect = document.getElementById('prodBrand');
            prodBrandSelect.innerHTML = '<option value="">Select Product Brand</option>';
            data.forEach(brand => {
                prodBrandSelect.innerHTML += `<option value="${brand}">${brand}</option>`;
            });
        });
    });
    document.getElementById('prodBrand').addEventListener('change', function () {
        var prodBrand = this.value;
        fetch(`/get-names?brand=${prodBrand}`).then(response => response.json()).then(data => {
            var prodNameSelect = document.getElementById('prodName');
            prodNameSelect.innerHTML = '<option value="">Select Product Name</option>';
            data.forEach(name => {
                prodNameSelect.innerHTML += `<option value="${name}">${name}</option>`;
            });
        });
    }); 
</script>