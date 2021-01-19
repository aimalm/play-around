<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<title>Casino royale - guessing game</title>
</head>
<body>
	<form action="index.php" method="post">
	<div class="container mb-3">
		<h3>Casino royale - guessing game</h3>
		<label for="exampleInputEmail1" class="form-label">Type a Number</label>
		<input name="guessingValue" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" > <br>
		<div> <?php if(isset($_POST['submit'])){ $game->validation();} ?></div>
		<div>
			<p name="attempt" ><h4>Attempt: </h4><?php echo $game->attempt; ?></p>
			<p name="result" ><?php $game->result() ?></p>
		
		</div>
	<button name="submit" type="submit" class="btn btn-primary"> <?php $game->btnName(); ?></button>
	</div>
	</form>
	

</body>
</html>