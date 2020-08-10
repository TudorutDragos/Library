<?php

    require 'Functions.php';
    
    $result = SelectAllBooks();
    
    printf("Books:\n");
    foreach($result as $row){
        printf(
            '<li>%s by %s (%s)</li>',
            htmlspecialchars($row['title'], ENT_QUOTES),
            htmlspecialchars($row['author'], ENT_QUOTES),
            htmlspecialchars($row['publishing_house'], ENT_QUOTES)
        );
    }

    $admin = true;

    //$user = GetUserById(id_user_din_login);
    printf("Users:\n");
    if($admin){
        $result = SelectAllUsers();

        foreach($result as $row){
            printf(
                '<li>%s %s, %s, %s</li>',
                htmlspecialchars($row['first_name'], ENT_QUOTES),
                htmlspecialchars($row['last_name'], ENT_QUOTES),
                htmlspecialchars($row['email'], ENT_QUOTES),
                htmlspecialchars($row['password'], ENT_QUOTES)
            );
        }
    }

?>