<?php
session_start();
require_once('../database.php');
if (isset($_POST['btnSubL'])) {

      $_city=$_POST['city'];
      $_airport=$_POST['airport'];
      
       $query = 'INSERT INTO destination
                 (Dest_City, Airport_Name)
              VALUES
                 ( :city, :air)';
    $statement = $db->prepare($query);
    //$statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':city', $_city);
    $statement->bindValue(':air', $_airport);
    $statement->execute();
    $statement->closeCursor();
    header("Location: Locations.php");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Location</title>
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
<br><br>
<div class="col-sm-12 container-fluid top"> 
    <br>
        <h3 class="screen-logo">WORLDWIDE TRAVELLING WITH FLY HIGH</h3>
        <H4 class="screen-mission">Add Locations</H4>
    <br>

</div>
<div class="col-sm-3 container-fluid top"> </div>
<div class="col-sm-6 container-fluid top"> 
<div class="col-sm-6 container-fluid top"> 
  <form  name="addform" method="post" action="addlocation.php" onsubmit="return validateForm()">
    
             <table id="f1" align="center">
               
              <tr>
                <td><label>City Name:</label></td>
                <td><input type="text" name="city" ><br><br></td>
              </tr>

              <tr>
                <td><label>Airport Name:</label></td>
                <td><input type="text" name="airport"><br><br></td>
              </tr>
              
                <br>
                <tr><td><span id="wrong"></span></td><td></td></tr>
              <tr><td></td><td><input type="submit" name="btnSubL" value="Add Location"></td></tr>

             </table>
            
            

            
  </form>


</div>
</div>
<div class="col-sm-3 container-fluid top"> </div>
</body>

</html>



