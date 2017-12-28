<?php
session_start();
//echo'data session-'.$_SESSION['Id'];
unset($_SESSION['Id']);
unset($_SESSION['user_name']);
unset($_SESSION['email']);
unset($_SESSION['tk']);
unset($_SESSION['ticketID']);
unset($_SESSION['total_fare']);
session_destroy();

header("location: home.php");

?>
