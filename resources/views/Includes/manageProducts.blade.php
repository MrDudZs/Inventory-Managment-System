<button type="button" class="btn-dashboard" data-bs-toggle="modal" data-bs-target="#manageProduct">
    Manage Product
</button>

<div class="modal fade" id="manageProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Delete Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('manageProduct') }}" method="post">
                    @csrf
                    <div class="productForm">
                        <label for="prodType">{{ __('Product Type') }}</label>
                        <select id="prodTypeRP" name="prodType" required>
                            <option value="">Select Product Type</option>
                            @foreach ($stockTypes as $type) 
                                <option value="{{ $type }}">{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="productForm">
                        <label for="prodBrand">{{ __('Product Brand') }}</label> <select id="prodBrandRP"
                            name="prodBrand" required>
                            <option value="">Select Product Brand</option>
                        </select>
                    </div>
                    <div class="productForm">
                        <label for="prodName">{{ __('Product Name') }}</label> <select id="prodNameRP" name="prodName"
                            required>
                            <option value="">Select Product Name</opti on>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Remove Product</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    var prodTypeOption = document.getElementById('prodTypeRP');
    prodTypeOption.addEventListener('change', function () {
        var prodType = this.value;
        console.log(`Selected Product Type: ${prodType}`);

        fetch(`/get-brands?type=${prodType}`)
            .then(response => response.json())
            .then(data => {
                console.log(`Fetched Brands:`, data);
                var prodBrandSelect = document.getElementById('prodBrandRP');
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


    document.getElementById('prodBrandRP').addEventListener('change', function () {
        var prodBrand = this.value;
        fetch(`/get-names?brand=${prodBrand}`).then(response => response.json()).then(data => {
            var prodNameSelect = document.getElementById('prodNameRP');
            prodNameSelect.innerHTML = '<option value="">Select Product Name</option>';
            data.forEach(name => {
                prodNameSelect.innerHTML += `<option value="${name}">${name}</option>`;
            });
        });
    }); 
</script>