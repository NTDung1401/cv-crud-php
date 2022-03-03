<?php
$host = "ec2-44-194-67-28.compute-1.amazonaws.com";
$user = "uynayhduoxnokb";
$password = "bd6991e567142e0b4d46cadefb8d3f10c14247ee32769d5e6df6052bf77329f5";
$dbname = "d8l4fg0bq8bp98";
$port = "5432";

try{
  //Set DSN data source name
  $dsn = "pgsql:host=" . $host . ";port=" . $port .";dbname=" . $dbname . ";user=" . $user . ";password=" . $password . ";";


  //create a pdo instance
  $pdo = new PDO($dsn, $user, $password);
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
}
?>