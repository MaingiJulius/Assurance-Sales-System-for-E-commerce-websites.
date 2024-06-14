<?php
$server_name = "localhost";
$username = "root";
$password = "";
$database_name = "aboutUs";

// Establish database connection
$conn = mysqli_connect($server_name, $username, $password, $database_name);

// Check if connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted

if( isset($_POST['save'])) {

  //if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];

    // Prepare SQL query
    $sql_query = "INSERT INTO aboutUs_details (name,  email,  comment)
                  VALUES ('$name',  '$email', '$comment')";

    // Execute SQL query
    if (mysqli_query($conn, $sql_query)) {
        echo "Thank you for reaching out. We will get back to you soonest.";
    } else {
        echo "Error: " . $sql_query . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Form submission method is not POST.";
}

// Close database connection
mysqli_close($conn);
?>
