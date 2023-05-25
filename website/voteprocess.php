<?php
// Read the current vote counts from the database file
// $database = file_get_contents('results.txt');
// $votes = explode("\n", $database);

// Process the user's vote
// $position = $_POST['position'];
// $candidate = $_POST['candidate'];

// // Update the vote count for the chosen candidate
// foreach ($votes as &$vote) {
//     $entry = explode("=", $vote);
//     if ($entry[0] === $position . '_' . $candidate) {
//         $entry[1]++;
//         $vote = implode("=", $entry);
//         break;
//     }
// }

// var_dump($_POST);
session_start();
$con = mysqli_connect("localhost", "root", "baba2003", "register");

$email = $_SESSION['email'];

$query = "SELECT * FROM register WHERE email = '$email'";

$user = mysqli_query($con, $query)->fetch_assoc();

if ($user['voted'] == 1) {
    die("Can't vote more than once");
}

$president = $_POST['president'];
$treasurer = $_POST['treasurer'];
$secretary = $_POST['secretary'];

foreach ($_POST as $key => $value) {
    # code...
    $query = "UPDATE candidates SET votes=votes+1 WHERE id=$value";
    mysqli_query($con, $query);
}

$query = "UPDATE register SET voted=1 WHERE email='$email'";
mysqli_query($con, $query);

header('location: results.php');

// Save the updated vote counts to the database file
// file_put_contents('results.txt', implode("\n", $votes));
?>