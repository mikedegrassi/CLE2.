<?php
session_start();

/** @var mysqli $db */
require_once "connect.php";

if (isset($_POST['submit'])) {

    $date = $_POST['date'];
    $timeset = $_POST['time'];
    $timelabel = $_POST['timelabel'];

    $_SESSION['date'] = $date;
    $_SESSION['time'] = $timeset;
    $_SESSION['timelabel'] = $timelabel;

    $_SESSION['delete'] = "Deze tijd is nu bezet";

    $query = "UPDATE `times` SET `$timelabel` = '$timeset is bezet' WHERE date = '$date'";

    mysqli_query($db, $query);

    header("Location: admin_info.php");
}

