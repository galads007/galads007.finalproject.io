<?php
session_start();

// Connect to the database
$con = mysqli_connect("localhost", "root", "baba2003", "register");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validate and process the login
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = "SELECT * FROM register WHERE email = '$email'";

    $user = mysqli_query($con, $query)->fetch_assoc();
    // var_dump($user->fetch_assoc());
    // echo $user["Pword"];
    // Perform authentication (replace with your own logic)
    if ($user && $user["Pword"]==$password) {
        // Store the user's login status in a session variable
        $_SESSION["logged_in"] = true;
        $_SESSION["email"] = $email;

        // Redirect to the home page
        header("Location: home.php");
        exit;
    } else {
        // Invalid credentials, redirect back to login page
        //header("Location: login.php");
        echo ("Invalid Username or Password");
        //echo("Location: login.html");
        exit;
    }
} else {
    // Redirect back to login page
    header("Location: login.html");
    exit;
}
?>
