<?php

$name1 = $_POST["name1"];
$name2 = $_POST["name2"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$message = $_POST["message"];



echo $name1;
echo $name2;
echo $email;
echo $phone;
echo $message;




$mail = "From:".$name1."<".$name2."<".$email.">\r\n";

$recipient = 'juliusmaingi09@gmail.com';

mail($recipient, $phone, $message, $mail)
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

    <p class="back"> Go back to the <a href="contact.html">home page</a>. </p>


</div>

</body>
</html>


';

?>