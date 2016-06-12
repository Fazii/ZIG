<?php

    session_start();

    if((!isset($_POST['form-username'])) || (!isset($_POST['form-password']))){
        header('Location: http://localhost/admin_log.php');
        exit;
    }

    require_once "db.php";

    $connect = @new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME_LOGINY);

    if($connect->connect_errno!=0){
       echo "ERROR:".$connect->connect_errno;
    }
    else{
        $username = $_POST['form-username'];
        $password = $_POST['form-password']; 
        
        $username = htmlentities($username, ENT_QUOTES, "UTF-8");
        $password = htmlentities($password, ENT_QUOTES, "UTF-8");
        
        
        if($result = @$connect->query(sprintf("SELECT * FROM uzytkownicy WHERE user='%s' AND pass='%s'",
            mysqli_real_escape_string($connect,$username),
            mysqli_real_escape_string($connect,$password)))){
            $number_of_users = $result->num_rows;
            if($number_of_users>0){
                $_SESSION['logged'] = true;
                
                $row = $result->fetch_assoc();
                $_SESSION = $row['user'];
                
                if(isset($_SESSION['error'])){
                    unset($_SESSION['error']);
                }
                
                
                $result->free_result();
                header('Location: http://localhost/admin_cennik.html');
                
               } else {
                $_SESSION['error'] ='<div class="alert alert-warning">
  <strong>Uwaga!</strong> Podano błędne dane logowania.
</div>';
                header('Location: http://localhost/admin_log.php');
            }
        }
        
       
        
        $connect->close();
    }


?>