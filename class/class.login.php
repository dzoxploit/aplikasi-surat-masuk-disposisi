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

        public function Login($emailid, $password){  
            $res = mysql_query("SELECT * FROM users WHERE emailid = '".$emailid."' AND password = '".md5($password)."'");  
            $user_data = mysql_fetch_array($res);  
            //print_r($user_data);  
            $no_rows = mysql_num_rows($res);  
              
            if ($no_rows == 1)   
            {  
           
                $_SESSION['login'] = true;  
                $_SESSION['uid'] = $user_data['id'];  
                $_SESSION['username'] = $user_data['username'];  
                $_SESSION['email'] = $user_data['emailid'];  
                return TRUE;  
            }  
            else  
            {  
                return FALSE;  
            }  
        }  
        public function isUserExist($emailid){  
            $qr = mysql_query("SELECT * FROM users WHERE emailid = '".$emailid."'");  
            echo $row = mysql_num_rows($qr);  
            if($row > 0){  
                return true;  
            } else {  
                return false;  
            }  
        }  
        
    }  
?>  