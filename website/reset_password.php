<?php
// Connect to the database
$con = mysqli_connect("localhost", "root", "baba2003", "register");

// Check if the form is submitted
if(isset($_POST['submit'])){
    // Get the email address entered in the form
    $email = mysqli_real_escape_string($con, $_POST['email']);

    // Check if the email exists in the database
    $query = "SELECT * FROM register WHERE email='$email'";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0){
        // Email exists, generate a new password and update it in the database
        $newPassword = generateRandomPassword();
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        $query = "UPDATE register SET Pword='$newPassword' WHERE email='$email'";
        mysqli_query($con, $query);

        // Send the new password to the user's email address (implementation not included)

        // Display a success message
        echo "Password reset successful. Here is your new password.";
        echo $newPassword;
    } else {
        // Email does not exist in the database
        echo "Email not found. Please enter a valid email address.";
    }
}

// Function to generate a random password
function generateRandomPassword($length = 8) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $password;
}

// Close the database connection
mysqli_close($con);
?>
