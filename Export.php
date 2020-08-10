<?php

    $connect = mysqli_connect("localhost", "root", "", "library");
    $output = '';

    if(isset($_POST['export_excel'])){
        $query = "SELECT * FROM books";
        $result = mysqli_query($connect, $query);

        if(mysqli_num_rows($result) > 0){
            $output .= '
                <table bordered="1">
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Publishing house</th>
                        <th>User id</th>
                    </tr>
            ';

            while($row = mysqli_fetch_array($result)){
                $output .= '
                    <tr>
                        <td>'.$row["id"].'</td>
                        <td>'.$row['title'].'</td>
                        <td>'.$row['author'].'</td>
                        <td>'.$row['publishing_house'].'</td>
                        <td>'.$row['user_id'].'</td>
                    </tr>
                ';
            }
            $output .='</table>';
            header("Content-Type: application/xls");
            header("Content-Disposition: attachment; filename=books.xls");
        }
    }
    echo $output;
?>