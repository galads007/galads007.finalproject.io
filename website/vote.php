<?php

$con = mysqli_connect("localhost", "root", "baba2003", "register");

$query = "SELECT * FROM candidates";

$result = mysqli_query($con, $query)->fetch_all();

function isPresident($candidate) {
	return strtolower($candidate[2]) == "president";
}

function isTreasurer($candidate) {
	return strtolower($candidate[2]) == "treasurer";
}

function isSecretary($candidate) {
	return strtolower($candidate[2]) == "secretary";
}

$presidents = array_filter($result, 'isPresident');
$treasurers = array_filter($result, 'isTreasurer');
$secretaries = array_filter($result, 'isSecretary');

// var_dump($presidents);

?>
<!DOCTYPE html>
<html>
<head>
	<title>University Online Voting System - Vote</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="home.html">IBB University Online Voting System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="home.php">Home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="vote.php">Vote</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="results.php">Results</a>
      </li>
    </ul>
  </div>
</nav>

<!-- Voting Form -->
<div class="container mt-5">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header text-center">
					<h4>Vote for University Positions</h4>
				</div>
				<div class="card-body">
					<form method="POST" action="voteprocess.php">
						<div class="form-group">
							<label for="president">President:</label>
							<select class="form-control" id="president" name="president">
								<option value="">Select a candidate</option>
								<?php foreach ($presidents as $president): ?>
									<option value="<?php echo $president[0] ?>"><?php echo $president[1] ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group">
							<label for="treasurer">Treasurer:</label>
							<select class="form-control" id="treasurer" name="treasurer">
								<option value="">Select a candidate</option>
								<?php foreach ($treasurers as $treasurer): ?>
									<option value="<?php echo $treasurer[0] ?>"><?php echo $treasurer[1] ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group">
							<label for="secretary">Secretary:</label>
							<select class="form-control" id="secretary" name="secretary">
								<option value="">Select a candidate</option>
								<?php foreach ($secretaries as $sec): ?>
									<option value="<?php echo $sec[0] ?>"><?php echo $sec[1] ?></option>
								<?php endforeach ?>
							</select>
							<button type="submit" class="btn btn-primary">Submit Vote</button>

						</div>
								
