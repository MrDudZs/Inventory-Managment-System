<?php
    include('php/DB-Connection/configDB.php');

    $s_category = $_POST['category'];
    
    if ($s_category == "allProducts") {
        $stmt = $conn->prepare("SELECT `stockID`, `stockName`, `stockCount`, `stockType`, `stockPrice`, `stockBrand` FROM `stock`");
        $stmt->execute();
        $allStock = $stmt->get_result();

    } else {
        $stmt = $conn->prepare("SELECT `stockID`, `stockName`, `stockCount`, `stockType`, `stockPrice`, `stockBrand` FROM `stock` WHERE stockType=?");
        $stmt->bind_param("s", $s_category);
        $stmt->execute();
        $resultStock = $stmt->get_result();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
    <link href="css/main.css" rel="stylesheet" />
</head>
    <body>
        <?php
            include("php/Includes/header.php");
        ?>
        <main>
            <br><br>
            <div class="container">
                <a href="categories.php" class="btn btn-light"><< Back to Categories</a>
                <a href="dashboard.php" class="btn btn-light"><< Back to Dashboard</a>
                <br><br>
                <div class="row">
                    <?php
                        if (isset($allStock) && $allStock->num_rows > 0) {
                            echo "<h2 class=\"btn-custom\" style=\"padding: 7px;\">All Products</h2>";
                            while ($row = $allStock->fetch_assoc()) {
                                echo "<div class=\"col-md-4 mb-4\">";
                                    echo "<div class=\"card grid-sizing\" style=\"width: 18rem; height: 18rem;\">";
                                        echo "<div class=\"card-body\">";
                                            echo "<h5 class=\"card-title\">" . $row['stockName'] . "</h5>";
                                            echo "<h6 class=\"card-subtitle mb-2 text-body-secondary\">StockID: " . $row['stockID'] . "</h6>";
                                            echo "<p class=\"card-text\">Category: " . $row['stockType'] . "</p>";
                                            echo "<p class=\"card-text\">Brand: " . $row['stockBrand'] . "</p>";
                                            echo "<p class=\"card-text\">Price: £" . $row['stockPrice'] . "</p>";
                                            echo "<p class=\"card-text\">" . $row['stockCount'] . " - In Stock</p>";
                                        echo "</div>";
                                    echo "</div>";
                                echo "</div>";
                            }
                        } else if (isset($resultStock) && $resultStock->num_rows > 0) {
                            echo "<h2 class=\"btn-custom\" style=\"padding: 7px;\">Product Category: " . $s_category . "</h2>";
                            while ($row = $resultStock->fetch_assoc()) {
                                echo "<div class=\"col-md-4 mb-4\">";
                                    echo "<div class=\"card\" style=\"width: 20rem; height: 18rem;\">";
                                        echo "<div class=\"card-body\">";
                                            echo "<h5 class=\"card-title\">" . $row['stockName'] . "</h5>";
                                            echo "<h6 class=\"card-subtitle mb-2 text-body-secondary\">StockID: " . $row['stockID'] . "</h6>";
                                            echo "<p class=\"card-text\">Brand: " . $row['stockBrand'] . "</p>";
                                            echo "<p class=\"card-text\">Price: £" . $row['stockPrice'] . "</p>";
                                            echo "<p class=\"card-text\">" . $row['stockCount'] . "- In Stock</p>";
                                        echo "</div>";
                                    echo "</div>";
                                echo "</div>";
                            }
                        } else {
                            echo "<h2 class=\"btn-custom\" style=\"padding: 7px;\">No Products Available</h2>";
                        }
                    ?>
                </div>
            </div>
        </main>
    </body>

</html>