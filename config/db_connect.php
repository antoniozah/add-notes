<?php 
//connect with our database 
	$conn = mysqli_connect('localhost', 'antoniozah', '5115137a', 'post_note');

	//check our connection 
	if(!$conn){
		echo 'Connection error: ' .mysqli_connect_error();
	}
 ?>