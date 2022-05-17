<?php
session_start();

// gives error if time is not posted
if (isset($_SESSION['timefail'])) {
    $error = $_SESSION['timefail'];
    unset($_SESSION['timefail']);
} else {
    $error = "";
}

//Require DB settings with connection variable
/** @var mysqli $db */
require_once "connect.php";

// get value from form off date.php
if (isset($_POST['submit'])) {

    $date = mysqli_escape_string($db, $_POST['date']);

    // give session so people can go back to previous page
    $_SESSION['date'] = $date;

}elseif(isset($_SESSION['date'])){
    $date = $_SESSION['date'];
}
    //if date is empty an SESSION will start with an session error in it
    if ($date == '') {

        $_SESSION['error'] = "Er moet een datum ingevuld worden";
        //after the SESSION started the user will go back to date.php
        header('Location: date.php');
        exit;
    }




//Get the record from the database result
$query = "SELECT * FROM  times WHERE date = '$date'";
$result = mysqli_query($db, $query) or die ('Error: ' . $query);
$time = mysqli_fetch_assoc($result);

mysqli_close($db);
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

        <form class="" action="info.php" method="post">
            <h1>
                Maak Jou Afspraak
            </h1>
            <div class="main">
                <p class="ask">Vul uw gegevens in:</p>
                <div class="scroll-bg">
                    <div class="scroll-div">
                        <div class="scroll-object">


                                <tbody>

                                <tr>

                                    <input type="hidden" name="date" value="<?= $date ?>"/>



                                    <div class="radio_div">
                                        <input type="radio" name="time" id="time" class="radio_input"
                                               value="<?= $time['time'] ?>" <?= $time['time'] == '12:00-12:30 is bezet' ? 'disabled' : '' ?>>
                                        <label for="time" class="radio_label"><?= $time['time'] ?></label>
                                    </div>

                                    <div class="radio_div">
                                        <input type="radio" name="time" id="time2" class="radio_input"
                                               value="<?= $time['time2'] ?>" <?= $time['time2'] == '12:30-13:00 is bezet' ? 'disabled' : '' ?>>
                                        <label for="time2" class="radio_label"><?= $time['time2'] ?></label>
                                    </div>

                                    <div class="radio_div">
                                        <input type="radio" name="time" id="time3" class="radio_input"
                                               value="<?= $time['time3'] ?>" <?= $time['time3'] == '13:00-13:30 is bezet' ? 'disabled' : '' ?>>
                                        <label for="time3" class="radio_label"><?= $time['time3'] ?></label>
                                    </div>

                                    <div class="radio_div">
                                        <input type="radio" name="time" id="time4" class="radio_input"
                                               value="<?= $time['time4'] ?>" <?= $time['time4'] == '13:30-14:00 is bezet' ? 'disabled' : '' ?>>
                                        <label for="time4" class="radio_label"><?= $time['time4'] ?></label>
                                    </div>

                                    <div class="radio_div">
                                        <input type="radio" name="time" id="time5" class="radio_input"
                                               value="<?= $time['time5'] ?>" <?= $time['time5'] == '14:00-14:30 is bezet' ? 'disabled' : '' ?>>
                                        <label for="time5" class="radio_label"><?= $time['time5'] ?></label>
                                    </div>

                                    <div class="radio_div">
                                        <input type="radio" name="time" id="time6" class="radio_input"
                                               value="<?= $time['time6'] ?>" <?= $time['time6'] == '14:30-15:00 is bezet' ? 'disabled' : '' ?>>
                                        <label for="time6" class="radio_label"><?= $time['time6'] ?></label>
                                    </div>

                                    <div class="radio_div">
                                        <input type="radio" name="time" id="time7" class="radio_input"
                                               value="<?= $time['time7'] ?>" <?= $time['time7'] == '15:00-15:30 is bezet' ? 'disabled' : '' ?>>
                                        <label for="time7" class="radio_label"><?= $time['time7'] ?></label>
                                    </div>

                                    <div class="radio_div">
                                        <input type="radio" name="time" id="time8" class="radio_input"
                                               value="<?= $time['time8'] ?>" <?= $time['time8'] == '15:30-16:00 is bezet' ? 'disabled' : '' ?>>
                                        <label for="time8" class="radio_label"><?= $time['time8'] ?></label>
                                    </div>

                                    <div class="radio_div">
                                        <input type="radio" name="time" id="time9" class="radio_input"
                                               value="<?= $time['time9'] ?>" <?= $time['time9'] == '16:00-16:30 is bezet' ? 'disabled' : '' ?>>
                                        <label for="time9" class="radio_label"><?= $time['time9'] ?></label>
                                    </div>

                                    <div class="radio_div">
                                        <input type="radio" name="time" id="time10" class="radio_input"
                                               value="<?= $time['time10'] ?>" <?= $time['time10'] == '16:30-17:00 is bezet' ? 'disabled' : '' ?>>
                                        <label for="time10" class="radio_label"><?= $time['time10'] ?></label>
                                    </div>

                                    <div class="radio_div">
                                        <input type="radio" name="time" id="time11" class="radio_input"
                                               value="<?= $time['time11'] ?>" <?= $time['time11'] == '17:00-17:30 is bezet' ? 'disabled' : '' ?>>
                                        <label for="time11" class="radio_label"><?= $time['time11'] ?></label>
                                    </div>

                                    <div class="radio_div">
                                        <input type="radio" name="time" id="time12" class="radio_input"
                                               value="<?= $time['time12'] ?>" <?= $time['time12'] == '17:30-18:00 is bezet' ? 'disabled' : '' ?>>
                                        <label for="time12" class="radio_label"><?= $time['time12'] ?></label>
                                    </div>

                                    <div class="radio_div">
                                        <input type="radio" name="time" id="time13" class="radio_input"
                                               value="<?= $time['time13'] ?>" <?= $time['time13'] == '18:00-18:30 is bezet' ? 'disabled' : '' ?>>
                                        <label for="time13" class="radio_label"><?= $time['time13'] ?></label>
                                    </div>

                                    <div class="radio_div">
                                        <input type="radio" name="time" id="time14" class="radio_input"
                                               value="<?= $time['time14'] ?>" <?= $time['time14'] == '18:30-19:00 is bezet' ? 'disabled' : '' ?>>
                                        <label for="time14" class="radio_label"><?= $time['time14'] ?></label>
                                    </div>

                                    <div class="radio_div">
                                        <input type="radio" name="time" id="time15" class="radio_input"
                                               value="<?= $time['time15'] ?>" <?= $time['time15'] == '19:00-19:30 is bezet' ? 'disabled' : '' ?>>
                                        <label for="time15" class="radio_label"><?= $time['time15'] ?></label>
                                    </div>

                                    <div class="radio_div">
                                        <input type="radio" name="time" id="time16" class="radio_input"
                                               value="<?= $time['time16'] ?>" <?= $time['time16'] == '19:30-20:00 is bezet' ? 'disabled' : '' ?>>
                                        <label for="time16" class="radio_label"><?= $time['time16'] ?></label>
                                    </div>

                                    <div class="radio_div">
                                        <input type="radio" name="time" id="time17" class="radio_input"
                                               value="<?= $time['time17'] ?>" <?= $time['time17'] == '20:00-20:30 is bezet' ? 'disabled' : '' ?>>
                                        <label for="time17" class="radio_label"><?= $time['time17'] ?></label>
                                    </div>

                                    <div class="radio_div">
                                        <input type="radio" name="time" id="time18" class="radio_input"
                                               value="<?= $time['time18'] ?>" <?= $time['time18'] == '20:30-21:00 is bezet' ? 'disabled' : '' ?>>
                                        <label for="time18" class="radio_label"><?= $time['time18'] ?></label>
                                    </div>

                                    <div class="radio_div">
                                        <input type="radio" name="time" id="time19" class="radio_input"
                                               value="<?= $time['time19'] ?>" <?= $time['time19'] == '21:00-21:30 is bezet' ? 'disabled' : '' ?>>
                                        <label for="time19" class="radio_label"><?= $time['time19'] ?></label>
                                    </div>

                                    <div class="radio_div">
                                        <input type="radio" name="time" id="time20" class="radio_input"
                                               value="<?= $time['time20'] ?>" <?= $time['time20'] == '21:30-22:00 is bezet' ? 'disabled' : '' ?>>
                                        <label for="time20" class="radio_label"><?= $time['time20'] ?></label>
                                    </div>

                                    <div class="radio_div">
                                        <input type="radio" name="time" id="time21" class="radio_input"
                                               value="<?= $time['time21'] ?>" <?= $time['time21'] == '22:00-22:30 is bezet' ? 'disabled' : '' ?>>
                                        <label for="time21" class="radio_label"><?= $time['time21'] ?></label>
                                    </div>

                                    <div class="radio_div">
                                        <input type="radio" name="time" id="time22" class="radio_input"
                                               value="<?= $time['time22'] ?>" <?= $time['time22'] == '22:30-23:00 is bezet' ? 'disabled' : '' ?>>
                                        <label for="time22" class="radio_label"><?= $time['time22'] ?></label>
                                    </div>

                                    <div class="radio_div">
                                        <input type="radio" name="time" id="time23" class="radio_input"
                                               value="<?= $time['time23'] ?>" <?= $time['time23'] == '23:00-23:30 is bezet' ? 'disabled' : '' ?>>
                                        <label for="time23" class="radio_label"><?= $time['time23'] ?></label>
                                    </div>

                                    <div class="radio_div">
                                        <input type="radio" name="time" id="time24" class="radio_input"
                                               value="<?= $time['time24'] ?>" <?= $time['time24'] == '23:30-00:00 is bezet' ? 'disabled' : '' ?>>
                                        <label for="time24" class="radio_label"><?= $time['time24'] ?></label>
                                    </div>

                                </tr>

                                </tbody>



                        </div>
                    </div>
                </div>

            </div>

            <div class="buttons">

                <a href="date.php">
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

</form>
</table>
</body>
</html>
