
<?php
session_start();
require_once('../database.php');
if (isset($_POST['btnSubL']))
{  
	      

			$_id=$_POST['id1'];
			$_city=$_POST['city'];
			$_airport=$_POST['airport'];
			
			

			$result = $db->prepare("Update destination SET Dest_City=:city, Airport_Name=:air WHERE To_ID=:id");
	        $result->bindParam(':id',$_id);
	        $result->bindParam(':city',$_city);
	        $result->bindParam(':air',$_airport);
	        
	        
            $result->execute();
            header("Location: Destinations.php");
            
    
}

?>