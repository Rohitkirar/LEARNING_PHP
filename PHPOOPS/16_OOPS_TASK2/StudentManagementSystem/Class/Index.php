<?php 

require_once('Student.php') ;
require_once('Teacher.php') ;

//global variable
$StudentMarks = [];
$StudentRecords = [] ;

//object
$teacher = new Teacher();
$student = new Student();

startHomePage(1);

function startHomePage($x){
    while($x != 0){
        $user_input = (int)readline(
            "Service :\n".
            "1 -> Teacher Services \n".
            "2-> Student Serives \n".
            "0->exit"
            ) ;
        switch ($user_input){
            case '1' :
                global $teacher;
                $schoolId = readLine("Enter school ID : ");
                $schoolPassword = readLine("Enter school password : ");
                if($teacher->verification($schoolId , $schoolPassword)){
                    startTeacherPage(1);          
                }else{
                    echo "Invalid schoolId / schoolPassword<br>\n";
                }
                break;
            case '2' :
                startStudentPage(2);
                break;
            case '0' :
                $x = 0 ;
                break;
            default :
                echo "Please Choose Correct One!<br>\n";
        }
    }
}
function startTeacherPage($x){
    global $teacher;
      while($x != 0){
        $user_input = (int)readline("Service :\n".
                                    "1 -> Add New Student \n".
                                    "2->Add Marks\n".
                                    "3->See Record by Student Id\n".
                                    "4->See All Students Data\n".
                                    "5->See Mark by student Id\n".
                                    "6->See ALL Students Marks\n".
                                    "0->exit"
                                    ) ;
        switch ($user_input){
            case '1' :
                $studentId = (int)readline("Enter New Student Id :  ");
                if(!preg_match('/^[1-9]{1}\d{2}$/' , $studentId)){
                    echo "Invalid id! Id should be 100 to 999 only<BR>\n";
                    break;
                }
                $studentName = readline("Enter Student name :  ");
                if(!preg_match('/^[a-zA-Z ]{3,10}$/' , $studentName)){
                    echo "Invalid Name!<BR>\n";
                    break;
                }
                $mobile = readline("Enter mobile number :  ");
                if(!preg_match('/^+91\d{10}$/' , $mobile)){
                    echo "Invalid Number! number should start with +91 and of 10 digits<BR>\n";
                    break;
                }
                $teacher->addRecords($studentId , $studentName , $mobile);     
                break;
            case '2' :
                $studentId = (int)readline("Enter Student Id :  ");
                if(!preg_match('/^[1-9]{1}\d{2}$/' , $studentId)){
                    echo "Invalid id! Id should be 100 to 999 only<BR>\n";
                    break;
                }
                $physics = readline("Enter physics marks :  ");
                $chemistry = readline("Enter chemistry marks :  ");
                $maths = readline("Enter maths marks :  ");
                $teacher->addMarks($studentId , ['physics'=>$physics , 'chemistry'=>$chemistry , 'maths'=>$maths]);
                break;
            case '3' :
                $studentId = (int)readline("Enter Student Id :  ");
                $teacher->getRecordById($studentId);     
                break;
            case '4' :
                $teacher->getRecordAll();     
                break;
            case '5' :
                $studentId = (int)readline("Enter Student Id :  ");
                $teacher->getMarkById($studentId);     
                break;
            case '6' :
                $teacher->getMarksAll();     
                break;
            case '0' :
                $x = 0 ;
                break;
            default :
                echo "Please Choose Correct One!<br>\n";
        }
    }
}
function startStudentPage($x){
    global $student;
      while($x != 0){
        $user_input = (int)readline(
            "Service :\n1 -> See Result\n".
            "0->exit"
            ) ;
        switch ($user_input){
            case '1':
                $studentId = (int)readline("Enter Student Id :  ");
                $student->getResult($studentId);           
                break;
            case '0' :
                $x = 0 ;
                break;
            default :
                echo "Please Choose Correct One!<br>\n";
        }
    }
}

?>