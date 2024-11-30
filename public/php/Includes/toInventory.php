<?php
function fetchInventory($category) {
    include 'php/DB-Connection/configDB.php';

    if ($category == "allProducts") {
        $stmt = $conn->prepare("SELECT `stockID`, `stockName`, `stockCount`, `stockType`, `stockPrice`, `stockBrand` FROM `stock`");
    } else {
        $stmt = $conn->prepare("SELECT `stockID`, `stockName`, `stockCount`, `stockType`, `stockPrice`, `stockBrand` FROM `stock` WHERE stockType=?");
        $stmt->bind_param("s", $category);
    }
    $stmt->execute();
    $resultStock = $stmt->get_result();
    
    if ($resultStock->num_rows > 0) {
        return $resultStock->fetch_all();
    } else {
        return;
    }
    $conn->close();
}
?>



