<?php
session_start();
    if(isset($_GET["Ticket_id"]))
    {
     $Ticket_id=htmlspecialchars($_GET["Ticket_id"]);
     require_once('database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Payment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="js/Customjs.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="js/validate.js"></script>
<script type="text/javascript">
  
  function ck(){

    alert("Please Login");


  }
</script>
<style type="text/css">
.hero{
 color: #757575;
 font-weight: bold;
 font-family: "Impact, Charcoal", sans-serif;
 letter-spacing: 1px;


}

.list{
    
    -webkit-box-shadow: 0 0 0 100px white inset;
}
.logo{
    width: 120px;
    height: 20%;

}

.tk{
    -webkit-box-shadow: 0 0 0 100px white inset;
}

.yellow{

    background-color: #FFD600;
}

#pay{
color:black;
font-weight: bold;

}

.payment{

  font-weight: bold;
  color:#5499C7;  


}

</style>
<link rel="stylesheet" type="text/css" href="css/style1.css" />
</head>
<body class="bg">

<?php
 include("header.php");
?>

<div class="col-sm-12 container-fluid top"> 
    <br>
        <h3 class="screen-logo">WORLDWIDE TRAVELLING WITH FLY HIGH</h3>
        <H4 class="screen-mission">COLLABORATING WITH WORLD WIDE AIRLINES</H4>
    <br>

</div>
<div class="container-fluid text-center">    

  <div class="row content">
    <?php

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
                $result->bindParam(':tkID', $Ticket_id);
        
                $result->execute();
      
                if($row = $result->fetch()) 
                  {     
                    $Airline_Name=$row['Airline_Name'];
                    $Ticket_Date=$row['Ticket_Date'];
                    $Depart_Time=$row['Depart_Time'];
                    $Arrival_Time=$row['Arrival_Time'];
                    $Return_Depart_time=$row['Return_Depart_Time'];
                    $Return_Arrival_time=$row['Return_Arrival_Time'];
                    $Discount_Price=$row['Discount_Price'];
                    if(0==strcmp($seat_type,'Economy')){
                      $Price=$row['Economy_Price'];
                      //echo "--".$trip_type.'--'.$Price;
                    }
                    else{
                      $Price=$row['Business_Price'];
                    }
                          
                  }
              //echo "--".$seat_type.'--'.$No_adults.'--'.$trip_type.'--'.$des.'--'.$No_children;
            ?>
    <div class="col-sm-8 text-left">

          <div class="row list">
                   <div class="col-sm-1"><img src="images/logo2.png" class="img-fluid logo"></div>
                   <div class="col-sm-2" style="margin-left: auto;"> <h5>Airline:<?php echo $Ticket_id ?></h5><h5><?php echo $Airline_Name ?></h5>
                    <p><?php ?></p>

                   </div>
                   <div class="col-sm-2 float-left" style="margin:auto;"><h5>
                   <?php echo $Depart_Time.'-'.$Arrival_Time ?></h5><h5><?php echo $loc.'-'.$des ?></h5></div>
                    <?php
                         if(0==strcmp($trip_type,"RoundTrip"))
                         { ?>

                         <div class="col-sm-2" style="margin:auto;"><h5>
                          <?php echo $Return_Depart_time.'-'.$Return_Arrival_time ?></h5><h5><?php echo $des.'-'.$loc ?></h5></div>
                         <?php 
                       }
                    ?>
                    <div class="col-sm-3 float-left" style="margin:auto;"><h5>
                    <?php  
                        if(0==strcmp($seat_type,"Economy")){
                            echo"Economy Ticket $".$Price;
                        }
                        else{
                            echo"Business Ticket $".$Price;
                        }
                        ?>
                    </h5><h5>Journey:
                     <?php 
                     if(0==strcmp($trip_type,"RoundTrip")){
                        echo $trip_type; 
                     }
                     else{
                      echo $trip_type;
                     }
                
                     ?>
                     </h5></div>
                    <div class="col-sm-2 float-left" style="margin:auto;"><h5>
                    <?php 
                     
                             $firstTime=strtotime($Depart_Time);
                             $lastTime=strtotime($Arrival_Time);
                             $timeDiff=($lastTime-$firstTime)/3600;
                             $time = floatval($timeDiff);
                     echo 'Duration '.number_format($time,2,':',null);
                    ?>
                    </h5><h5>Non-Stop</h5></div>
                   <?php
                    if(isset($_SESSION['ticketID'])){
                      echo "";
                    }
                    else{
                      $_SESSION['ticketID']=$Ticket_id;
                    }
                    
                    if(isset($_SESSION['user_name']) && isset($_SESSION['ticketID'])){
                           
                      ?>
                        
                     <a href="TicketPDF.php"><button class="btn btn-primary" style="float: right" name="alpha">Reserve
                     </button></a>

                      <?php
                    }  //changes are here made.
                      else
                        { 
                          ?>
                          <a href="login.php?Ticket_id=$_SESSION['ticketID']"><button class="btn btn-warning" style="float: right; " name="alpha">Reserve
                     </button></a>
                      <?php 
                    }
                   ?>
                  
               </div>







    </div>















    <div class="col-sm-4 sidenav text-left">

    <h3 id="pay">Trip Payment :</h3>
        <div class="row payment">
          <div class="col-sm-4"><h5>Adult Tickets<?php echo':'.$No_adults; ?></h5> <h5>Children Tickets<?php 
          if($No_children=='0' || $No_children==null)
          {
           echo': None'; 
          }
          else{
             echo':'.$No_children; 
          } 
            ?>
          </h5> <br><h5><?php echo''.$seat_type; ?></h5></div>
          
          <div class="col-sm-5"><h5>Per Ticket Price <b>$<?php echo $Price; ?></b></h5><h5>Deal Discount $<b><?php echo $Discount_Price; ?></b></h5>

           <br>
           <h5>Total Fare:<?php
                     if($No_adults=='1'|| $No_children=='0'){
                         $pr=($Price-$Discount_Price);
                     }
                     else{

                          
                     $pr=($Price*$No_adults + ($Price/2)*$No_children)-$Discount_Price;
                   }
                     $_SESSION['total_fare']=$pr;
                     echo "<b>".$pr."</b>";
            ?></h5> 




          </div>
          
        </div>
        <div class="row text-left">
          
          <div class="col-sm-10">
          <p> <b>Important Flight Information</b>

          More Details
          Departure
          Tickets are non-refundable 24 hours after booking and non transferable. Name changes are not allowed.
          Basic Economy includes:
          Complimentary premium entertainment
          Complimentary snacks, soft drinks and Wi-Fi
          Award-winning service</p></div>
         <div class="col-sm-1"></div>

        </div>
        


    </div>

  </div>


</div>
<?php }
else{

echo"<h2>Access Denied. Please Select Ticket.</h2>";

}
?>


  </body>

  </html>