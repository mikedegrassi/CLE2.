<?php
session_start();

//send the user to the next page if the login details are correct
if (isset($_SESSION['admin'])) {
    header("Location: admin_date.php");
    exit;
}

$error = "";

//Require DB settings with connection variable
/** @var mysqli $db */
require_once "connect.php";

if (isset($_POST['submit'])) {
    $username = mysqli_escape_string($db, $_POST['username']);
    $password = $_POST['password'];
    //Retrieve data from the database with the correct username
    $query = "SELECT * FROM login WHERE username='$username'";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) == 1) {

        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            $_SESSION['admin'] = true;
            header("Location: admin_date.php ");
            exit;
        } else {
            $error = "Onjuiste inloggegevens";
        }
    } else {
        $error = "Onjuiste inloggegevens";
    }
}

?>


<!DOCTYPE html>
<html>
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
                <a href="date.php"><i class="far fa-calendar-alt fa-3x"></i></a>
            </div>

        </nav>
    </div>

    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="card">
                <div class="card-header">
                    <h3>Login</h3>

                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="username" class="form-control" placeholder="username">

                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control" placeholder="password">
                        </div>

                        <div class="form-group" style="text-align: center">
                            <input type="submit" name="submit" value="Login" class="btn login_btn">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="error_div"><h4 class="error"><?= $error ?></h4></div>
</main>
</body>
</html>