<div class="container">
    <div class="row">
        <div class="col custom-dash-cols">
            <h4>Low Stock:</h4>
            <hr>
            <?php FindLowStocks() ?>
        </div>
        <div class="col custom-dash-cols">
            <h4>Invoices:</h4>
            <hr>
            <div class="d-grid gap-2">
                <button type="button" class="btn-dashboard">Create Invoice</button>
                <button type="button" class="btn-dashboard">Invoice History</button>
            </div>
        </div>
        <div class="col custom-dash-cols">
        <h4>Products:</h4>
            <hr>
            <div class="d-grid gap-2">
                <button type="button" class="btn-dashboard">Categories</button>
                <button type="button" class="btn-dashboard">Search</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6 col-md-4 custom-dash-cols">
            <h4>This Week:</h4>
            <hr>
            <div class="stockStats">
                <p class="productSoldStat">Product Sold:</p>
                <p class="averageStockStat">Avg Stock:</p>
            </div>
            <hr>
            <h4>This Month:</h4>
            <hr>
            <div class="stockStats">
                <p class="productSoldStat">Product Sold:</p>
                <p class="averageStockStat">Avg Stock:</p>
            </div>  
        </div>
    </div>
</div>

<?php
    function FindLowStocks() {           
        include 'php/DB-Connection/configDB.php';

        $sql = "SELECT stockName, stockCount, stockType, stockPrice, stockBrand FROM stock WHERE stockCount < 16";
        $searchResults = $conn->query($sql);

        if ($searchResults->num_rows > 0){
            while ($row = $searchResults->fetch_assoc()){
                echo $row['stockBrand'] . ", " . $row['stockName'] . ". Stock left: " . $row['stockCount'] . "<br>";
            }
        }
        $conn->close();
    }
?>