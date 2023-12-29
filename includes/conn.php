<?php
try{
	$conn = new mysqli('localhost', 'root', '', 'votesystem');
}catch(Exception $i){
	    $conn = new mysqli('192.168.1.12', 'ubuntu', '1234', 'votesystem');
}
?>