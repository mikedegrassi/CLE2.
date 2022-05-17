<?php

/** @var mysqli $db */
require_once "connect.php";

if (isset($_POST['submit'])) {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST['email'];
    $payment = $_POST['payment'];
    $comment = $_POST['comment'];
    $date = $_POST['date'];
    $timeset = $_POST['time'];
    $timelabel = $_POST['timelabel'];


    $query = "INSERT INTO `information`(`id`, `firstname`, `lastname`, `date`, `time`, `phonenumber`, `email`, `paymethod`, `opmerking`) 
    VALUES ('','$fname','$lname','$date','$timeset','$phonenumber','$email', '$payment', '$comment')";

    mysqli_query($db, $query);

    $query = "UPDATE `times` SET `$timelabel` ='Bezet' WHERE date = '$date'";

    mysqli_query($db, $query);

    header('Location: confirmed.php');

}

?>



