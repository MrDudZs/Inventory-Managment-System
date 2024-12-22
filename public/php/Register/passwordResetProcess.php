<?PHP

session_start();

include '../DB-Connection/configDB.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['emailRest'];
    $new_password1 = $_POST['passwordReset1'];
    $new_password2 = $_POST['passwordReset2'];

    $stmt = $conn->prepare("SELECT 'email' FROM staff WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1){
        if ($new_password1 === $new_password2){
            $hashed_password = password_hash($new_password2, PASSWORD_BCRYPT);

            $update_stmt = $conn->prepare("UPDATE staff SET password=? WHERE email=?");
            $update_stmt->bind_param("ss", $hashed_password, $email);
            if ($update_stmt->execute()) {
                echo "password has been reset";
            } else {
                echo "Error updating password";
            }
        } else {
            echo "The passwords do not match";
        }
    } else {
        echo "Email is incorrect";
    }
}