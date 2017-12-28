<?php
session_start();
require_once('../database.php');

if(isset($_POST['alpha'])){

  $a=$_POST['airline'];
  $b=$_POST['category_id'];
  $c=$_POST['dest_id'];
  $d=$_POST['Ticket_type'];
  $e=$_POST['depart'];
  $f=$_POST['arrival'];
 
  $g=$_POST['d_time'];
  $h=$_POST['a_time'];
  $i=$_POST['return_depart_time'];
  $j=$_POST['return_arrival_time'];
  $k=$_POST['eco'];
  $l=$_POST['bus'];
  $m=$_POST['dis'];
  $n=$_POST['seats'];
  $img=null;

     $query = 'INSERT INTO ticketdetails
                 (Airline_Name,Airline_image,From_ID,To_ID,Ticket_Date,Return_Date,Depart_Time,Arrival_Time,Return_Depart_Time,Return_Arrival_Time,Ticket_Type,Economy_Price,Business_Price,Discount_Price,Total_Seats)
              VALUES
                 ( :air,:img,:frm,:to,:td,:ret,:depT,:ArrT,:RdepT,:RArrT,:TK,:Ec,:Bu,:ds,:seat)';
    $statement = $db->prepare($query);
    //$statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':air', $a);
    $statement->bindValue(':img', $img);
    $statement->bindValue(':frm', $b);
    $statement->bindValue(':to', $c);
    $statement->bindValue(':td', $e);
    $statement->bindValue(':ret', $f);
    $statement->bindValue(':depT', $g);
    $statement->bindValue(':ArrT', $h);
    $statement->bindValue(':RdepT', $i);
    $statement->bindValue(':RArrT', $j);
    $statement->bindValue(':TK', $d);
    $statement->bindValue(':Ec', $k);
    $statement->bindValue(':Bu', $l);
    $statement->bindValue(':ds', $m);
    $statement->bindValue(':seat',$n);
    $statement->execute();
    $statement->closeCursor();
    header("Location: setTicket.php");
}
else{

	echo"Insertion Error";
}

?>