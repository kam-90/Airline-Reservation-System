<?php
session_start();
require_once('../database.php');
$admin_email=$_SESSION['email'];
$queryCustomers = 'SELECT * FROM register where Email <>:admin
                           ORDER BY Register_ID';
$statement2 = $db->prepare($queryCustomers);
$statement2->bindParam(':admin',$admin_email);
$statement2->execute();
$customers = $statement2->fetchAll();
$statement2->closeCursor();


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
        <H4 class="screen-mission">VIEW CUSTOMER Registered With US</H4>
    <br>

</div>
<div class="col-sm-2 container-fluid top"> </div>
<div class="col-sm-8 container-fluid top"> 
<table class="table table-striped table-inverse" style="color: black">
  <thead>
    <tr>
      <th>Customer ID</th>
      <th>Customer Name</th>
      <th>Customer Email</th>
      <th>Operation</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($customers as $customer) : ?>
    <tr>
      <th scope="row"><?php echo $customer['Register_ID']; ?></th>
      <td><?php echo ucfirst($customer['User_Name']); ?></td>
      <td><?php echo $customer['Email']; ?></td>
      <td><a href="deleteCustomer.php?delete_id=<?php echo $customer['Register_ID']; ?>"><img src="../images/del.png" onclick="return confirm('Are you sure to delete the Customer Record !'); " class="responsive delImage"></a></td>

    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
</body>

</html>