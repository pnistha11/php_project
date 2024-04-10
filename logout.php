<?php
    include 'connection_inc.php';
    session_start();

    session_destroy();

    header('location:login.php');
?>