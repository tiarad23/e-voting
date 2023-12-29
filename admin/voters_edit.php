<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$firstname = $_POST['firstname'];
		$username = $_POST['username'];
		$lastname = $_POST['lastname'];
		$password = $_POST['password'];
		echo $id;

		$sql = "SELECT * FROM user WHERE id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		if($password == $row['password']){
			$password = $row['password'];
		}
		

		$sql = "UPDATE user SET username ='$username',firstname = '$firstname', lastname = '$lastname', password = '$password' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Voter updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location: voters.php');

?>