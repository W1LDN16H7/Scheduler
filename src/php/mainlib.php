<?php

class Validate{
    /**
     * Validate the user's credentials 
     * 
     * 
     * @param $email
     * @return bool
     * @throws Exception
     * 
     * 
     */
    public $email;
    public $pass;

    function validate_email($email){
        /**
         * Validate the email 
         * 
         */
        $this->email = $email;
        if(filter_var($this->email, FILTER_VALIDATE_EMAIL)){

            return true;
        }else{
            $message = "Invalid Email";
            echo "<script type='text/javascript'>alert('$message');</script>";
            return false;
        }
            
        
    }
    function validate_pass($pass){
        /**
         * Validate the password
         */
        $this->pass = $pass;
        if(strlen($this->pass)>=8 && strlen($this->pass)<=16 && preg_match('/[A-Z]/',$this->pass) && preg_match('/[a-z]/',$this->pass) && preg_match('/[0-9]/',$this->pass)){
            return true;
        }else{
            // show alert message in browser
            $message = "Password must be 8-16 characters long and must contain at least one uppercase letter, one lowercase letter and one digit.";
            echo "<script type='text/javascript'>alert('$message');</script>";
            return false;
        }
    }
    function confirm_pass($pass,$confirm){
        /**
         * Confirm the password
         */
        
        if($pass == $confirm){
            return true;
        }else{
            $message = "Passwords do not match";
            echo "<script type='text/javascript'>alert('$message');</script>";
            return false;
        }
    }

    
    

}
 

?>