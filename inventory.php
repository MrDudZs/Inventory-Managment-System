<?php
    session_start();
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
            include("php/includes/header.php");
        ?>
        <main>
            <?php
                if(isset($_SESSION['product_stock']) && isset($_SESSION['product_category'])) {
                    $results = $_SESSION['product_stock'];
                    $category = $_SESSION['product_category'];

                    if ($category == "allProducts") {
                        echo "<h2>All Products</h2>";
                    } else {
                        echo "<h2>" . $category . "</h2>";
                    }
                    

                    // Put in a boostrap card.
                    foreach ($results as $product) {
                        echo $product['stockID'];
                        echo $product['stockName'];
                        echo $product['stockCount'];
                        echo $product['stockPrice'];
                        echo $product['stockBrand'];
                    }
                } else {
                    header("Location: categories.php");
                    exit();
                }
            ?>
        </main>
    </body>

</html>