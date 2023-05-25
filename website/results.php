<?php

$con = mysqli_connect("localhost", "root", "baba2003", "register");

$query = "SELECT * FROM candidates";

$result = mysqli_query($con, $query)->fetch_all();

?>
<!DOCTYPE html>
<html>
<head>
	<title>University Online Voting System - Results</title>
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
      <li class="nav-item">
        <a class="nav-link" href="vote.php">Vote</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="results.php">Results</a>
      </li>
    </ul>
  </div>
</nav>

<!-- Results Table -->
<div class="container mt-5">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header text-center">
					<h4>Election Results</h4>
				</div>
				<div class="card-body">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Candidate Name</th>
								<th>Position</th>
								<th>Votes</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($result as $candidate) : ?>
								<tr>
    							<td> <?php echo $candidate[1] ?> </td>
    							<td><?php echo $candidate[2] ?></td>
    							<td><?php echo $candidate[3] ?></td>
    							</tr>
							<?php endforeach ?>
							</tbody>
							</table>