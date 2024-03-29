<?php
    require_once('../../Class/Connection.php');
    require_once('../../Class/Story.php');

    $story = new Story();
    $obj = json_encode($story->totalCountInRange($_GET['startrange'] , $_GET['endrange']));

    echo($obj);
?>