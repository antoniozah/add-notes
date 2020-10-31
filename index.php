<?php 
	include('config/db_connect.php');

	// query for all notes (table of our database)
	$sql = "
	SELECT subject, note, DATE_FORMAT(date_todo, '%d-%m-%Y') as date_todo_upd, id FROM notes ORDER BY create_at 
		";
	
	//make the query to get the results from database 
	$result = mysqli_query($conn, $sql);

	//fetch each record (row) as an array 
	$notes = mysqli_fetch_all($result, MYSQLI_ASSOC);

	//free result from memory
	mysqli_free_result($result);

	//close connection  
	mysqli_close($conn);

 ?>

<!DOCTYPE html>
<html>

<?php include('./header.php');?>
	
	<h3 class="center grey-text">Notes</h3>

	<div class="container">	
			<div class="row">
				<?php foreach($notes as $note): ?>
						<div class="col s12 m6">
							<div class="card hoverable">
								<div class="card-content center">
									<h5><?php echo htmlspecialchars($note['subject']); ?></h5>
									<div><?php echo htmlspecialchars($note['note']); ?></div>
									<div class="blue-text"><?php echo htmlspecialchars($note['date_todo_upd']); ?></div>
								</div>
								<div class="card-action right-align">
									<a href="note_details.php?id=<?php echo $note['id']; ?>" class="brand-text">more...</a>
								</div>
							</div>
						</div>
				<?php endforeach; ?>
			</div>
	</div>	

<?php include('./footer.php');?>

</html>