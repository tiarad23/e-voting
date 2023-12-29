<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$username = $_POST['username'];
		$firstname = $_POST['username'];
		$lastname = $_POST['lastname'];
		//$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$password = $_POST['password'];
		$filename = $_FILES['photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}
		//generate voters id
		$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$voter = substr(str_shuffle($set), 0, 15);
		$waktu = date('Y-m-d');
		$sql = "INSERT INTO user (id,username, password, firstname, lastname, photo,created_on,level) VALUES ('$voter','$username', '$password', '$firstname', '$lastname', '$filename','$waktu','voter')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Voter added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: voters.php');
?>