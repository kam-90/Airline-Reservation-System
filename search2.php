<?php  
require_once('database.php');
 if(isset($_POST["query"]))  
 {  
      $output = '';  
      $query = "SELECT * FROM destination WHERE Dest_City LIKE '%".$_POST["query"]."%'";  
      $statement2 = $db->prepare($query);
      $statement2->execute();
      $Locations = $statement2->fetchAll();
     
      $output = '<ul class="list-unstyled app2">';  
      if(count($Locations) > 0)  
      {  
           foreach ($Locations as $location)
           {  
                $output .= '<li>'.$location["Dest_City"].'-'.$location["Airport_Name"].'</li>';  
           }  
      
      }   
      else  
      {  
           $output .= '<li>No Flight For Selected Location</li>';  
      } 
      $output .= '</ul>';  
      echo $output;  
 }  

 ?>  