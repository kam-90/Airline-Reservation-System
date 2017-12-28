<?php
session_start();

require_once('database.php');
if(isset($_SESSION['user_name']))
{


 
              $Ticketno=$_SESSION['ticketID'];
              $loc =$_SESSION['tk']['location'][0];
              $des=$_SESSION['tk']['destination'][0];
              $trip_type=$_SESSION['tk']['trip'];
              $No_adults=null;
              $No_children=null;
              if(!empty($_SESSION['tk']['adults'])){
                 $No_adults=$_SESSION['tk']['adults'];

              }
              if(!empty($_SESSION['tk']['children'])){
                 $No_children=$_SESSION['tk']['children'];

              }
              $seat_type=$_SESSION['tk']['seat'];
              $result = $db->prepare("SELECT * FROM ticketdetails WHERE Ticket_ID= :tkID");
                $result->bindParam(':tkID', $Ticketno);
        
                $result->execute();
      
                if($row = $result->fetch()) 
                  {     
                    $Airline_Name=$row['Airline_Name'];
                    $Ticket_Date=$row['Ticket_Date'];
                    $Depart_Time=$row['Depart_Time'];
                    $Arrival_Time=$row['Arrival_Time'];
                    $Discount_Price=$row['Discount_Price'];
                    if(0==strcmp($seat_type,'Economy')){
                      $Price=$row['Economy_Price'];
                      //echo "--".$trip_type.'--'.$Price;
                    }
                    else{
                      $Price=$row['Business_Price'];
                    }
                          
                   $firstTime=strtotime($Depart_Time);
                   $lastTime=strtotime($Arrival_Time);
                   $timeDiff=($lastTime-$firstTime)/3600;
                   $time = floatval($timeDiff);
                   $time_HH=number_format($time,2,':',null);
                  
                $result->closeCursor();

                $query = 'INSERT INTO ticketcart
			     (Customer_ID, Ticket_ID, Session_ID,Trip_Type,Seat_Class,Total_Fare)
			      VALUES
			      ( :customer, :ticket, :session,:trip_type,:seat_class,:total_fare)';
			    $statement = $db->prepare($query);
			    //$statement->bindValue(':category_id', $category_id);
			    $statement->bindValue(':customer',$_SESSION['Id']);
			    $statement->bindValue(':ticket', $Ticketno);
			    $statement->bindValue(':session',session_id());
			    $statement->bindValue(':trip_type',$trip_type);
			    $statement->bindValue(':seat_class',$seat_type);
			    $statement->bindValue(':total_fare',$_SESSION['total_fare']);
			    $statement->execute();
			    $statement->closeCursor();

                   }  ?>
                   
                    
 

<?php 
ob_start();
require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->Image("images/logo2.png");
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,10,'Thanks For Reservation with FlyHigh',1,1,"B");
$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,10,'Airline:'.$Airline_Name,1,1,"B");
$pdf->Cell(0,10,'AirlineID:'.$Ticketno,1,1,"B");
$pdf->Cell(0,10,'Customer Name:'.$_SESSION['user_name'],1,1,"B");
$pdf->Cell(0,10,'Customer Email:'.$_SESSION['email'],1,1,"B");
$pdf->Cell(0,10,'From-To:'.$loc.'-'.$des,1,1,"B");
$pdf->Cell(0,10,'Date:'.$Ticket_Date,1,1,"B");
$pdf->Cell(0,10,'Flight To:'.$des,1,1,"B");
$pdf->Cell(0,10,'Duration To:'.$time_HH,1,1,"B");
$pdf->Cell(0,10,'Amount Paid: $'.$_SESSION['total_fare'],1,1,"B");
$pdf->SetFont("","","12");

$pdf->write(5,"\nRights Reserved with Fly High: ");
$pdf->Output();   
ob_end_flush(); 
  
         
 
}// if session is set for customer

else{
       
    echo"not getting in";
	}?>