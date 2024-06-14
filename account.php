<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

$server_name = "localhost";
$username = "root";
$password = "";
$database_name = "reg";

$conn = mysqli_connect($server_name, $username, $password, $database_name);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

if (isset($_POST['save'])) {
    $RegUsername = $_POST['RegUsername'];
    $RegEmail = $_POST['RegEmail'];
    $RegPassword = $_POST['RegPassword'];
    $RegConfirmPassword = $_POST['RegConfirmPassword'];

      // Check if passwords match
        if ($RegPassword !== $RegConfirmPassword) {
            echo "Passwords do not match";
            exit();
        }

        // Check if password meets complexity requirements
        //ensure that the password contains at least one uppercase letter,
        //one lowercase letter, one digit, one special character, and is at least 8 characters long
            if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()-_=+{};:,<.>])(?=.*[^\w\d\s]).{8,}$/', $RegPassword)) {
                echo "Password must contain at least one uppercase letter, one lowercase letter, one digit, one special character,
                 and be at least 8 characters long.";
                exit();
            }

            ///^: Denotes the start of the string.
           // (?=.*[a-z]): Positive lookahead assertion. Checks if the string contains at least one lowercase letter.
           //   (?=.*[A-Z]): Positive lookahead assertion. Checks if the string contains at least one uppercase letter.
           //  (?=.*\d): Positive lookahead assertion. Checks if the string contains at least one digit.
           // (?=.*[!@#$%^&*()-_=+{};:,<.>]): Positive lookahead assertion. Checks if the string contains at least one special character from the specified set.
           //  (?=.*[^\w\d\s]): Positive lookahead assertion. Checks if the string contains at least one character that is not alphanumeric or whitespace.
           //  .{8,}: Matches any character (except newline) and ensures that the string is at least 8 characters long.
           //  $: Denotes the end of the string.


           // Check if username meets criteria
               if (!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $RegUsername)) {
                   echo "Username must contain only alphanumeric characters and underscores, and be between 3 and 20 characters long.";
                   exit();
               }

               // Check if email is valid
               if (!filter_var($RegEmail, FILTER_VALIDATE_EMAIL)) {
                   echo "Invalid email address";
                   exit();
               }

               // Additional validation to restrict email domain
               $allowed_domains = array("gmail.com","yahoo.com","hotmail.com");
               $email_parts = explode("@", $RegEmail);
               $email_domain = end($email_parts);
               if (!in_array($email_domain, $allowed_domains)) {
                   echo "Invalid Email Address";
                   exit();
               }


  // Check if username already exists

    $check_username_query = "SELECT * FROM reg_details WHERE RegUsername='$RegUsername'";
    $result_username = mysqli_query($conn, $check_username_query);
    if (mysqli_num_rows($result_username) > 0) {
        echo "User already exists!";
        exit();
    }

    // Check if email already exists

    $check_email_query = "SELECT * FROM reg_details WHERE RegEmail='$RegEmail'";
    $result_email = mysqli_query($conn, $check_email_query);
    if (mysqli_num_rows($result_email) > 0) {
        echo "Email already exists";
        exit();
    }



//Insert new user if both username and password are unique

    $sql_query = "INSERT INTO reg_details (RegUsername, RegEmail, RegPassword, RegConfirmPassword)
                  VALUES ('$RegUsername','$RegEmail','$RegPassword','$RegConfirmPassword')";

    if (mysqli_query($conn, $sql_query)) {
        echo "New Details Entry inserted successfully!";
    } else {
        echo "Error: " . $sql . "" . mysqli_error($conn);
    }
    mysqli_close($conn);
}

if (isset($_POST['login'])) {
    $LoginUsername = $_POST['LoginUsername'];
    $LoginPassword = $_POST['LoginPassword'];

    // Check if the user exists in the database
    $check_user_query = "SELECT * FROM reg_details WHERE RegUsername='$LoginUsername' AND RegPassword='$LoginPassword'";
    $result = mysqli_query($conn, $check_user_query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            // User exists, perform login
            echo "Login successful!";

            // Redirect to the main page
            header("Location: project.html");
            exit();
        } else {
            // User does not exist, ask them to register
            echo "Incorrect Username or Password. Please register first.";
        }
    } else {
        // Handle query error
        echo "Error: " . mysqli_error($conn);
    }
}
?>
