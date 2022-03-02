<?php
include_once("config.php");

// Add action
if(isset($_POST['addNewItemButton'])) {	
	$name = mysqli_real_escape_string($connect, $_POST['name']);
	$content = mysqli_real_escape_string($connect, $_POST['content']);
	$time = mysqli_real_escape_string($connect, $_POST['time']);
		
	if(empty($name) || empty($content) || empty($time)) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($content)) {
			echo "<font color='red'>Content field is empty.</font><br/>";
		}
		
		if(empty($time)) {
			echo "<font color='red'>Time field is empty.</font><br/>";
		}
		
		header("Location: index.php");
	} else { 
		$result = mysqli_query($connect, "INSERT INTO education(name,content,time) VALUES('$name','$content','$time')");
		
		header("Location: index.php");
	}
}

// Update action
if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($connect, $_POST['id']);
	
	$name = mysqli_real_escape_string($connect, $_POST['name']);
	$content = mysqli_real_escape_string($connect, $_POST['content']);
	$time = mysqli_real_escape_string($connect, $_POST['time']);	
	
	if(empty($name) || empty($content) || empty($time)) {	
			
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($content)) {
			echo "<font color='red'>Content field is empty.</font><br/>";
		}
		
		if(empty($time)) {
			echo "<font color='red'>Time field is empty.</font><br/>";
		}		
	} else {	
		$result = mysqli_query($connect, "UPDATE education SET name='$name',content='$content',time='$time' WHERE id=$id");
	
		header("Location: index.php");
	}
}

//Delete action
if(isset($_POST['delete'])) {
	$id = mysqli_real_escape_string($connect, $_POST['id']);

	$result = mysqli_query($connect, "DELETE FROM education WHERE id=$id");

	header("Location: index.php");
}
?>