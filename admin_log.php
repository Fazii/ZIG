<?php
    session_start();
   if ((isset($_SESSION['logged'])) && ($_SESSION['logged']==true)){
        header('Location: http://localhost/admin_terminy.php');
        exit();
    }
?>

<!DOCTYPE html>
<HTML>

<HEAD>
    <META charset="UTF8">
    <META http-equiv="Content-type" content="text/html; charset=iso-8859-2">
    <META http-equiv="Content-Language" content="pl">
    <title>Logowanie do panelu administracyjnego</title>
    <script src='lib/jquery.min.js'></script>
    <script src="js/jquery.backstretch.min.js"></script>
    <script src="js/scripts.js"></script>

    <link rel="stylesheet" href="css/admin_log.css"/>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
<!--
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"
          integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
-->

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
            integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
            crossorigin="anonymous"></script>

    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

    <link href='https://fonts.googleapis.com/css?family=Oswald:700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</HEAD>

<BODY>
 <div class="top-content">

        <div class="inner-bg">
            <div class="container">
                <div class="row">
                </div>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 form-box">
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Logowanie do panelu administracyjnego</h3>
                                <p>Podaj login i hasło:</p>
                            </div>
                            <div class="form-top-right">
                                <i class="fa fa-key"></i>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <form role="form" action="php/login.php" method="post" class="login-form">
                                <div class="form-group">
                                    <label class="sr-only" for="form-username">Login</label>
                                    <input type="text" name="form-username" placeholder="Login..." class="form-username form-control" id="form-username" required>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-password">Hasło</label>
                                    <input type="password" name="form-password" placeholder="Hasło..." class="form-password form-control" id="form-password" required>
                                </div>
                                <button type="submit" class="btn">Zaloguj</button>
                            </form>
                            <?php
                                if(isset($_SESSION['error'])){
                                echo '<br />';
                                echo $_SESSION['error'];
                                }
                            ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</BODY>

</HTML>