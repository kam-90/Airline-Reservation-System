<?php
include('encryptPassword.php');
 session_start();
 if(isset($_SESSION['user_name'])){
   header("location: home.php");
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style1.css" />
  <script type="text/javascript" src="js/Customjs.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/validate.js"></script>

<script>

 </script>
</head>
<body class="bg">

<?php
require_once('database.php');
if (isset($_POST['SignUp']))
{
	     $_name=$_POST['name'];
         $_pass=$_POST['password'];
         $_pass2=$_POST['password2'];
         $_email=$_POST['email'];


      $result = $db->prepare("SELECT * FROM register WHERE Email= :email");
	    $result->bindParam(':email', $_email);
      $result->execute();
      $alpha=$result->fetch();
      $result->closeCursor();
      if (!empty($alpha)) { include("header.php"); 
          echo '<br><h3> Email Already Exits</h3>'
      ?>
           
      <?php
       } 
      else {
              $hash=secure($_pass);
              
              $query = 'INSERT INTO register
                 (User_Name, Password, Email)
              VALUES
                 ( :name, :pass, :email)';
				    $statement = $db->prepare($query);
				    //$statement->bindValue(':category_id', $category_id);
				    $statement->bindValue(':name', $_name);
				    $statement->bindValue(':pass', $hash);
				    $statement->bindValue(':email', $_email);
				    $statement->execute();
				    $statement->closeCursor();
			 include("header.php"); 	    
             include("loginbox.php");
             echo "<h3><Thankyou For Registering</h3>";
       }

      
 }
else
{
    echo "data not reaching.";// Form has not been submitted
}

?>

</body>
</html>