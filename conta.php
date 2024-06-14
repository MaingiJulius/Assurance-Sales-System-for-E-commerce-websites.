<?php
$server_name = "localhost";
$username = "root";
$password = "";
$database_name = "contact1";

// Establish database connection
$conn = mysqli_connect($server_name, $username, $password, $database_name);

// Check if connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name1 = $_POST['name1'];
    $name2 = $_POST['name2'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Validation for first name and last name (alphabetic characters only)
    if (!preg_match("/^[a-zA-Z]+$/", $name1) || !preg_match("/^[a-zA-Z]+$/", $name2)) {
        echo "First name and last name must contain only alphabetic characters.";
    }
    // Validation for email format
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address.";
    }

    // Additional validation to restrict email domain
                   $allowed_domains = array("gmail.com","yahoo.com","hotmail.com");
                   $email_parts = explode("@", $email);
                   $email_domain = end($email_parts);
                   if (!in_array($email_domain, $allowed_domains)) {
                       echo "Invalid Email Address";
                       exit();
                   }

    // Validation for phone number (numbers only)
    elseif (!preg_match("/^[0-9]+$/", $phone)) {
        echo "Phone number must contain only numeric characters.";
    }


    // Check if all fields are filled
    elseif (empty($name1) || empty($name2) || empty($email) || empty($phone) || empty($message)) {
        echo "All fields are required.";
    } else {
        // Prepare SQL query
        $sql_query = "INSERT INTO contact1_details (name1, name2, email, phone, message)
                      VALUES ('$name1', '$name2', '$email', '$phone', '$message')";

        // Execute SQL query
        if (mysqli_query($conn, $sql_query)) {
            echo "Thank you for reaching out. We will get back to you soonest.";
        } else {
            echo "Error: " . $sql_query . "<br>" . mysqli_error($conn);
        }
    }
} else {
    echo "Form submission method is not POST.";
}


// Close database connection
mysqli_close($conn);
?>