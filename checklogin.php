<?php
session_start();
include('encryptPassword.php');
require_once('database.php');

if(isset($_GET["Ticket_id"]))
{
  $Ticket_id=htmlspecialchars($_GET["Ticket_id"]);
}
if (isset($_POST['btnLog']))
{        
	       $_email=$_POST['email'];
         $_pass=$_POST['password'];
         $hash=secure($_pass);// added this 
         $Id=0;
      	 $user_name=null;
      	 $email=null;
         $cryptPassword=null;

         

	      $result = $db->prepare("SELECT * FROM register WHERE Email= :email");
		    $result->bindParam(':email', $_email);
        
	      $result->execute();
      
      if($row = $result->fetch()) 
      {
      	
          $Id=$row['Register_ID'];
					$user_name= $row['User_Name'];
					$email=$row['Email'];
					$cryptPassword=$row['Password'];

          if ( hash_equals($cryptPassword, crypt($_pass, $cryptPassword)) ) {
                //echo" same password decrypted";
                session_start();
                $_SESSION['Id']=$Id;
                $_SESSION['user_name']=$user_name;  
                $_SESSION['email']=$email;
               if(isset($_SESSION['ticketID']))
                {
                   $Ticket_id=$_SESSION['ticketID'];
                   header("location: payment.php?Ticket_id=".$Ticket_id);
                }
                if($email=="admin99@bu.edu"){
                  header("location:admin/admin.php");
                }
                else{
                  header("location: home.php");
                }

             }

            else{

              header("location: wrong.php");

              }
           
         // echo $cryptPassword.'========'.$hash;
           //echo"user id is: ".$Id;
      }

     else{

      	header("location: wrong.php");
      }
      
      $result->closeCursor();
       
      
      
      
    //echo "data reaching.".$_SESSION['Id'].'--'.$_SESSION['email'];// Form has been submitted
}
else
{
    echo "<h3>You cannot Access.</h3>";// Form has not been submitted
}

?>