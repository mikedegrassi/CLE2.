<?php
session_start();

//if user is not logged in the user will be redirected login.php
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
} else {
    $error = "";
}

//Require DB settings with connection variable
/** @var mysqli $db */
require_once "connect.php";

//Get the result set from the database with a SQL query
$query = "SELECT * FROM  times";
$result = mysqli_query($db, $query) or die ('Error: ' . $query);

//Loop through the result to create a custom array
$dates = [];
while ($row = mysqli_fetch_assoc($result)) {
    $dates[] = $row;
}

//Close connection
mysqli_close($db);
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

    <title>Yaya's barb</title>
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

    </div>
    <section>
        <form class="" action="admin_time.php" method="post">
            <h1>
                Dagen
            </h1>
            <div class="main">
                <div class="scroll-bg">
                    <div class="scroll-div">
                        <div class="scroll-object">

                            <form action="admin_time.php" method="post">

                                <tbody>
                                <?php foreach ($dates as $date) { ?>
                                    <tr>


                                        <div class="radio_div">
                                            <input type="radio" name="date" id="date-<?= $date['id'] ?>"
                                                   class="radio_input" value="<?= $date['date'] ?>">
                                            <label class="radio_label"
                                                   for="date-<?= $date['id'] ?>"><?= $date['date'] ?></label>
                                        </div>

                                    </tr>
                                <?php } ?>
                                </tbody>


                        </div>
                    </div>
                </div>


            </div>

            <div class="buttons">
                <button class="continue" type="submit" name="submit"><i class="fas fa-arrow-circle-right fa-2x"></i>
                </button>

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