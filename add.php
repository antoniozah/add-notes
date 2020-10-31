<?php 

	include('config/db_connect.php');

	$email = $subject = $date = $note = '';
	$errors = ['email'=>'', 'subject'=>'', 'date'=>'', 'note'=>''];


	if(isset($_POST['submit'])){ //check if form is submited
		$email = $_POST['email']; //use of htmlspecialchars(string)  for XSS Attacks
		$subject = $_POST['subject'];
		$date = $_POST['date'];
		$note = $_POST['note'];

		if(empty($email)){
			$errors['email'] = '* An email is required';
		}else{
			// validation  filter_var(variable)
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errors['email'] = 'email must be a valid email address';
			}
		}
		if(empty($subject)){
			$errors['subject'] = '* A subject is required';
		}else{
			//use preg_match(pattern, subject) for regular expression check
			if(!preg_match('/^[a-zA-Z\s]+$/', $subject)){
				$errors['subject'] = 'Subject must be letters and spaces only';
			}
		}
		if(empty($date)){
			$errors['date'] = '* Required a date';
		}

		if(empty($note)){
			$errors['note'] = '* Enter a note';
		}
		if(array_filter($errors)){
			// echo 'errors in the form';
		}else{
			//add data to our database 
			//escape mailicious sql characters(protecting our database )
			$email = mysqli_real_escape_string($conn, $_POST['email']);
			$subject = mysqli_real_escape_string($conn, $_POST['subject']);
			$date = mysqli_real_escape_string($conn, $_POST['date']);
			$note = mysqli_real_escape_string($conn, $_POST['note']);

			//create sql
			$sql = "INSERT INTO notes(subject,email,date_todo, note) VALUES('$subject', '$email', '$date', '$note')";

			//save to database and check 

			if(mysqli_query($conn, $sql)){
				header('Location: index.php'); //redirect to the specific url
			}else{
				echo 'query error: ' .mysqli_error($conn);
			}
			
		}

	}//end of chech the POST method
 ?>

 <!DOCTYPE html>
 <html>
 	<?php include('./header.php'); ?>

 		<section class="container grey-text">
			<h3 class="center">Add a Note</h3>
			<form class="white" action="add.php" method="post">
				<label>Your Email</label>
				<input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">
				<div class="red darken-1 white-text"><?php echo $errors['email']; ?></div>
				<label>Your Subject</label>
				<input type="text" name="subject" value="<?php echo htmlspecialchars($subject); ?>">
				<div class="red darken-1 white-text"><?php echo $errors['subject']; ?></div>
				<label>Date</label>

				<input type="date" name="date" value="<?php echo htmlspecialchars($date); ?>">
				<div class="red darken-1 white-text"><?php echo $errors['date']; ?></div>
				<label>Your Note</label>
				<input type="text" name="note" value="<?php echo htmlspecialchars($note); ?>">
				<div class="red darken-1 white-text"><?php echo $errors['note']; ?></div>
				<div class="center">
					<input type="submit" name="submit" value="Add Note" class="btn brand hoverable #3949ab indigo darken-1 white-text">
				</div>
			</form>
			<div class="form-response">
			</div>
		</section>

 	<?php include('./footer.php'); ?>
 </html>