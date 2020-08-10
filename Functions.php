<?php

    require 'DB_config.php';


    //Helper function for connecting to the database
    function ConnectToDataBase(){
        $connection = new mysqli(
            DB_SERVER,
            DB_USER,
            DB_PASSWORD,
            DB_DATABASE
        );

        return $connection;
    }

    //Get all the books from the database
    function GetAllBooks(){
        
        $db = ConnectToDataBase();
        $query = "SELECT * FROM books";
        $result = $db->query($query);
        $db->close();

        return $result;
    }

    //Get all the users from the database
    function GetAllUsers(){

        $db = ConnectToDataBase();
        $query = "SELECT * FROM users";
        $result = $db->query($query);
        $db->close();

        return $result;
    }

    //Get all the informations about a book by the user who rent that book
    function GetBooksByUserId($userId){
        $db = ConnectToDataBase();
        $query = "SELECT * FROM books WHERE user_id=$userId";
        $result = $db->query($query);
        $db->close();

        return $result;
    }

    //Get all the informations about a user by his id
    function GetUserById($id){
        $db = ConnectToDataBase();
        $query = "SELECT * FROM users WHERE id=$id";
        $result = $db->query($query);
        $db->close();

        return $result;
    }

?>