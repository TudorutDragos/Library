<?php

    require 'DB_config.php';

    $message = '';

    if(isset($_POST['userName']) && isset($_POST['password'])){
        $connection = new mysqli(
            DB_SERVER,
            DB_USER,
            DB_PASSWORD,
            DB_DATABASE
        );
    }

?>
