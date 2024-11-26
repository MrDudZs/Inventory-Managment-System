<?php
include '../DB-Connection/configDB.php';

$sql = "SELECT stockCount, stockSold FROM stock";
$result = $conn->query(query: $sql);

$salesData = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $salesData[] = $row;
    }
}

$conn->close();

echo json_encode(value: $salesData);
