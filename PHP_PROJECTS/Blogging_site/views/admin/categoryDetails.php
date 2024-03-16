<?php 
session_start();

if(isset($_SESSION['user_id']) && $_SESSION['role'] == 'admin'){

    require_once('../../database/connection.php');

}
else{
    session_unset();
    session_destroy();
    header('location: ../common/logout.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../../public/css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    
    <style>
        table{
            padding :1rem;
        }
        td , th{
            padding:10px;
            text-align: left;
        }
        .updateuserbtn a{
            text-decoration: none;
            color:white;
        }
        .deleteuserbtn a {
            text-decoration: none;
            color:white;
        }
    </style>
</head>
<body>
    <!-- navbar file -->
    <?php require_once('adminnavbar.php') ?>
    
    <main>

        <div>
            <span><strong style="font-size:x-large;">ALL Category Details</strong></span>
        </div>
        <div >
            <table class='container'>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>created_at</th>
                    <th>updated_at</th>
                    <th>deleted_at</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                <?php 
                    $sql = "SELECT *  FROM category ";
                    $result = mysqli_query($conn , $sql);
                    $userDataArray = mysqli_fetch_all($result , MYSQLI_ASSOC);
                    
                    foreach($userDataArray as $key => $values){
                        echo "<tr> 
                                    <td>{$values['id']}</td>
                                    <td>{$values['Title']}</td>
                                    <td>{$values['image']}</td>
                                    <td>{$values['created_at']}</td>
                                    <td>{$values['updated_at']}</td>
                                    <td>{$values['deleted_at']}</td>
                                    <td><button class='updateuserbtn btn btn-primary'><a href='Editcategorydetails.php?category_id={$values['id']}' >Update</a></button></td>";
                                    if(empty($values['deleted_at'])){
                                        echo "<td><button class='deleteuserbtn btn btn-danger'><a href='deletecategory.php?category_id={$values['id']}' >Delete</a></button></td>";   
                                    }
                                echo "</tr>";
                    }
                ?>    
            </table>
        </div>

    </main>
</body>
</html>

<!-- <?php print_r($_SESSION) ?> -->
