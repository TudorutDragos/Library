<?php

    require 'Functions.php';
    
    session_start();
    
    $result = GetBooksByUserId($_SESSION['id']);
    
    printf("Books:\n");
    foreach($result as $row){
        printf(
            '<li>%s by %s (%s)</li>',
            htmlspecialchars($row['title'], ENT_QUOTES),
            htmlspecialchars($row['author'], ENT_QUOTES),
            htmlspecialchars($row['publishing_house'], ENT_QUOTES)
        );
    }

?>

<form method="post" action="Export.php">
    <input type="submit" name="export_excel" value="Export to Excel">
</form>