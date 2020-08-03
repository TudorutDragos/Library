<?php

    require 'DB_config.php';

    function ConnectToDataBase(){
        $connection = new mysqli(
            DB_SERVER,
            DB_USER,
            DB_PASSWORD,
            DB_DATABASE
        );

        return $connection;
    }

    function GetAllBooks(){
        
        $db = ConnectToDataBase();
        $query = "SELECT * FROM books";
        $result = $db->query($query);
        $db->close();

        return $result;
    }

    function GetAllUsers(){

        $db = ConnectToDataBase();
        $query = "SELECT * FROM users";
        $result = $db->query($query);
        $db->close();

        return $result;
    }

    function GetBooksByUserId($userId){
        $db = ConnectToDataBase();
        $query = "SELECT * FROM books WHERE user_id=$userId";
        $result = $db->query($query);
        $db->close();

        return $result;
    }

    function GetUserById($id){
        $db = ConnectToDataBase();
        $query = "SELECT * FROM users WHERE id=$id";
        $result = $db->query($query);
        $db->close();

        return $result;
    }

?>