<?php
if (isset($_REQUEST['name']) && isset($_REQUEST['lastname']) && isset($_REQUEST['phone']) && isset($_REQUEST['mail'])) {
    $name = $_REQUEST['name'];
    $lastName = $_REQUEST['lastname'];
    $phone = $_REQUEST['phone'];
    $mail = $_REQUEST['mail'];

    echo "<h1>Info Print</h1>";
    echo "The Name is $name $lastName.<br>";
    echo "Phone Number is: $phone<br>";
    echo "Email Address: $mail<br>";
} else {
    echo "No information was submitted.";
}
?>
