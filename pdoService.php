<?php
include_once("pdoConfig.php");

// Add action
if(isset($_POST['addNewItemButton'])) {
  $name = $_POST['name'];
  $content = $_POST['content'];
  $time = $_POST['time'];

  if(empty($name) || empty($content) || empty($time)) {
    header("Location: index.php");
  }else {
    $sql = "INSERT INTO education(name,content,time) VALUES ('$name','$content','$time')";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    header("Location: index.php");
  }

  
}

// Update action
if(isset($_POST['update'])) {
  $id = $_POST['id'];

  $name = $_POST['name'];
  $content = $_POST['content'];
  $time = $_POST['time'];

  if(empty($name) || empty($content) || empty($time)) {
    header("Location: index.php");
  }else {
    $sql = "UPDATE education SET name='$name',content='$content',time='$time' WHERE id=$id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    header("Location: index.php");
  }

  
}

//Delete action
if(isset($_POST['delete'])) {
	$id = $_POST['id'];

	$sql = "DELETE FROM education WHERE id=$id";

  $stmt = $pdo->prepare($sql);
  $stmt->execute();

  header("Location: index.php");
}

?>