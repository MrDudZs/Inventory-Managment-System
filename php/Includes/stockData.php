<?php
include '../DB-Connection/configDB.php';

$sql = "SELECT stockName, stockCount, stockSold FROM stock WHERE stockSold > 10 ORDER BY stockSold DESC";
$result = $conn->query(query: $sql);

$stockData = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $stockData[] = $row;
    }
}

$conn->close();

echo json_encode(value: $stockData);
