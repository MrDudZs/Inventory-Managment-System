<form>
    <div class="userField">
        <input class="input" type="email" name="customerEmail" placeholder="Input Customer Email" required>
        <input class="input" type="text" name="customerName" placeholder="Customer Full Name" required>
        <input class="input" type="text" name="CustomerAddress" placeholder="Customers Address" required>
    </div>
    <div class="productField">
        <select class="input" name="productType" placeholder="Product Type" required id="inputOne">
            <option>Please Select</option>
            <option value="1">1</option>
            <option value="2">2</option>
        </select>

        <select class="input" name="productType" placeholder="Product Name" required></select>

        <input class="input" type="number" name="numberOfProduct" placeholder="Product Quantity" required>
    </div>
    <div class="productField" id="hideField" style="display: none;">
        <select class="input" name="productType" placeholder="Product Type">
            <option value="1">1</option>
            <option value="2">2</option>
        </select>

        <select class="input" name="productType" placeholder="Product Name"></select>

        <input class="input" type="number" name="numberOfProduct" placeholder="Product Quantity">
    </div>
    <input class="input" type="submit">
</form>