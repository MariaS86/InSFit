<?php
    session_start(["use_strict_mode" => true]);
    require('dbconnect.php');

    unset($_SESSION['message']);

    if ($_GET['train'] == 1){
    include 'donetrain.php';
    }
    if ($_GET['train'] == 2){
    include 'onlinetrain.php';
    }
