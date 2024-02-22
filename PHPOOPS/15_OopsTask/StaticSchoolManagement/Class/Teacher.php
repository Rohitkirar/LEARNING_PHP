<?php 

require_once "../Traits/addRecords.php";
require_once "../Traits/getRecordAll.php";
require_once "../Traits/getRecordById.php";
require_once "../Traits/saveRecords.php";
require_once "../Traits/addMarks.php";
require_once "../Traits/getMarksAll.php";
require_once "../Traits/getMarkById.php";
require_once "../Traits/saveMarks.php";

class Teacher {

    private $studentRecords =[] , $studentMarks= [];

    use addRecords , getRecordAll , getRecordById , saveRecords , addMarks , getMarksAll , getMarkById , saveMarks;

}

?>