<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $Emailid = $_POST['Emailid'];
    $Password = $_POST['Password'];

    // Database Connection
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "data";

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Validate login
    $query = "SELECT * FROM student WHERE Emailid=? AND Password=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $Emailid, $Password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Login success
        header("Location: New.html");
        exit(); // Exit after redirection
    } else {
        // Login failed
        echo '<script>alert("Incorrect Emailid or password!");</script>';
        // Redirect to login page or display error message
        header("Location: login.html"); // Redirect to login page
        exit(); // Exit after redirection
    }

    // Close database connection
    $stmt->close();
    $conn->close();
}
?>
