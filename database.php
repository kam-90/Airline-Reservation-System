<?php
    $dsn = 'mysql:host=localhost;dbname=ticket_reservation';
    $username = 'root';
    $password = '';

    try {
        $db = new PDO($dsn, $username, $password);
        //echo "connected";
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
?>