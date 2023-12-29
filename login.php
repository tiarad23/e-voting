<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_POST['login'])){
		$voter = $_POST['username'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM user WHERE username = '$voter' and password = '$password'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'username salah';
		}
		else{
			$row = $query->fetch_assoc();
			if($row['level'] == "admin" ){
				$_SESSION['admin'] = $row['id'];
				header('location: admin/index.php');
			}
			else{
				$_SESSION['voter'] = $row['id'];
				header('location: index.php');
			}
		}
		
	}
	else{
		$_SESSION['error'] = 'Input voter credentials first';
	}

	

?>