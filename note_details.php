<?php 
include('config/db_connect.php');

if(isset($_POST['delete'])){
	$delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);

	$sql = "DELETE FROM notes WHERE id = $delete_id";

	if(mysqli_query($conn, $sql)){
		//success
		header('Location:index.php');
	}else{
		//failure 
		echo 'query error: ' .mysqli_error($conn);
	}
}

// check GET request id parameter

if(isset($_GET['id'])){
	$id = mysqli_real_escape_string($conn, $_GET['id']);

	//make sql

	$sql = "SELECT * FROM notes WHERE id = $id";

	//get the query results 

	$result = mysqli_query($conn, $sql);

	//fetch result

	$note = mysqli_fetch_assoc($result);


	mysqli_free_result($result);
	mysqli_close($conn);

}
 ?>


<!DOCTYPE html>
<html>
<?php include('header.php'); ?>
	
	<div class="container">
		<?php if($note): ?>
			<h2 class="center grey-text">Note # <?php echo $note['id']; ?></h2>

		<?php else: ?>
			<h2 class="center grey-text">That ID doesn't exist in our Database</h2>
		<?php endif; ?>
		<div class="card">
			<div class="card-content center">
				<?php if($note): ?>
		        	<h3><?php echo htmlspecialchars($note['subject']); ?></h3>
		        	<div class="note-metas">
		        		<p class="grey-text">Created by:<span class="blue-text"> <?php echo htmlspecialchars($note['email']);?></span></p> 
		        	<p class="grey-text">For: <span class="blue-text"><?php echo htmlspecialchars($note['date_todo']); ?></span></p>
		        	
		        	</div>
		        	<h5><?php echo htmlspecialchars($note['note']); ?></h5>

		        	<div class="edit-options">
		        		<!-- DELETE THIS -->
			        	<form action="note_details.php" method="post">
			        		<input type="hidden" name="delete_id" value="<?php echo $note['id']; ?>">
			        		<input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
			        	</form>

			        	<!-- UPDATE THIS -->

			        	<form action="update.php" method="post">
			        		<input type="hidden" name="update_id" value="<?php echo $note['id']; ?>">
			        		<input type="submit" name="update" value="Update" class="btn brand z-depth-0">
			        	</form>
		        	</div>

		        	

		        	<?php else: ?>
		        	<h5>No notes exists here!</h5>
				<?php endif; ?>
			</div>
		</div>	
	</div>

<?php include('footer.php'); ?>
</html>