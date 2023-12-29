<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		

		$sql = "SELECT * FROM user WHERE username = '$username' and password = '$password'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'username salah';
		}
		else{
			$row = $query->fetch_assoc();
			if($row['level'] == "voter" ){
				$_SESSION['voter'] = $row['id'];
				header('location: ../index.php');
			}
			else{
				$_SESSION['admin'] = $row['id'];
				header('location: index.php');
			}
		}
		
	}
	else{
		$_SESSION['error'] = 'Input admin credentials first';
	}


?>