<?php 

echo "<pre>";

require_once('Student.php') ;
require_once('Teacher.php') ;

require_once('../DataRetrieving/StudentMarkRecords.php');
require_once('../DataRetrieving/StudentRecords.php');

//Teacher object

$teacher = new Teacher();

//inserting records

$teacher->addRecords(102 , "ROHIT KIRAR" , 12345678 );
$teacher->addRecords(103 , "ROHIT KIRAR" , 12345678);

$teacher->addMarks(102 , ["physics"=>"90" ,"chemistry"=>"80" ,"Maths"=>"70" ]);

$teacher->addMarks(103 , ["physics"=>"10" ,"chemistry"=>"88" ,"Maths"=>"16" ]);

// to get all records exist
echo "<BR> serach All Record Available : <BR> ";
$teacher->getRecordAll(); 

echo "<hr>" ;
// to get record by student id;
echo "<BR> serach Record by Id : <BR> ";
$teacher->getRecordById(102); 

echo "<hr>" ;
// to get all marks records exist
echo "<BR>search All marks Record Available : <BR> ";
$teacher->getMarksAll(); 

echo "<hr>" ;
// to get marks record by student id;
echo "<BR>search  mark Record by Id : <BR> ";
$teacher->getMarkById(102); 

$teacher->saveRecords();

$teacher->saveMarks();
echo "<hr>" ;

//Student Object

$student = new Student();

echo "<br>Student Result :<BR>";
print_r($student -> getResult(102)) ; 

print_r($StudentMarkRecords) ;   

echo "</pre>" ;


?>