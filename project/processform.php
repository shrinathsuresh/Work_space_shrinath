<?php
$FirstName = $_POST["FirstName"];
$LastName = $_POST["LastName"];
$Emailid = $_POST["Emailid"];
$PhoneNumber = $_POST["PhoneNumber"];
$Password = $_POST["Password"];
$ConfirmPassword = $_POST["ConfirmPassword"];

if (!empty($FirstName) || !empty($LastName) || !empty($Emailid) || !empty($PhoneNumber) || !empty($Password) || !empty($ConfirmPassword)) {
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "signup";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
        $SELECT = "SELECT Emailid FROM Datas WHERE Emailid = ? LIMIT 1";
        $INSERT = "INSERT INTO Datas (FirstName, LastName, Emailid, PhoneNumber, Password, ConfirmPassword) VALUES (?, ?, ?, ?, ?, ?)";
        // Prepare statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $Emailid);
        $stmt->execute();
        $stmt->store_result();
        $rnum = $stmt->num_rows;
        $stmt->close();

        if ($rnum == 0) {
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("ssssss", $FirstName, $LastName, $Emailid, $PhoneNumber, $Password, $ConfirmPassword);
            $stmt->execute();
            header("Location: pro2.html");
        } else {
            echo "Someone already registered using this email";
        }
        $stmt->close();
        $conn->close();
    }
} else {
    echo "All fields are required";
    die();
}
?>