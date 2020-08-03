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

    $query = sprintf(
        "SELECT password FROM users WHERE userName='%s'", $db->real_escape_string($_POST['userName'])
    );

    $result = $connection->query($query);
    $row = $result->fetch_object();

    if($row!=null){
        $hash=$row->hash;
        if(password_verify($_POST['password'],$hash)){
            $message='Login successful';
        }
        else{
            $message='Login failed';
        }
    }
    else{
        $message='Login failed';
    }

    $connection->close();

?>

<form method="post" action="">
    <div>
        <label for="name">User name</label> <input type="text">
    </div>
    <div>
        <label for="password">Password</label> <input type="password">
    </div>
    <input type="submit" value="Login">
</form>
