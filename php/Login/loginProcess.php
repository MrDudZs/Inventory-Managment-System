<?PHP

session_start();

include '../DB-Connection/configDB.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$staff_email = $_POST['email'];
$provided_password = $_POST['password'];

$stmt = $conn->prepare("SELECT `personalID`, `first_name`, `surname`, `password`, `dob`, `email`, `permission_level`, `job_role` FROM `staff` WHERE email=?");

$stmt->bind_param("s",$staff_email);

$stmt->execute();

$result = $stmt->get_result();


if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $hashed_password_from_db = $row['password'];

    if (password_verify($provided_password, $hashed_password_from_db)) {

        $_SESSION['user_id'] = $row['personalID'];
        $_SESSION['user_email'] = $row['email'];
        

        header("Location: ../../dashboard.php");
        exit();
    } else {
        echo "Invalid password.";
    }
} else {
    echo "No user found with that email.";
}