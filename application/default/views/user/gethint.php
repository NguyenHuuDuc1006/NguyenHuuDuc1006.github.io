<?php

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
    $servername = "localhost";
    $dbname = "d3t";
    $db_username = "root";
    $db_password = "";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $db_username, $db_password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //SELECT `username``password` FROM `customers` WHERE `username``
        $stmt = $conn->prepare("SELECT `email` FROM `customers` WHERE `email`=:email");
        $stmt->bindParam(':email', $email);

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $email = test_input($q);

        $stmt->execute();
        $check = $stmt->rowCount();
        if ($check == 1) {
            $hint = "Email đã sử dụng";
        }
    } catch (Exception $e) {
        echo '(^v^) : ' . $e->getMessage();
    }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "" : $hint;
?> 