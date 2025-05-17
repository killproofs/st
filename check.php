<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "template_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connect error: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $license_code = $_POST['license_code'];
    
    $sql = $conn->prepare("SELECT id FROM license_codes WHERE license_code = ?");
    $sql->bind_param("s", $license_code);
    $sql->execute();
    $result = $sql->get_result();
    
    if ($result->num_rows > 0) {
        $_SESSION['license_valid'] = true;
        header("Location: search.php");
        exit();
    } else {
        echo "License key is wrong.";
    }

    $sql->close();
}

$conn->close();
?>
