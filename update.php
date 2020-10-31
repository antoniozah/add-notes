<?php 
	include('config/db_connect.php');

	if(isset($_POST['update'])){
		$update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
		$sql_sh = "SELECT * FROM notes WHERE id = $update_id";

		$result = mysqli_query($conn, $sql_sh);

		$note = mysqli_fetch_assoc($result);

		mysqli_free_result($result);
		mysqli_close($conn);
	}


	if(isset($_POST['update_to_db'])){
		$id = mysqli_real_escape_string($conn, $_POST['id']);
		$subject = mysqli_real_escape_string($conn, $_POST['subject']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$date = mysqli_real_escape_string($conn, $_POST['date']);
		$note = mysqli_real_escape_string($conn, $_POST['note']);
		$update_to_db = mysqli_real_escape_string($conn, $_POST['update_to_db']);
		$sql = "UPDATE notes SET subject='$subject', email='$email', date_todo = '$date', note='$note' WHERE id = $id";

		if(mysqli_query($conn, $sql)){
			header('Location:index.php');
		}else{
			echo "query error: " .mysqli_error($conn);
		}
	}

 ?>

 <!DOCTYPE html>
 <html>
 	<?php include('./header.php'); ?>

 	<div class="container">
 		<?php if($note): ?>
		<form class="white" action="update.php" method="post">
			<input type="hidden" name="id" value="<?php echo htmlspecialchars($note['id']); ?>">
			<label>Your Subject</label>
			<input type="text" name="subject" value="<?php echo htmlspecialchars($note['subject']); ?>">
			<label>Your Email</label>
			<input type="text" name="email" value="<?php echo htmlspecialchars($note['email']); ?>">
			<label>Your Date</label>
			<input type="date" name="date" value="<?php echo htmlspecialchars($note['date_todo']); ?>">
			<label>Your Note</label>
			<input type="text" name="note" value="<?php echo htmlspecialchars($note['note']); ?>">
			<div class="center">
				<input type="submit" name="update_to_db" value="Update" class="btn brand hoverable #3949ab indigo darken-1 white-text">
			</div>
		</form>
		<?php else: ?>
			<h5>Thanks for Updating The content!!!</h5>
		<?php endif; ?>
 	</div>

 	<?php include('./footer.php'); ?>
 
 </body>
 </html>