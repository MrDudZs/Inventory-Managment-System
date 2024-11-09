<?php             
    include '../DB-Connection/configDB.php';

    $s_categ = $_REQUEST['q'];

    if (isset($s_categ)) {
        $query = $conn->prepare("SELECT `stockID`, `stockName` FROM `stock` WHERE stockType=?");
        $query->bind_param("s", $s_categ);
        $query->execute();
        $forList = $query->get_result();

        ob_start();

        if (isset($forList) && $forList->num_rows > 0) {
            while ($row = $forList->fetch_assoc()) {
                $sID = htmlspecialchars($row['stockID']);
                $stockName = htmlspecialchars($row['stockName']);
                echo "<option value=\"$sID\">$stockName</option>";
            }
        } else {
            echo "<option>No Products</option>"; 
        }

        echo trim(ob_get_clean());
    }  
    $conn->close();
?>
