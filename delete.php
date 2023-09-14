<?php

require "database.php";

$id = $_GET["id"];
$statement = $conn->prepare("select * from contacts where id = :id ");
$statement->execute([":id"=>$id]);
 if($statement->rowCount()==0){
  http_response_code(404);
  echo("HTTP 404 NOT FOUND");
  return;
} 

$conn -> prepare("delete from contacts where id = :id ")->execute([":id"=>$id]);
/* $statement = $conn->prepare("delete from contacts where id = :id ");
$statement->bindParam(":id",$id);
$statement->execute();  */
// $statement->execute([":id"=>$id]);


header("Location: index.php");
?>
