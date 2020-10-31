<?php 
//connect with our database 
	$conn = mysqli_connect('localhost', 'test', 'test', 'post_note');

	//check our connection 
	if(!$conn){
		echo 'Connection error: ' .mysqli_connect_error();
	}
 ?>
