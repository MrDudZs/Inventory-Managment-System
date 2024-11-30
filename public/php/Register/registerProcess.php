<?php
session_start();
include '../DB-Connection/configDB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $password = $_POST['password'];
    $job_role = $_POST['role_name'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Find id assgined to job name for permission_level
    $sql_job = "SELECT job_id FROM job_roles WHERE job_name = ?";
    $stmt_job = $conn->prepare($sql_job);
    $stmt_job->bind_param("s", $job_role);
    $stmt_job->execute();
    $stmt_job->bind_result($job_id);
    $stmt_job->fetch();
    $stmt_job->close();

    $sql = "INSERT INTO staff (first_name, surname, email, dob, password, job_role, permission_level) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $first_name, $surname, $email, $dob, $hashed_password, $job_role, $job_id);

    if ($stmt->execute()) {
        echo "User registered successfully";
        header("Location: ../../login.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
