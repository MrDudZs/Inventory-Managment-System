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
                <button type="button" class="btn-dashboard" onclick='window.location.href = "createInvoice.php"'>Create Invoice</button>
                <button type="button" class="btn-dashboard" onclick='window.location.href = "invoiceHistory.php"'>Invoice History</button>
            </div>
        </div>
        <div class="col custom-dash-cols">
        <h4>Products:</h4>
            <hr>
            <div class="d-grid gap-2">
                <button type="button" class="btn-dashboard" onclick='window.location.href = "categories.php"'>Categories</button>
                <button type="button" class="btn-dashboard" onclick='window.location.href = "search.php"'>Search</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6 col-md-4 custom-dash-cols">
            <h4>This Week:</h4>
            <hr>
            <div class="stockStats">
                <p class="productSoldStat">Product Sold:<?php GetSales("1 week") ?></p> 
            </div>
            <hr>
            <h4>This Month:</h4>
            <hr>
            <div class="stockStats">
                <p class="productSoldStat">Product Sold:<?php GetSales("1 month") ?></p>
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
        } else {
            echo "None<br>";
        }
        $conn->close();
    }

    function GetSales($timeScale)
    {
        include 'php/DB-Connection/configDB.php';
        $currentDate = date('Ymd', strtotime("Now"));
        $lastWeeksDate = date('Ymd', strtotime("-" . $timeScale));
        $sql = "SELECT stockPrice, saleCount FROM invoice " .
            "INNER JOIN saleshistory ON invoice.invoiceID = saleshistory.saleID " .
            "INNER JOIN stock ON saleshistory.saleStockID = stock.stockID " .
            "WHERE invoice.invoiceDate < " . $currentDate . " AND invoice.invoiceDate > " . $lastWeeksDate;
        $searchResults = $conn->query($sql);
        $cumulativeSales = 0;
        $cumulativeStockSold = 0;
        if ($searchResults->num_rows > 0) {
            while ($row = $searchResults->fetch_assoc()) {
                $cumulativeSales += $row['stockPrice'] * $row['saleCount'];
                $cumulativeStockSold += $row['saleCount'];
            }
            $averageStock = $cumulativeStockSold / $searchResults->num_rows;
            echo " £" . $cumulativeSales;
            echo "<p class=\"averageStockStat\">Avg Stock:" . $averageStock . "</p>";
        } else {
            echo " £0";
            echo "<p class=\"averageStockStat\">Avg Stock:0</p>";
        }
        $conn->close();
    }
?>