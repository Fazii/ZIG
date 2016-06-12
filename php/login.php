<?php

    session_start();

    if((!isset($_POST['form-username'])) || (!isset($_POST['form-password']))){
        header('Location: http://localhost/admin_log.php');
        exit;
    }

        $username = $_POST['form-username'];
        $password = $_POST['form-password']; 
        
        $username = htmlentities($username, ENT_QUOTES, "UTF-8");
        $password = htmlentities($password, ENT_QUOTES, "UTF-8");
        
        
       if(($username=='Admin') && ($password=='admin1')){

              
                    unset($_SESSION['error']);
                
                
                header('Location: http://localhost/admin_cennik.html');
                
        } else {
                $_SESSION['error'] ='<div class="alert alert-warning">
  <strong>Uwaga!</strong> Podano błędne dane logowania.
</div>';
                header('Location: http://localhost/admin_log.php');
            }
        
?>