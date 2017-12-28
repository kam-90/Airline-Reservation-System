<?php
session_start();
if(isset($_GET['edit_id']))
{
    require_once('../database.php');
    $id =$_GET['edit_id'];

    $result = $db->prepare("SELECT * FROM currentloc WHERE From_ID= :id");
	$result->bindParam(':id', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
		$Id=$row['From_ID'];
		$city= $row['City_Name'];
		$airport=$row['Airport_Name'];
		
     }  




?>	

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
  </script>
  <link rel="stylesheet" type="text/css" href="../css/style1.css" />
  <script>
function validateForm() {
    var x = document.forms["addform"]["city"].value;
    var y=document.forms["addform"]["airport"].value;
    

    var correction = document.getElementById("wrong");
    if (x == "" ||y=="" ) {
        correction.innerHTML ="Please Enter Location Details";
        return false;
    }

   
    else{
        
        return true;
    }
}
</script>
  <style type="text/css">
  
  </style>

</head>

<body>
 <?php
 include("adminheader.php");
?>

<div class="col-sm-12 container-fluid top"> 
    <br>
        <h3 class="screen-logo">WORLDWIDE TRAVELLING WITH FLY HIGH</h3>
        <H4 class="screen-mission">Edit Location Details</H4>
    <br>
   
</div>
<div class="col-sm-3 container-fluid top"> </div>
<div class="col-sm-6 container-fluid top"> 
  <form  name="addform" method="post" action="savelocation.php" onsubmit="return validateForm()">
  	
             <table id="f1" align="center">
               <tr>
             		<td></td>
             		<td><input type="hidden" name="id1" value="<?php echo $Id ?>"><br><br></td>
             	</tr>
             	<tr>
             		<td><label>City Name</label></td>
             		<td><input type="text" name="city" value="<?php echo $city ?>"><br><br></td>
             	</tr>

             	<tr>
             		<td><label>Airport Name:</label></td>
             		<td><input type="text" name="airport" value="<?php echo $airport ?>"><br><br></td>
             	</tr>
             	
                <br>
                <tr><td><span id="wrong"></span></td><td></td></tr>
             	<tr><td></td><td><input type="submit" name="btnSubL" value="Update Location"></td></tr>

             </table>
            
            

            
  </form>


</div>
<div class="col-sm-3 container-fluid top"> </div>
</body>

</html>
<?php
	}
	?>
