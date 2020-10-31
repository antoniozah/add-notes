<html>
<head>
	<title>PHP Project-1</title>
	<!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<style type="text/css">
	form{
		padding:20px;
		max-width:500px;
		margin: 24px auto;
	}

	.server-response{
		padding:20px;
		max-width:980px;
		margin: 24px auto;
		border:1px solid #3949ab;
	}

	.row{
		display: flex;
		flex-wrap: wrap;
	}

	.note-metas{
		display: flex;
		justify-content: space-around;

	}

	.edit-options{
		display: flex;
		justify-content: center;
	}

	.edit-options form{
		margin:0;
	}

	@media screen and (min-width: 601px) {
		.row .col.m6{
			margin-left: 0;
		}
	}	
	


</style>
<body class="grey lighten-2">
	<nav class="white z-depth-0">
		<div class="container">
			<a href="index.php" class="brand-logo indigo-text">PostNote</a>
			<ul id="nav-mobile" class="right hide-on-small-and-down">
				<li><a href="add.php" class="btn brand hoverable #3949ab indigo darken-1">Add Note</a></li>
			</ul>
		</div>
	</nav>
