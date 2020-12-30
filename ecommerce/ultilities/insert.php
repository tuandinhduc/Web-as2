<?php

include '../include/config.php';

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$address = $_POST["address"];
$city = $_POST["city"];
$email = $_POST["email"];
$pwd = $_POST["pwd"];

$result = $mysqli->query('SELECT email from users order by id asc');

if($result){
	while($obj = $result->fetch_object()){
		if($obj->email === $email) {
			$emailErr = "Same email for two account";
		}
	}
}

else if($mysqli->query("INSERT INTO users (fname, lname, address, city, email, password) VALUES('$fname', '$lname', '$address', '$city', '$email', '$pwd')")){
	echo 'Data inserted';
	echo '<br/>';
	header ("location:../pages/login.php");
}

?>
