<?php             
    include '../DB-Connection/configDB.php';

    $s_categ = $_REQUEST['q'];

    if (isset($s_categ)) {
        $query = $conn->prepare("SELECT `stockID`, `stockName`, `stockType` FROM `stock` WHERE stockType=?");
        $query->bind_param("s", $s_categ);
        $query->execute();
        $forList = $query->get_result();

        if (isset($forList) && $forList->num_rows > 0) {
            echo "<option selected>Select Product:</option>";
            while ($row = $forList->fetch_assoc()) {
                $sID = $row['stockID']; 
                $stockName = $row['stockName'];
                echo "<option value=\"$sID\">$stockName</option>";
            }
        } else {
            echo "<option>No Products</option>"; 
        }

    }  
    $conn->close();
?>
