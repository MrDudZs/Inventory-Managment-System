<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
    <link href="bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet" />
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
                        include "php/Includes/toInventory.php";

                        // If is null then allProducts is default.
                        $category = isset($_POST['category']) ? $_POST['category'] : 'allProducts';
                        $inventory = fetchInventory($category);

                        if (isset($inventory)) {
                            if ($category == "allProducts") {
                                echo "<h2 class=\"btn-custom\" style=\"padding: 7px;\">All Products</h2>";
                            } else {
                                echo "<h2 class=\"btn-custom\" style=\"padding: 7px;\">Product Category: " . $category . "</h2>";
                            }
                            // $item[index] - Index from the db column order
                            foreach ($inventory as $item) {
                                echo "<div class=\"col-md-4 mb-4\">";
                                    echo "<div class=\"card grid-sizing\" style=\"width: 18rem; height: 18rem;\">";
                                        echo "<div class=\"card-body\">";
                                            echo "<h5 class=\"card-title\">" . $item[1] . "</h5>";
                                            echo "<h6 class=\"card-subtitle mb-2 text-body-secondary\">StockID: " . $item[0] . "</h6>";
                                            echo "<p class=\"card-text\">Category: " . $item[3] . "</p>";
                                            echo "<p class=\"card-text\">Brand: " . $item[5] . "</p>";
                                            echo "<p class=\"card-text\">Price: £" . $item[4] . "</p>";
                                            echo "<p class=\"card-text\">" . $item[2] . " - In Stock</p>";
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
