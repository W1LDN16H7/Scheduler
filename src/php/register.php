<?php

require("mainlib.php");
/**
 * Register the user 
 * 
 */

if(!isset($_POST['user'])){
    $unfilled = true;
}
if(isset($_POST['email'])){
    $email = $_POST['email'];
    $username = $_POST['user'];
    $pass = $_POST['pass'];
    $confirm = $_POST['confpass'];
    
}
$v = new Validate();
// validate the user's credentials
if($v->validate_email($email) && $v->validate_pass($pass)){
    if($v->confirm_pass($pass,$confirm)){
        // do things if the credentials are valid
        $message = "Success! Welcome $username";
        echo "<script type='text/javascript'>alert('$message');</script>";

        if(insertDB($username,$pass,$email)){
            // open index.php
            header("Location: index.php");

        }


    }
    
}else{
    // do things if the credentials are invalid
    $message = "Invalid credentials";
    $unfilled = true;
    echo "<script type='text/javascript'>alert('$message');</script>";
}


function insertDB($username,$pass,$email){
    $server = "localhost";
    $user = "root";
    $password = "";
    $dbname = "users";
    $con = mysqli_connect($server, $user, $password,$dbname);
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }else{
        // echo "Connected successfully";
    }
    $sql = "INSERT INTO `user` (`username`, `password`, `email`,`date`) VALUES ('$username', '$pass', '$email',current_timestamp());";
    if($con->query($sql) == true){
        // echo "Successfully Inserted";
        echo "<script type='text/javascript'>alert('Registration Success');</script>";

    }
    
    else{
        // alert
        echo "<script type='text/javascript'>alert('ERROR :$sql <br> $con->error');</script>";

    }
   
    $con->close();
}






    
    
    
    
    
// }
