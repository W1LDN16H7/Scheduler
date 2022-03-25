<?php


require("mainlib.php");

session_start();



$submit = false;
$unfilled = false;
if (!isset($_POST['user'])) {
    $unfilled = true;
}

if (isset($_POST['user'])) {













    $email = $_POST['user'];
    $pass = $_POST['pass'];
    if (!$checked) {
        $checked = "off";
        # code...
    }
    $v = new Validate();
    // validate the user's credentials
    if ($v->validate_pass($_POST['pass'])) {
        // do things if the credentials are valid
        $message = "Success!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        try {
            login($email, $pass);
            // echo "<script type='text/javascript'>alert('$message');</script>";
            





            //code...
        } catch (\Throwable $th) {
            //throw $th;
            $message = "Invalid credentials";
            echo "<script type='text/javascript'>alert('$message');</script>";
            echo $th->getMessage();
        }
    }
}


function login($email, $pass)
{
    // login to the database
    $server = "localhost";
    $user = "root";
    $password = "";
    $dbname = "users";
    $con = mysqli_connect($server, $user, $password, $dbname);
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        // echo "Connected successfully";
    }

    $sql = "SELECT * FROM `user` WHERE `username` = '$email' AND `password` = '$pass'";

    if ($con->query($sql) == true) {
        // echo "Successfully Inserted";
        
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
        

    $con->close();
}

?>

