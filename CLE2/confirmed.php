<?php
session_start();

//Require DB settings with connection variable
/** @var mysqli $db */
require_once "connect.php";

$timeset = "";

// get values from form off info.php
if (isset($_POST['submit'])) {

    $date = mysqli_escape_string($db, $_POST['date']);
    $timeset = mysqli_escape_string($db,$_POST['time']);
    $fname =  mysqli_escape_string($db, $_POST['fname']);
    $lname =  mysqli_escape_string($db, $_POST['lname']);
    $phonenumber =  mysqli_escape_string($db, $_POST['phonenumber']);
    $email =  mysqli_escape_string($db, $_POST['email']);
    $payment =  mysqli_escape_string($db, $_POST['payment']);
    $comment =  mysqli_escape_string($db, $_POST['comment']);
    $timelabel =  mysqli_escape_string($db, $_POST['timelabel']);

    // give sessions so people can go back to previous page
    $_SESSION['date'] = $date;
    $_SESSION['time'] = $timeset;
    $_SESSION['fname'] = $fname;
    $_SESSION['lname'] = $lname;
    $_SESSION['phonenumber'] = $phonenumber;
    $_SESSION['email'] = $email;
    $_SESSION['payment'] = $payment;
    $_SESSION['comment'] = $comment;
    $_SESSION['timelabel'] = $timelabel;
}
//if firstname, lastname, phonenumber, email or paymethod is empty an SESSION will start with an error in it
if ($fname == '' || $lname == '' || $phonenumber == '' || $email == '' || $payment == '' ) {

    $_SESSION['incomplete'] = "Niet alle verplichte velden zijn ingevuld";
    header("Location: info.php");
}

if (isset($_POST['submit'])) {

    $query = "INSERT INTO `information` (`id`, `firstname`, `lastname`, `date`, `time`, `phonenumber`, `email`, `paymethod`, `opmerking`)
    VALUES ('','$fname','$lname','$date','$timeset','$phonenumber','$email', '$payment', '$comment')";

    mysqli_query($db, $query);

    $query = "UPDATE `times` SET `$timelabel` ='$timeset is bezet' WHERE date = '$date'";

    mysqli_query($db, $query);


}


?>
<!DOCTYPE html>
<html lang="nl">
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
            <img
                    class="logo"
                    src="Tools/AlwaysFreshLogo.jpg"
            />

            <div class="login_logo">
                <a href="login.php"><i class="fas fa-id-badge fa-3x"></i></a>
            </div>

        </nav>
    </div>

    <section>

        <form class="info" action="confirmed.php" method="post">
            <h1>
                Uw Afspraak Is Bevestigd
            </h1>
            <div class="main">

                <div class="check"><i class="far fa-check-circle fa-10x"></i></div>


                <div class="">
                    <div class="">

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
                                <p class="conf_label"><?= htmlspecialchars($payment) ?></p>
                            </div>

                            <div class="conf_div">
                                <i class="far fa-money-bill-alt fa-2x"></i>
                                <p class="conf_label">€10,-</p>
                            </div>
                        </div>

                        <div class="side_div">
                            <div class="conf_div">
                                <i class="fas fa-id-card fa-2x"></i>
                                <p class="conf_p"><?= htmlspecialchars($fname) ?> <?= htmlspecialchars($lname) ?></p>
                            </div>


                            <div class="conf_div">
                                <i class="fas fa-phone-alt fa-2x"></i>
                                <p class="conf_p"><?= htmlspecialchars($phonenumber) ?></p>
                            </div>

                            <div class="conf_div">
                                <i class="far fa-envelope fa-2x"></i>
                                <p class="conf_p"><?= htmlspecialchars($email) ?></p>
                            </div>


                            <div class="conf_div">
                                <i class="far fa-comment-dots fa-2x"></i>
                                <p class="conf_p"><?= htmlspecialchars($comment) ?></p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>


        </form>

        <div class="form-group" style="text-align: center">
            <a href="date.php"><button  type="submit" name="submit" class="btn btn-outline-warning">Nog een afspraak maken</button></a>
        </div>

    </section>
</main>

</body>

<script
    src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"
></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"
></script>
<script
    src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"
></script>

</body>
</html>

