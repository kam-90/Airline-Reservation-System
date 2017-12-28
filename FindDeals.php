<?php
session_start();
//echo session_id();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" type="text/css" href="css/style1.css" />
  <script type="text/javascript" src="js/Customjs.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="js/validate.js"></script>

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

</style>
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
require_once('database.php');
 if (isset($_POST['btnSub'])) {
    
                $_location=$_POST['loc'];
                $_destination=$_POST['des'];
                $_trip=$_POST['optradio'];
                $_depart_date=$_POST['depart'];
                $_return_date=$_POST['arrival'];
                $_adults=$_POST['adults'];
                $_children=$_POST['children'];
                $_seat=$_POST['class'];
                 
                $loc=explode('-', $_location);
                $dest=explode('-',$_destination);
                echo"<h3>".$_trip." Ticket Details</h3>";


                 $a = array('location', 'destination','trip','adults','children','seat');
                 $b = array($loc, $dest,$_trip,$_adults,$_children,$_seat);
                 $c = array_combine($a, $b);
                 $_SESSION['tk']=$c;
                 //print_r($_SESSION['tk']['location'][]);
         if(0==strcmp($_trip,"OneWay"))
        {   
        
            
              $result = $db->prepare("SELECT *
                                        FROM ticketdetails p
                                        JOIN currentloc pv
                                        ON p.From_ID = pv.From_ID
                                        JOIN destination v
                                        ON p.To_ID = v.To_ID
                                        WHERE p.Ticket_Date =:depart_date And p.Ticket_Type=:type1
                                        And pv.City_Name=:loc
                                        And v.Dest_City=:dest 
                                        ORDER BY p.Economy_Price");
                $result->bindParam(':depart_date',$_depart_date);
                $result->bindParam(':type1',$_trip);
                $result->bindParam(':loc',$loc[0]);
                $result->bindParam(':dest',$dest[0]);
                $result->execute();
                $tickets = $result->fetchAll();
                echo "<b><h4>". count($tickets).' Matching Records</h4></b>';
                //echo count($tickets);
                if(count($tickets)>0) 
               {
                    ?>
                    <div class="col-sm-2 sidenav text-left">

                    <div class="hero">
                     <h3>Details</h3><br>
                     <h5>Detination:<b><?php echo $_destination ?></b></h5><br>
                     <h5>Date:<b><?php echo date('D M Y', strtotime($_depart_date)); ?></b></h5><br>
                     <h5>Seat Class:<b><?php echo $_seat ?></b></h5><br>
                    </div>
           </div>
           <div class="col-sm-10 text-left center-div"> 
                    

               <?php foreach ($tickets as $ticket) : ?>
                <div class="row list">
                   <div class="col-sm-1"><img src="images/logo2.png" class="img-fluid logo"></div>
                   <div class="col-sm-2" style="margin-left: auto;"> <h5><?php echo $ticket['Ticket_ID'] ?></h5><h5><?php echo $ticket['Airline_Name']?></h5>
                    <p>All prices include Tax</p>

                   </div>
                   
                    
                    <div class="col-sm-2 float-left" style="margin:auto;"><h5>
                   <?php echo $ticket['Depart_Time'].'-'.$ticket['Arrival_Time']?></h5><h5><?php echo $ticket['City_Name'].'-'.$ticket['Dest_City'] ?></h5></div>

                    <div class="col-sm-3 float-left" style="margin:auto;"><h5>
                    <?php  
                        if(0==strcmp($_seat,"Economy")){
                            echo"Economy Ticket $".$ticket['Economy_Price'];
                        }
                        else{
                            echo"Business Ticket $".$ticket['Business_Price'];
                        }
                        ?>
                    </h5><h5>Journey-Type: <?php echo $ticket['Ticket_Type']; ?></h5></div>
                    <div class="col-sm-2 float-left" style="margin:auto;"><h5>
                    <?php 
                     
                             $firstTime=strtotime($ticket['Depart_Time']);
                             $lastTime=strtotime($ticket['Arrival_Time']);
                             $timeDiff=($lastTime-$firstTime)/3600;
                             $time = floatval($timeDiff);
                     echo 'Duration '.number_format($time,2,':',null);
                    ?>
                    </h5><h5>Non-Stop</h5></div>
                       
                               <div class="col-sm-2" style="margin-top:15px;"><a href="payment.php?Ticket_id=<?php echo $ticket['Ticket_ID'] ?>"><button type="button" class="btn btn-md yellow">Select</button></a></div>
                               
                      
               </div>
          <br>
          <?php endforeach; 
               }

               else{ echo '<b><h3>No Records founds</h3></b>';}
    }

    
            
           //my data



        else if(0==strcmp($_trip,"RoundTrip"))
        {   
        
            
              $result = $db->prepare("SELECT *
                                        FROM ticketdetails p
                                        JOIN currentloc pv
                                        ON p.From_ID = pv.From_ID
                                        JOIN destination v
                                        ON p.To_ID = v.To_ID
                                        WHERE p.Ticket_Date =:depart_date And p.Ticket_Type=:type1
                                        And pv.City_Name=:loc
                                        And v.Dest_City=:dest 
                                        ORDER BY p.Economy_Price");
                $result->bindParam(':depart_date',$_depart_date);
                $result->bindParam(':type1',$_trip);
                $result->bindParam(':loc',$loc[0]);
                $result->bindParam(':dest',$dest[0]);
                $result->execute();
                $tickets = $result->fetchAll();
                echo "<b><h4>". count($tickets).' Matching Records</h4></b>';
                //echo count($tickets);
                if(count($tickets)>0) 
               {
                    ?>
                    <div class="col-sm-2 sidenav text-left">

                    <div class="hero">
                     <h3>Details</h3><br>
                     <h5>Journey:<b><?php echo $_location.' TO '.$_destination ?></b></h5><br>
                     <h5>Date:<b><?php echo date('j M Y', strtotime($_depart_date)); ?>
                     <br><br>
                     <h5>Return Journey:<b><?php echo $_destination.' TO '.$_location ?></b></h5><br>
                     <h5>Date:<b><?php echo date('j M Y', strtotime($_return_date)); ?>  
                     </b></h5><br>
                     <h5>Seat Class:<b><?php echo $_seat ?></b></h5><br>
                    </div>
           </div>
           <div class="col-sm-10 text-left center-div"> 
                    

               <?php foreach ($tickets as $ticket) : ?>
                <div class="row list">
                   <div class="col-sm-1"><img src="images/logo2.png" class="img-fluid logo"></div>
                   <div class="col-sm-2" style="margin-left: auto;"> <h5><?php echo $ticket['Ticket_ID'] ?></h5><h5><?php echo $ticket['Airline_Name']?></h5>
                    <p>All prices include Tax</p>

                   </div>
                   
                    
                    <div class="col-sm-2 float-left" style="margin:auto;"><h5>
                   <?php echo $ticket['Depart_Time'].'-'.$ticket['Arrival_Time']?></h5><h5><?php echo $ticket['City_Name'].'-'.$ticket['Dest_City'] ?></h5></div>
                    
                    <div class="col-sm-2 float-left" style="margin:auto;"><h5>
                   <?php echo $ticket['Return_Depart_Time'].'-'.$ticket['Return_Arrival_Time']?></h5><h5><?php echo $ticket['Dest_City'].'-'.$ticket['City_Name']?></h5></div>

                    <div class="col-sm-3 float-left" style="margin:auto;"><h5>
                    <?php  
                        if(0==strcmp($_seat,"Economy")){
                            echo"Economy Ticket $".$ticket['Economy_Price'];
                        }
                        else{
                            echo"Business Ticket $".$ticket['Business_Price'];
                        }
                        ?>
                    </h5><h5>Journey-Type: <?php echo "$".$ticket['Ticket_Type']; ?></h5></div>
                    <div class="col-sm-2 float-left" style="margin:auto;"><h5>
                    <?php 
                     
                             $firstTime=strtotime($ticket['Depart_Time']);
                             $lastTime=strtotime($ticket['Arrival_Time']);
                             $timeDiff=($lastTime-$firstTime)/3600;
                             $time = floatval($timeDiff);
                     echo 'Duration '.number_format($time,2,':',null);
                    ?>
                    </h5><h5>Non-Stop</h5></div>
                       
                               <div class="col-sm-2"><a href="payment.php?Ticket_id=<?php echo $ticket['Ticket_ID'] ?>"><button type="button" class="btn btn-md yellow">Select</button></a></div>
                               
                      
               </div>
          <br>
          <?php endforeach; 
               }

               else{ echo '<b><h3>No Records founds</h3></b>';}
    }


// my dta ends

      else{

        echo "Sorry For Inconvenience. Search Again.";
      }   
  
 }
?>

       
    </div>

    

  </div>
</div>

</body>
</html>