<?php

$Name = $_POST["Name"];
$Email = $_POST["Email"];
$Continent = $_POST["Continent"];
$Message = $_POST["Message"];

$mail = "From:".$Name."<".$Email.">\r\n";

$recipient = 'juliusmaingi09@gmail.com';

mail($recipient, $Continent, $Message, $mail)
or die("Error!");

echo'

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

    <h1> Thank you for contacting me I will get back to you as soon as
        possible </h1>

    <p class="back"> Go back to the <a href="Email2.html">home page</a>. </p>


</div>

</body>
</html>


';

?>