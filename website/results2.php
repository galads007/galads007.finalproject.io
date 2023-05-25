<?php
// Read the current vote counts from the database file
$con = mysqli_connect("localhost", "root", "baba2003", "register");

$query = "SELECT * FROM candidates";

$result = mysqli_query($con, $query)->fetch_all();

// var_dump($result);


// Display the vote counts in a table
echo "<table>";
echo "<thead><tr><th>Candidate Name</th><th>Position</th><th>Votes</th></tr></thead>";
echo "<tbody>";

foreach ($result as $candidate) {

    echo "<tr>";
    echo "<td>" . $candidate[0] . "</td>";
    echo "<td>" . $candidate[1] . "</td>";
    echo "<td>" . $candidate[2] . "</td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";
?>