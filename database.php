<?php

$host = "localhost";
$database = "contacts_app";
$user = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$host;dbname=$database",$user,$password);
// foreach ($conn->query("show databases") as $key) {
//   print_r($key);
// }

} catch (PDOException $e) {
  die("PDO Connection Error: ".$e->getMessage());
}
