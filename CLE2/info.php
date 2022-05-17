<?php
session_start();

// gives error if data is incomplete
if (isset($_SESSION['incomplete'])) {
    $error = $_SESSION['incomplete'];
    $mark = "* Dit veld is verplicht";
    unset($_SESSION['incomplete']);
} else {
    $mark = "";
    $error = "";
}

//Require DB settings with connection variable
/** @var mysqli $db */
require_once "connect.php";

$timeset = "";

// get values from form off time.php
if (isset($_POST['submit'])) {

    $date = mysqli_escape_string($db, $_POST['date']);
    $timeset = mysqli_escape_string($db, $_POST['time']);

    // give sessions so people can go back to previous page
    $_SESSION['date'] = $date;
    $_SESSION['time'] = $timeset;

}elseif ($_SESSION['time']){
    $timeset = $_SESSION['time'];
    $date = $_SESSION['date'];
}

//give error if no time is send with the post
if ($timeset == '') {

    $_SESSION['timefail'] = "Er moet een tijd ingevuld worden";
    header("Location: time.php");
}


if (isset($_POST['submit'])) {

    $timelabel = "";


//Get the record from the database result
    $query = "SELECT * FROM  times WHERE date = '$date'";
    $result = mysqli_query($db, $query) or die ('Error: ' . $query);
    $time = mysqli_fetch_assoc($result);

//give timelabel correct value depending on what time is send
        if ($timeset === $time['time']) {
            $timelabel = "time";
        }

        if ($timeset === $time['time2']) {
            $timelabel = "time2";
        }

        if ($timeset === $time['time3']) {
            $timelabel = "time3";
        }

        if ($timeset === $time['time4']) {
            $timelabel = "time4";
        }

        if ($timeset === $time['time5']) {
            $timelabel = "time5";
        }

        if ($timeset === $time['time6']) {
            $timelabel = "time6";
        }

        if ($timeset === $time['time7']) {
            $timelabel = "time7";
        }

        if ($timeset === $time['time8']) {
            $timelabel = "time8";
        }

        if ($timeset === $time['time9']) {
            $timelabel = "time9";
        }

        if ($timeset === $time['time10']) {
            $timelabel = "time10";
        }

        if ($timeset === $time['time11']) {
            $timelabel = "time11";
        }

        if ($timeset === $time['time12']) {
            $timelabel = "time12";
        }

        if ($timeset === $time['time13']) {
            $timelabel = "time13";
        }

        if ($timeset === $time['time14']) {
            $timelabel = "time14";
        }

        if ($timeset === $time['time15']) {
            $timelabel = "time15";
        }

        if ($timeset === $time['time16']) {
            $timelabel = "time16";
        }

        if ($timeset === $time['time17']) {
            $timelabel = "time17";
        }
        if ($timeset === $time['time18']) {
            $timelabel = "time18";
        }

        if ($timeset === $time['time19']) {
            $timelabel = "time19";
        }

        if ($timeset === $time['time20']) {
            $timelabel = "time20";
        }

        if ($timeset === $time['time21']) {
            $timelabel = "time21";
        }

        if ($timeset === $time['time22']) {
            $timelabel = "time22";
        }

        if ($timeset === $time['time23']) {
            $timelabel = "time23";
        }

        if ($timeset === $time['time24']) {
            $timelabel = "time24";
        }



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
                Maak Jou Afspraak
            </h1>
            <div class="main">
                <p class="ask">Vul uw gegevens in:</p>
                <div class="scroll-bg">
                    <div class="scroll-div">
                        <div class="scroll-object">


                            <div class="info_div">
                                <label for="fname" class="info_label">Voornaam:</label>
                                <input placeholder="<?= htmlspecialchars($mark)?>" type="text" name="fname" id="fname" class="text_input">
                            </div>

                            <div class="info_div">
                                <label for="lname" class="info_label">Achternaam:</label>
                                <input placeholder="<?= htmlspecialchars($mark) ?>" type="text" name="lname" id="lname" class="text_input">
                            </div>

                            <div class="info_div">
                                <label for="phonenumber" class="info_label">Telefoonnummer:</label>
                                <input placeholder="<?= htmlspecialchars($mark) ?>" type="text" name="phonenumber" id="phonenumber" class="text_input">
                            </div>

                            <div class="info_div">
                                <label for="email" class="info_label">E-mailadres:</label>
                                <input placeholder="<?= htmlspecialchars($mark) ?>" type="email" name="email" id="email" class="text_input">
                            </div>

                            <div class="info_div">
                                <label for="payment" class="info_label">Betaalmethode:</label>
                            </div>

                            <div class="info_div">

                                <label for="payment1" class="pay_label">
                                <input placeholder="<?= htmlspecialchars($mark) ?>" type="radio" name="payment" id="payment1" class="pay_input" value="Tikkie">

                                    <div class="pay_div"></div>

                                    Tikkie
                                </label>

                                <label for="payment2" class="pay_label">
                                <input type="radio" name="payment" id="payment2" class="pay_input" value="Tikkie">

                                    <div class="pay_div"></div>

                                    Contant
                                </label>

                            </div>

                            <div class="info_div">
                                <label for="comment">Opmerking:</label>
                                <input type="text" name="comment" id="comment" class="text_input">
                            </div>


                            <input type="hidden" name="date" value="<?= $date ?>">
                            <input type="hidden" name="time" value="<?= $timeset ?>"/>
                            <input type="hidden" name="timelabel" value="<?= $timelabel ?>">


                        </div>
                    </div>
                </div>


            </div>

            <div class="buttons">

                <a href="time.php">
                    <button class="back" type="button" name="submit"><i class="fas fa-arrow-circle-left fa-2x"></i>
                    </button>
                </a>

                <button class="continue" type="submit" name="submit"><i class="fas fa-arrow-circle-right fa-2x"></i>
                </button>


            </div>

        </form>



    </section>

    <div class="error_div"><h4 class="error"><?= $error ?></h4></div>
</main>
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

