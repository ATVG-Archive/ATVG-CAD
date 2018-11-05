<?php
    session_start();
    include "updater.php";
    if($_SESSION['admin_privilege'] == 2){
        $updater = new Updater();
        $updater->doUpdate();
    }