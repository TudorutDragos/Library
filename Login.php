<?php

    require 'DB_config.php';

    $message = '';


    if(isset($_POST['name']) && isset($_POST['password'])){
        $connection = new mysqli(
            DB_SERVER,
            DB_USER,
            DB_PASSWORD,
            DB_DATABASE
        );

        $query = sprintf(
            "SELECT password FROM users WHERE user_name='%s'", $connection->real_escape_string($_POST['name'])
        );

        $result = $connection->query($query);
        $row = $result->fetch_object();

        if($row!=null){
            $hash=$row->password;
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
    }


    echo "<p>$message</p>";
?>

<form method="post" action="">
    <div>
        <label for="name">User name</label> <input type="text" name="name">
    </div>
    <div>
        <label for="password">Password</label> <input type="password" name="password">
    </div>
    <input type="submit" value="Login">
</form>
