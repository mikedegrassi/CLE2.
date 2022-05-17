<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

if (isset($_SESSION['timefail'])) {
    $error = $_SESSION['timefail'];
    unset($_SESSION['timefail']);
} else {
    $error = "";
}

/** @var mysqli $db */

require_once "connect.php";


$date = "";

if (isset($_POST['submit'])) {

    $date = $_POST['date'];
    $_SESSION['date'] = $date;

}elseif(isset($_SESSION['date'])){
    $date = $_SESSION['date'];
}

if ($date == '') {

    $_SESSION['error'] = "Er moet een datum ingevuld worden";
    header('Location: admin_date.php');
    exit;

}



if ($date == '') {

    $error['time'] = "Er moet een tijd ingevuld worden ";
    header('Location: admin_date.php');
    exit;

}




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
                <a href="logout.php"><i class="fas fa-sign-out-alt fa-3x"></i></a>
            </div>

        </nav>
    </div>
    <section>

        <form class="" action="admin_info.php" method="post">
            <h1>
                Tijden van <?=  $date ?>
            </h1>
            <div class="main">
                <div class="scroll-bg">
                    <div class="scroll-div">
                        <div class="scroll-object">


                            <tbody>

                            <tr>

                                <input type="hidden" name="date" value="<?= $date ?>"/>



                                <div class="radio_div">
                                    <input type="radio" name="time" id="time" class="radio_input" value="12:00-12:30">
                                    <label for="time" class="radio_label"><?= $time['time'] ?></label>
                                </div>

                                <div class="radio_div">
                                    <input type="radio" name="time" id="time2" class="radio_input" value="12:30-13:00">
                                    <label for="time2" class="radio_label"><?= $time['time2'] ?></label>
                                </div>

                                <div class="radio_div">
                                    <input type="radio" name="time" id="time3" class="radio_input" value="13:00-13:30">
                                    <label for="time3" class="radio_label"><?= $time['time3'] ?></label>
                                </div>

                                <div class="radio_div">
                                    <input type="radio" name="time" id="time4" class="radio_input" value="13:30-14:00">
                                    <label for="time4" class="radio_label"><?= $time['time4'] ?></label>
                                </div>

                                <div class="radio_div">
                                    <input type="radio" name="time" id="time5" class="radio_input" value="14:00-14:30">
                                    <label for="time5" class="radio_label"><?= $time['time5'] ?></label>
                                </div>

                                <div class="radio_div">
                                    <input type="radio" name="time" id="time6" class="radio_input" value="14:30-15:00">
                                    <label for="time6" class="radio_label"><?= $time['time6'] ?></label>
                                </div>

                                <div class="radio_div">
                                    <input type="radio" name="time" id="time7" class="radio_input" value="15:00-15:30">
                                    <label for="time7" class="radio_label"><?= $time['time7'] ?></label>
                                </div>

                                <div class="radio_div">
                                    <input type="radio" name="time" id="time8" class="radio_input" value="15:30-16:00">
                                    <label for="time8" class="radio_label"><?= $time['time8'] ?></label>
                                </div>

                                <div class="radio_div">
                                    <input type="radio" name="time" id="time9" class="radio_input" value="16:00-16:30">
                                    <label for="time9" class="radio_label"><?= $time['time9'] ?></label>
                                </div>

                                <div class="radio_div">
                                    <input type="radio" name="time" id="time10" class="radio_input" value="16:30-17:00">
                                    <label for="time10" class="radio_label"><?= $time['time10'] ?></label>
                                </div>

                                <div class="radio_div">
                                    <input type="radio" name="time" id="time11" class="radio_input" value="17:00-17:30">
                                    <label for="time11" class="radio_label"><?= $time['time11'] ?></label>
                                </div>

                                <div class="radio_div">
                                    <input type="radio" name="time" id="time12" class="radio_input" value="17:30-18:00">
                                    <label for="time12" class="radio_label"><?= $time['time12'] ?></label>
                                </div>

                                <div class="radio_div">
                                    <input type="radio" name="time" id="time13" class="radio_input" value="18:00-18:30">
                                    <label for="time13" class="radio_label"><?= $time['time13'] ?></label>
                                </div>

                                <div class="radio_div">
                                    <input type="radio" name="time" id="time14" class="radio_input" value="18:30-19:00">
                                    <label for="time14" class="radio_label"><?= $time['time14'] ?></label>
                                </div>

                                <div class="radio_div">
                                    <input type="radio" name="time" id="time15" class="radio_input" value="19:00-19:30">
                                    <label for="time15" class="radio_label"><?= $time['time15'] ?></label>
                                </div>

                                <div class="radio_div">
                                    <input type="radio" name="time" id="time16" class="radio_input" value="19:30-20:00">
                                    <label for="time16" class="radio_label"><?= $time['time16'] ?></label>
                                </div>

                                <div class="radio_div">
                                    <input type="radio" name="time" id="time17" class="radio_input" value="20:00-20:30">
                                    <label for="time17" class="radio_label"><?= $time['time17'] ?></label>
                                </div>

                                <div class="radio_div">
                                    <input type="radio" name="time" id="time18" class="radio_input" value="20:30-21:00">
                                    <label for="time18" class="radio_label"><?= $time['time18'] ?></label>
                                </div>

                                <div class="radio_div">
                                    <input type="radio" name="time" id="time19" class="radio_input" value="21:00-21:30">
                                    <label for="time19" class="radio_label"><?= $time['time19'] ?></label>
                                </div>

                                <div class="radio_div">
                                    <input type="radio" name="time" id="time20" class="radio_input" value="21:30-22:00">
                                    <label for="time20" class="radio_label"><?= $time['time20'] ?></label>
                                </div>

                                <div class="radio_div">
                                    <input type="radio" name="time" id="time21" class="radio_input" value="22:00-22:30">
                                    <label for="time21" class="radio_label"><?= $time['time21'] ?></label>
                                </div>

                                <div class="radio_div">
                                    <input type="radio" name="time" id="time22" class="radio_input" value="22:30-23:00">
                                    <label for="time22" class="radio_label"><?= $time['time22'] ?></label>
                                </div>

                                <div class="radio_div">
                                    <input type="radio" name="time" id="time23" class="radio_input" value="23:00-23:30">
                                    <label for="time23" class="radio_label"><?= $time['time23'] ?></label>
                                </div>

                                <div class="radio_div">
                                    <input type="radio" name="time" id="time24" class="radio_input" value="23:30-00:00">
                                    <label for="time24" class="radio_label"><?= $time['time24'] ?></label>
                                </div>

                            </tr>

                            </tbody>



                        </div>
                    </div>
                </div>

            </div>

            <div class="buttons">

                <a href="admin_date.php">
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



<!--INSERT INTO `times`(`id`, `date`, `time`, `time2`, `time3`, `time4`, `time5`, `time6`, `time7`, `time8`, `time9`, `time10`, `time11`, `time12`, `time13`, `time14`, `time15`, `time16`, `time17`, `time18`, `time19`, `time20`, `time21`, `time22`, `time23`, `time24`)
VALUES ('','2022-01-17','12:00-12:30','12:30-13:00','13:00-13:30','13:30-14:00','14:00-14:30','14:30-15:00','15:00-15:30','15:30-16:00','16:00-16:30','16:30-17:00','17:00-17:30','17:30-18:00','18:00-18:30','18:30-19:00','19:00-19:30','19:30-20:00','20:00-20:30','20:30-21:00','21:00-21:30','21:30-22:00','22:00-22:30','22:30-23:00','23:00-23:30','23:30-00:00')-->