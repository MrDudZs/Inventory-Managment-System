<?PHP

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "invmgmtsys";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
    die ("Connection failed: " . $conn->connect_error);
}