<?php
    /* SESSION */
    //@ob_start();
    session_start();
    
    $db = 'ekhayafoods';
    $user = 'root';
    $psswd = '';
    $server = 'localhost';

    $conn = new mysqli($server, $user, $psswd, $db);

    if (!$conn)
    {
        die("Connection failed: " . "br" . $conn->connect_error);
    }
    
?>