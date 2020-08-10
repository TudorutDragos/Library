<?php

    require 'DB_config.php';

    $firstName = '';
    $lastName = '';
    $userName = '';
    $email = '';
    $phoneNumber = '';
    $password = '';

    if(isset($_POST['login'])){
        header('Location: Login.php');
    }

    if(isset($_POST['submit'])){
        $ok=true;

        if(isset($_POST['firstName']) && $_POST['firstName']!=''){
            $firstName = $_POST['firstName'];
        }
        else
            $ok=false;
        if(isset($_POST['lastName']) && $_POST['lastName']!=''){
            $lastName = $_POST['lastName'];
        }
        else
            $ok=false;
        if(isset($_POST['username']) && $_POST['username']!=''){
            $userName = $_POST['username'];
        }
        else
            $ok=false;
        if(isset($_POST['email']) && $_POST['email']!=''){
            $email = $_POST['email'];
        }
        else
            $ok=false;
        if(isset($_POST['phoneNumber']) && $_POST['phoneNumber']!=''){
            $phoneNumber = $_POST['phoneNumber'];
        }
        else
            $ok=false;
        if(isset($_POST['password']) && $_POST['password']!=''){
            $password = $_POST['password'];
        }
        else
            $ok=false;

        if($ok){
            $connection = new mysqli(
                DB_SERVER,
                DB_USER,
                DB_PASSWORD,
                DB_DATABASE
            );

            $hash = password_hash($password, PASSWORD_DEFAULT);

            $query = sprintf(
                "INSERT INTO users (first_name, last_name, user_name, email, phone_number, password) 
                VALUES ('%s', '%s', '%s', '%s', '%s', '%s')",
                $connection->real_escape_string($firstName),
                $connection->real_escape_string($lastName),
                $connection->real_escape_string($userName),
                $connection->real_escape_string($email),
                $connection->real_escape_string($phoneNumber),
                $connection->real_escape_string($hash)
            );

            $connection->query($query);
            $connection->close();

            header('Location: Login.php');
        }
        else{
            echo "Please fill all the informations";
        }
    }
?>

<form action="" method="post">
First name: <input type="text" name="firstName" value="<?php
    echo htmlspecialchars($firstName, ENT_QUOTES);
    ?>"><br>
Last name: <input type="text" name="lastName" value="<?php
    echo htmlspecialchars($lastName, ENT_QUOTES);
    ?>"><br>
User name: <input type="text" name="username" value="<?php
    echo htmlspecialchars($userName, ENT_QUOTES);
    ?>"><br>
Email: <input type="text" name="email" value="<?php
    echo htmlspecialchars($email, ENT_QUOTES);
    ?>"><br>
Phone number: <input type="text" name="phoneNumber" value="<?php
    echo htmlspecialchars($phoneNumber, ENT_QUOTES);
    ?>"><br>
Password: <input type="password" name="password"><br>
    <input type="submit" name="submit" value="Register">
    <input type="submit" name="login" value="Login">
</form>