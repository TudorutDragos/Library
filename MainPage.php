<?php

    require 'Functions.php';
    
    $result = GetAllBooks();
    
    printf("Books:\n");
    foreach($result as $row){
        printf(
            '<li>%s by %s (%s)</li>',
            htmlspecialchars($row['title'], ENT_QUOTES),
            htmlspecialchars($row['author'], ENT_QUOTES),
            htmlspecialchars($row['publishing_house'], ENT_QUOTES)
        );
    }

    printf("Users:\n");
    $result = GetAllUsers();

    foreach($result as $row){
        printf(
            '<li>%s %s, %s, %s</li>',
            htmlspecialchars($row['first_name'], ENT_QUOTES),
            htmlspecialchars($row['last_name'], ENT_QUOTES),
            htmlspecialchars($row['email'], ENT_QUOTES),
            htmlspecialchars($row['phone_number'], ENT_QUOTES)
        );
    }

?>

<form method="post" action="Export.php">
    <input type="submit" name="export_excel" value="Export to Excel">
</form>