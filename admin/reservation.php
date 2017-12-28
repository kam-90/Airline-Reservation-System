<?php
session_start();
require_once('../database.php');

$queryCustomers = 'SELECT * FROM ticketcart p JOIN register pv ON p.Customer_ID = pv.Register_ID
JOIN ticketdetails v ON p.Ticket_ID = v.Ticket_ID WHERE p.Trip_Type="OneWay"';
$statement2 = $db->prepare($queryCustomers);
$statement2->execute();
$reservations = $statement2->fetchAll();
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
        <H4 class="screen-mission">One Way Trip Reservations</H4>
        <a href="roundReservations.php"><button type="button"  class="btn btn-warning btn-lg">Round Trip Reservations</button></a>
    <br>

</div>

<div class="col-sm-12 container-fluid top"> 
<table class="table table-striped table-inverse" style="color: black">
  <thead>
    <tr>
      <th>Reservation ID</th>
      <th>CustomerID</th>
      <th>Customer Name</th>
      <th>Airline ID</th>
      <th>TripType</th>
      <th>Seat-Class</th>
      <th>Ticket-Date</th>
      <th>Total Fare</th>
      
    </tr>
  </thead>
  <tbody>
  <?php foreach ($reservations as $loc) : ?>
    <tr>
      <th scope="row"><?php echo $loc['Cart_ID']; ?></th>
      <td><?php echo ucfirst($loc['Customer_ID']); ?></td>
      <td><?php echo $loc['User_Name']; ?></td>
      <td><?php echo $loc['Ticket_ID']; ?></td>
      
      <td><?php echo $loc['Trip_Type']; ?></td>
      <td><?php echo $loc['Seat_Class']; ?></td>
      <td><?php echo $loc['Ticket_Date']; ?></td>
      <td><?php echo $loc['Total_Fare']; ?></td>
      
      
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
</body>

</html>