<?php
session_start();
require_once('../database.php');

$querydest = 'SELECT * FROM destination
                           ORDER BY To_ID';
$statement2 = $db->prepare($querydest);
$statement2->execute();
$locations = $statement2->fetchAll();
$statement2->closeCursor();


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Locations</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
  </script>
  <link rel="stylesheet" type="text/css" href="../css/style1.css" />
  <script>
  	

  </script>
  <style type="text/css">
  .delImage{

    width:20px;
    height: 20px;
  }
  </style>

</head>

<body>
 <?php
 include("adminheader.php");
?>

<div class="col-sm-12 container-fluid top"> 
    <br>
        <h3 class="screen-logo">WORLDWIDE TRAVELLING WITH FLY HIGH</h3>
        <H4 class="screen-mission">VIEW DESTINATION LOCATIONS</H4>
        <a href="addDestination.php"><button type="button"  class="btn btn-warning btn-lg">Add Destination Locations</button></a>
    <br>

</div>
<div class="col-sm-2 container-fluid top"> </div>
<div class="col-sm-8 container-fluid top"> 
<table class="table table-striped table-inverse" style="color: black">
  <thead>
    <tr>
      <th>Destiantion ID</th>
      <th>City Name</th>
      <th>Airport Name</th>
      <th>Update</th>
      <th>Delete</th>
      
    </tr>
  </thead>
  <tbody>
  <?php foreach ($locations as $loc) : ?>
    <tr>
      <th scope="row"><?php echo $loc['To_ID']; ?></th>
      <td><?php echo ucfirst($loc['Dest_City']); ?></td>
      <td><?php echo $loc['Airport_Name']; ?></td>
      <td><a href="Editdest.php?edit_id=<?php echo $loc['To_ID']; ?>">Edit</a></td>
      <td><a href="deletedest.php?delete_id=<?php echo $loc['To_ID']; ?>"><img src="../images/del.png" onclick="return confirm('Are you sure to delete the Location Record !'); " class="responsive delImage"></a></td>
      
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
</body>

</html>