<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>loginphp</title>
</head>

<body>
	<?php
	
          $Username = $_POST['Username'];
	      $password = $_POST['password'];
	
//database connection
	$conn = new mysqli('localhost','root','','login');
	if($conn->connect_error){
		die('connection failed : '.$conn->connect_error);
	}else{
		$stmt = $conn->prepare("insert into registration(Username,password)
		values(?,?)");
		$stmt->bind_param("ss",$Username,$password);
		$stmt->execute();
		echo "<h2>login successful....</h2>";
		$stmt->close();
		$conn->close();
	}
	
	
