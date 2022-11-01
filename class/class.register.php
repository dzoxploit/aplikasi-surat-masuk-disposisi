<?php  
require_once '../connection/dbconfig.php';  
session_start();  
    class login {  
            
        function __construct($DB_con) {  
              
            // connecting to database  
            $db = $DB_con;
               
        }  
        // destructor  
        function __destruct() {  
              
        }  
        public function UserRegister($username, $emailid, $password){  
                $password = md5($password);  
                $qr = mysql_query("INSERT INTO users(username, emailid, password) values('".$username."','".$emailid."','".$password."')") or die(mysql_error());  
                return $qr;            
        }  
    }  
?>  