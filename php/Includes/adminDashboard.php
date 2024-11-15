<div class="container">
    <div class="row">
        <div class="col custom-dash-cols">
            <h4>Low Stock:</h4>
            <hr>
            <?php FindLowStocks() ?>
        </div>
        <div class="col custom-dash-cols">
            <h4>Generate Reports:</h4>
            <hr>
            <div class="d-grid gap-2">
                <button type="button" class="btn-dashboard" onclick='window.location.href = "productSales.php"'>Product sales</button>
                <button type="button" class="btn-dashboard" onclick='window.location.href = "inventoryLevels.php"'>Inventory levels</button>
                <button type="button" class="btn-dashboard" onclick='window.location.href = "averageStockLevels.php"'>Average stock levels</button>
            </div>
        </div>
        <div class="col custom-dash-cols">
            <h4>Products:</h4>
            <hr>
            <div class="d-grid gap-2">
                <button type="button" class="btn-dashboard" onclick='window.location.href = "addNewProduct.php"'>Add new product</button>
                <button type="button" class="btn-dashboard" onclick='window.location.href = "removeProduct.php"'>Remove product</button>
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
        <div>
            <div class="col-7-5 custom-dash-cols">
                <div class = "d-grid gap-2">
                <?php 
                    //TODO do your thing matt
                ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6 col-md-4 custom-dash-cols">
            <h4>History: </h4>
            <hr>
            <div class="d-grid gap-2">
                <button type="button" class="btn-dashboard" onclick='window.location.href = "orderTransactions.php"'>Order transactions</button>
                <button type="button" class="btn-dashboard" onclick='window.location.href = "invoiceHistory.php"'>Invoices</button>
                <button type="button" class="btn-dashboard" onclick='window.location.href = "reports.php"'>Reports</button>
            </div>
        </div>
    </div>
</div>
    <?php
    function FindLowStocks()
    {
        include 'php/DB-Connection/configDB.php';

        $sql = "SELECT stockName, stockCount, stockType, stockPrice, stockBrand FROM stock WHERE stockCount < 16";
        $searchResults = $conn->query($sql);

        if ($searchResults->num_rows > 0) {
            while ($row = $searchResults->fetch_assoc()) {
                echo " " . $row['stockBrand'] . ", " . $row['stockName'] . ". Stock left: " . $row['stockCount'] . "<br>";
            }
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
        }
        $conn->close();
    }
    ?>