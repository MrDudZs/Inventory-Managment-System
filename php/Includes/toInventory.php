<?php
    session_start();
    include '../DB-Connection/configDB.php';

    $selected_category = $_POST['category'];    

    if ($selected_category == "allProducts") {
        $stmt = $conn->prepare("SELECT `stockID`, `stockName`, `stockCount`, `stockType`, `stockPrice`, `stockBrand` FROM `stock`");
        $stmt->execute();
        $allStock = $stmt->get_result();

        if($allStock->num_rows >= 1) {
            $products = $allStock->fetch_all();
            
            // Need to put each field into an array or object. 
            // Then add it into the product stock session variable.
            $_SESSION['product_stock'] = $products; 
            $_SESSION['product_category'] = $selected_category;
    
            header("Location: ../../inventory.php");
            exit();
        } else {
            echo "No Products Available.";
        }
    } else {
        $stmt = $conn->prepare("SELECT `stockID`, `stockName`, `stockCount`, `stockType`, `stockPrice`, `stockBrand` FROM `stock` WHERE stockType=?");
        $stmt->bind_param("s", $selected_category);
        $stmt->execute();
        $resultStock = $stmt->get_result();

        if($resultStock->num_rows >= 1) {
            $products = $resultStock->fetch_all(PDO::FETCH_ASSOC);
            
            $_SESSION['product_stock'] = $products; 
            $_SESSION['product_category'] = $selected_category;
    
            header("Location: ../../inventory.php");
            exit();
        } else {
            echo "Category '$selected_category' doesn't exist.";
        }
    }
?>