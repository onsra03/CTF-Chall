<?php
	// Kết nối đến database
	$severname = "localhost";
	$username = "root";
	$password = "";
	$database = "test1";
	$db = mysqli_connect($severname, $username, $password, $database);
	
	// Lấy dữ liệu từ login form
	$un = $_POST['uname'];
	$pw = $_POST['psw'];
	
	$un = strtolower($un);
	$pw = strtolower($pw);
	// Accuracy
	if (preg_match("/[0-9]/", $un) || preg_match("/or/", $un) || preg_match("/true/", $un)|| preg_match("/false/", $un)  || preg_match("/=/", $un)|| preg_match("/==/", $un)|| preg_match("/--/", $un))
	{
		header('Location: hacker_found.html');
		exit;
	}
  	if (preg_match("/[0-9]/", $pw) || preg_match("/or/", $pw) || preg_match("/true/", $pw)|| preg_match("/false/", $pw)  || preg_match("/=/", $pw)|| preg_match("/==/", $pw)|| preg_match("/--/", $pw))
	{
		header('Location: hacker_found.html');
		exit;
	}
	// Truy vấn đến database, tìm username và password
	$sql = "select * from `user` where username='$un' and password='$pw'";

	//Thực thi truy vấn
	$result = mysqli_query($db, $sql);
	if(mysqli_fetch_assoc($result)){
		include_once('C:\Users\Admin\Desktop\chall\chall\account.html');
	}else{		
		echo "Arsenal vo dich thien ha <3 !!!";
	}
?>