<?php
    session_start();
    include '../DB-Connection/configDB.php';

    $selected_category = $_POST['category'];    
    // header("Location: ../../inventory.php");
    // exit();

    if ($selected_category == "allProducts") {
        $stmt = $conn->prepare("SELECT `productName`, `productManufacture`, `productType`, `productCount` FROM `products`");
        $stmt->execute();
        $allStock = $stmt->get_result();

        if($allStock->num_row >= 1) {
            $products = $allStock->fetchAll(PDO::FETCH_ASSOC);
            
            $_SESSION['product_stock'] = $products; 
            $_SESSION['product_category'] = $selected_category;
    
            header("Location: ../../inventory.php");
            exit();
        } else {
            echo "No Products Available.";
        }
    } else {
        $stmt = $conn->prepare("SELECT `productName`, `productManufacture`, `productType`, `productCount` FROM `products` WHERE productType=?");
        $stmt->bind_param("s", $selected_category);
        $stmt->execute();
        $resultStock = $stmt->get_result();

        if($resultStock->num_row >= 1) {
            $products = $resultStock->fetchAll(PDO::FETCH_ASSOC);
            
            $_SESSION['product_stock'] = $products; 
            $_SESSION['product_category'] = $selected_category;
    
            header("Location: ../../inventory.php");
            exit();
        } else {
            echo "Category '$selected_category' doesn't exist.";
        }
    }
?>