<?php

    require_once('../../Class/Connection.php');
    require_once('../../Class/Story.php');

    $story = new Story();

    if(isset($_POST['startrange']) && isset($_POST['endrange']))
        $countArray = $story->totalCountInRange($_POST['startrange'] , $_POST['endrange']);

    echo json_encode($countArray);
?>

