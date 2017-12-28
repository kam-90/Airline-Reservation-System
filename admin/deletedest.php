<?php
session_start();
if(isset($_GET['delete_id']))
{
	
   require_once('../database.php');
   $id =$_GET['delete_id'];

    $query = 'DELETE FROM destination
              WHERE To_ID = :_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':_id', $id);
    $success = $statement->execute();
    $statement->closeCursor();    
     
    header("location:Destinations.php");

}


?>
