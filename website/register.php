<?php
// Connect to the database
$con = mysqli_connect("localhost", "root", "baba2003", "register");

// Check if the connection was successful
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get the form data and perform basic validation
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Perform additional validation if necessary

    // Insert the data into the database
    $query = "INSERT INTO register (fname, email, pword) VALUES ('$name', '$email', '$password')";
    if (mysqli_query($con, $query)) {
        // Redirect to the login page
        header("Location: login.php");
        exit();
    } else {
        // Handle database insertion error
        die("Error: " . mysqli_error($con));
    }
}

// Close the database connection
mysqli_close($con);
?>
