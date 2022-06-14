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
	  $con = new mysqli("localhost","root","","login");
	  if($con->connect_error){
		  die("Failed to connect :".$con->connect_error);
	  } else{
		  $stmt = $con->prepare("select * from registration where Username = ?");
		  $stmt->bind_param("s", $Username);
		  $stmt->execute();
		  $stmt_result = $stmt->get_result();
		  if($stmt_result->num_rows > 0) {
			  $data = $stmt_result->fetch_assoc();
			  if($data['password'] === $password){
				  echo "<h2>Login Successful</h2>";
			  } else{
				   echo "<h2>Invalid username or password</h2>";
			  }
		  } else{
			  echo "<h2>Invalid username or password</h2>";
		  }
	  }
?>
</body>
</html><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>