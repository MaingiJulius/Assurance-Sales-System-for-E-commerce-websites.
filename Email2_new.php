<?php

if(isset($_POST['submit']))  {

$Name = $_POST['Name'];
$Email = $_POST['Email'];
$Continent = $_POST['Continent'];
$Message = $_POST['Message'];

if(mail($Name, $Email, $Continent, $Message)) {

echo "Email Sent Successfully";
} else{
 echo "Email Failed";
}


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <title>Html form submission</title>
    <link rel="stylesheet" href="Email2.css">
</head>
<body>

<div class="container">

    <h1> Form Submission to Email </h1>

    <form action="Email2_new.php" method="POST">

        <label for="Name"> Name:</label>
        <input type="text" name="Name"  id="Name" placeholder="Full Name" required>


<label for="Email"> Email:</label>
        <input type="email" name="Email"  id="Email" placeholder="Email" required>

        <label for="Continent"> Continent</label>
        <select name="Continent" id="Continent">

            <option> Africa </option>
            <option> Asia </option>
            <option> Australia </option>
            <option> North America </option>
            <option> South America </option>
            <option> Europe </option>

        </select>

        <label for="Message"> Message:</label>
        <textarea name="Message" id="Message" placeholder="Message" required></textarea>

<button type="submit"> SEND </button>


    </form>

</div>

</body>
</html>