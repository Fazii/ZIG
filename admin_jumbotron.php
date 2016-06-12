<?php
    session_start();

    if(!isset($_SESSION['logged'])){ //NEED TO BE FIXED
        header('Location: http://localhost/admin_log.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="PL-pl">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Panel Administracyjny</title>

    <link rel="stylesheet" href="css/style.css"/>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <h4>Panel Administracyjny</h4>
            </li>
            <li>
                <a href="admin_cennik.php">Modyfikuj usługi</a>
            </li>
            <li>
                <a href="admin_terminy.php">Podgląd i edycja terminarza</a>
            </li>
            <li>
                <a class="active" href="admin_jumbotron.php">Zmień jumbotron</a>
            </li>
            <li>
                <hr>
            </li>
            <li>
                <a href="php/logout.php">Wyloguj</a>
            </li>

        </ul>
    </div>
    <!-- /#sidebar-wrapper -->
    <button href="#menu-toggle" class="btn btn-default" id="menu-toggle"><span
            class="glyphicon glyphicon-menu-hamburger"></span></button>
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="lib/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

</script>

</body>

</html>
