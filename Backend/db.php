<?php

$host = "sql313.infinityfree.com";
$user = "if0_39653368";
$pass = "2410vXaZxVF";
$db   = "if0_39653368_donations";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
