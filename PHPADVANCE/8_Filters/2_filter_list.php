<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <table>
        <tr>
            <td>Filter ID</td>
            <td>FIlter Name</td>
        </tr>
        <?php 
            foreach(filter_list() as $id => $name)
                echo
                    "<tr>
                        <td>$id</td>
                        <td>$name</td>
                    </tr>" ; 
        ?>
    </table>
    
</body>
</html>