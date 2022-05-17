<?php
session_start();

if (isset($_POST['submit'])){
    session_destroy();
    header("Location: login.php");
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

<div class="container">
    <div class="d-flex justify-content-center">
        <div class="card">
            <div class="card-header">
                <h3>Klik de onderstaande knop om uit te loggen</h3>

            </div>
            <div class="card-body">
                <form method="post">


                    <div class="form-group"  style="text-align: center">
                        <input type="submit" name="submit" value="Uitloggen" class="btn login_btn">
                    </div>
                </form>



</body>
</html>



