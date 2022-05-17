<?php
session_start();

$error = "";

//if user is not logged in the user will be redirected login.php
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

//Require DB settings with connection variable
/** @var mysqli $db */
require_once "connect.php";

//get date and time from admin_time.php
if (isset($_POST['submit'])) {

    $date = $_POST['date'];
    $timeset = $_POST['time'];


    $_SESSION['date'] = $date;
    $_SESSION['time'] = $timeset;

}elseif ($_SESSION['time']){
    $timeset = $_SESSION['time'];
}

//give error if no time is send with the post
if ($timeset == '') {

    $_SESSION['timefail'] = "Er moet een tijd ingevuld worden";
    header("Location: admin_time.php");

}

if (isset($_POST['submit'])) {

//Get the record from the database result
    $query = "SELECT * FROM  times WHERE date = '$date'";
    $result = mysqli_query($db, $query) or die ('Error: ' . $query);
    $time = mysqli_fetch_assoc($result);

    $timelabel = "";

    //give timelabel correct value depending on what time is send
        if ($timeset === $time['time'] || $timeset === "12:00-12:30" ) {
            $timelabel = "time";
        }

        if ($timeset === $time['time2'] || $timeset === "12:30-13:00" ) {
            $timelabel = "time2";
        }

        if ($timeset === $time['time3'] || $timeset === "13:00-13:30" ){
            $timelabel = "time3";
        }

        if ($timeset === $time['time4'] || $timeset === "13:30-14:00" ) {
            $timelabel = "time4";
        }

        if ($timeset === $time['time5'] || $timeset === "14:00-14:30" ) {
            $timelabel = "time5";
        }

        if ($timeset === $time['time6'] || $timeset === "14:30-15:00" ) {
            $timelabel = "time6";
        }

        if ($timeset === $time['time7'] || $timeset === "15:00-15:30" ) {
            $timelabel = "time7";
        }

        if ($timeset === $time['time8'] || $timeset === "15:30-16:00" ) {
            $timelabel = "time8";
        }

        if ($timeset === $time['time9'] || $timeset === "16:00-16:30" ) {
            $timelabel = "time9";
        }

        if ($timeset === $time['time10'] || $timeset === "16:30-17:00" ) {
            $timelabel = "time10";
        }

        if ($timeset === $time['time11'] || $timeset === "17:00-17:30" ) {
            $timelabel = "time11";
        }

        if ($timeset === $time['time12'] || $timeset === "17:30-18:00" ) {
            $timelabel = "time12";
        }

        if ($timeset === $time['time13'] || $timeset === "18:00-18:30" ) {
            $timelabel = "time13";
        }

        if ($timeset === $time['time14'] || $timeset === "18:30-19:00" ) {
            $timelabel = "time14";
        }

        if ($timeset === $time['time15'] || $timeset === "19:00-19:30" ) {
            $timelabel = "time15";
        }

        if ($timeset === $time['time16'] || $timeset === "19:30-20:00" ) {
            $timelabel = "time16";
        }

        if ($timeset === $time['time17'] || $timeset === "20:00-20:30" ) {
            $timelabel = "time17";
        }
        if ($timeset === $time['time18'] || $timeset === "20:30-21:00" ) {
            $timelabel = "time18";
        }

        if ($timeset === $time['time19'] || $timeset === "21:00-21:30" ) {
            $timelabel = "time19";
        }

        if ($timeset === $time['time20'] || $timeset === "21:30-22:00" ) {
            $timelabel = "time20";
        }

        if ($timeset === $time['time21'] || $timeset === "22:00-22:30" ) {
            $timelabel = "time21";
        }

        if ($timeset === $time['time22'] || $timeset === "22:30-23:00" ) {
            $timelabel = "time22";
        }

        if ($timeset === $time['time23'] || $timeset === "23:00-23:30" ) {
            $timelabel = "time23";
        }

        if ($timeset === $time['time24'] || $timeset === "23:30-00:00" ) {
            $timelabel = "time24";
        }



}

//delete all data from date and time where you are and set order open
if (isset($_POST['active'])){

    $date = $_POST['date'];
    $id = $_POST['id'];
    $timeset = $_POST['time'];
    $timelabel = $_POST['timelabel'];


    $query = "DELETE FROM information WHERE id = '$id'";

    mysqli_query($db, $query);

    $query = "UPDATE `times` SET `$timelabel` = '$timeset' WHERE date = '$date'";

    mysqli_query($db, $query);

    $error = "Deze tijd is nu vrij";

}

