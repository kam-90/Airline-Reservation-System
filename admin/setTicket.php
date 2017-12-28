<?php
session_start();
require_once('../database.php');

$queryticket = 'SELECT * FROM `ticketdetails` p JOIN currentloc pv ON p.From_ID = pv.From_ID
JOIN destination v ON p.To_ID = v.To_ID';
$statement2 = $db->prepare($queryticket);
$statement2->execute();
$tickets = $statement2->fetchAll();
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
        <H4 class="screen-mission">Current Ticket Details</H4>
        <a href="createTicket.php"><button type="button"  class="btn btn-warning btn-lg">Create Ticket</button></a>
    <br>

</div>

<div class="col-sm-12 container-fluid top"> 
<table class="table table-striped table-inverse" style="color: black">
  <thead>
    <tr>
      <th>Airline ID</th>
      <th>Airline Name</th>
      <th>Ticket Type</th>
      <th>Economy Ticket Price</th>
      <th>Business Ticket Price</th>
      <th>Deal Discount</th>
      <th>From-To(One Way)</th>
      <th>From-To(Round Way)</th>
      
      
    </tr>
  </thead>
  <tbody>
  <?php foreach ($tickets as $loc) : ?>
    <tr>
      <th scope="row"><?php echo $loc['Ticket_ID']; ?></th>
      <td><?php echo ucfirst($loc['Airline_Name']); ?></td>
      <td><?php echo $loc['Ticket_Type']; ?></td>
      <td><?php echo $loc['Economy_Price']; ?></td>
      <td><?php echo $loc['Business_Price']; ?></td>
      <td><?php echo $loc['Discount_Price']; ?></td>
      <td><?php echo $loc['City_Name'].'-'.$loc['Dest_City']; ?><br>
      <?php echo $loc['Ticket_Date'] ?>
      <br><?php echo $loc['Depart_Time'].'-'.$loc['Arrival_Time']; ?></td>
      <td>

      <?php 
      if($loc['Ticket_Type']=="RoundTrip")
      {
         echo $loc['Dest_City'].'-'.$loc['City_Name'];?><br><?php echo $loc['Return_Date'] ?><br><?php echo $loc['Return_Depart_Time'].'-'.$loc['Return_Arrival_Time']; ?>
      
      <?php
      }
      else{
        echo'-No Round Trip-'; 
      }
      ?>
      </td>

      
      
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
</body>

</html>