//set order closed
if (isset($_POST['delete'])){

    $date = $_POST['date'];
    $timelabel = $_POST['timelabel'];

    $query = "UPDATE `times` SET `$timelabel` = '$timeset is bezet' WHERE date = '$date'";

    mysqli_query($db, $query);

    $error = "Deze tijd is nu bezet";

}



$query = "SELECT * FROM  information WHERE date = '$date' and time = '$timeset'";
$result = mysqli_query($db, $query) or die ('Error: ' . $query);
$info = mysqli_fetch_assoc($result);

//make empty variables to avoid empty errors
$id = "";
$fname = "";
$lname = "";
$paymethod = "";
$phonenumber = "";
$email = "";
$comment = "";
$price = "";

// if mysqli_fetch_assoc is done, load the data from the database
if ($info){
    $id = htmlspecialchars($info['id']);
    $fname = htmlspecialchars($info['firstname']);
    $lname = htmlspecialchars($info['lastname']);
    $paymethod = htmlspecialchars($info['paymethod']);
    $phonenumber = htmlspecialchars($info['phonenumber']);
    $email =  htmlspecialchars($info['email']);
    $comment =  htmlspecialchars($info['opmerking']);
    $price = "€10,-";
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />

    <title>Always Fresh Schiedam</title>


</head>
<body>
<main>
    <div class="nav_div">
        <nav class="navbar navbar-expand-sm navbar-dark bg">

            <div class="login_logo">
                <a href="admin_time.php"><i class="far fa-arrow-alt-circle-left fa-3x"></i></a>
            </div>

            <img
                    class="logo"
                    src="Tools/AlwaysFreshLogo.jpg"
            />

            <div class="login_logo">
                <a href="logout.php"><i class="fas fa-sign-out-alt fa-3x"></i></a>
            </div>

        </nav>
    </div>

    <section>


        <h1>
            Afspraak Informatie
        </h1>
        <div class="main">

                    <div class="side_div">
                        <div class="conf_div">
                            <i class="far fa-calendar-alt fa-2x"></i>
                            <p class="conf_p"><?= $date ?> <?= $timeset ?></p>
                        </div>

                        <div class="conf_div">
                            <i class="fas fa-map-marker-alt fa-2x"></i>
                            <p class="conf_p">Swammerdamsingel 75B, 3112 RH Schiedam</p>
                        </div>

                        <div class="conf_div">
                            <i class="far fa-credit-card fa-2x"></i>
                            <p class="conf_label"><?= $paymethod ?></p>
                        </div>

                        <div class="conf_div">
                            <i class="far fa-money-bill-alt fa-2x"></i>
                            <p class="conf_label"><?= $price ?></p>
                        </div>
                    </div>

                    <div class="side_div">
                        <div class="conf_div">
                            <i class="fas fa-id-card fa-2x"></i>
                            <p class="conf_p"><?= $fname ?> <?= $lname ?></p>
                        </div>

                        <div class="conf_div">
                            <i class="fas fa-phone-alt fa-2x"></i>
                            <p class="conf_p"><?= $phonenumber ?></p>
                        </div>

                        <div class="conf_div">
                            <i class="far fa-envelope fa-2x"></i>
                            <p class="conf_p"><?= $email ?></p>
                        </div>

                        <div class="conf_div">
                            <i class="far fa-comment-dots fa-2x"></i>
                            <p class="conf_p"><?= $comment ?></p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="buttons">

                <form method="post" action="" class="back">
                    <input type="hidden" name="date" value="<?= $date ?>"/>
                    <input type="hidden" name="time" value="<?= $timeset ?>"/>
                    <input type="hidden" name="timelabel" value="<?= $timelabel ?>">
                    <button   class="back" name="delete" type="submit"><i class="fas fa-times fa-2x"></i></button>
                </form>

                <form class="continue " method="post" action="">
                    <input type="hidden" name="id" value="<?= $id ?>"/>
                    <input type="hidden" name="date" value="<?= $date ?>"/>
                    <input type="hidden" name="time" value="<?= $timeset ?>"/>
                    <input type="hidden" name="timelabel" value="<?= $timelabel ?>">
                    <input type="hidden" name="fname" value="<?= $fname ?>">
                    <input type="hidden" name="lname" value="<?= $lname ?>">
                    <input type="hidden" name="phonenumber" value="<?= $phonenumber ?>">
                    <input type="hidden" name="email" value="<?= $email ?>">
                    <input type="hidden" name="comment" value="<?= $comment ?>">
                    <button class="continue" name="active" type="submit"><i class="fas fa-check fa-2x"></i></button>
                </form>



            </div>

    </section>

    <div class="error_div"><h4 class="error"><?= $error ?></h4></div>
</main>

</body>
</html>