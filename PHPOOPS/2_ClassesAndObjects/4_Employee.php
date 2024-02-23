<?php 
//Example Employee class to save Data
class Employee{
    public $id , $name , $age , $designation , $salary ;

    function __construct(...$details){
        $this->id = $details[0];
        $this->name = $details[1] ;
        $this->age = $details[2] ;
        $this->designation = $details[3] ;
        $this->salary = $details[4] ; 
    }

    public function get_details(){
        echo "Id : $this->id<br>
             Name : $this->name <br>
             Age : $this->age<br>
             Designation : $this->designation<br>
             Salary : $this->salary<hr>" ;
        
        return [$this->id , $this->name , $this->age, $this->designation , $this->salary] ;
    }

}

$aman = new Employee(101, "Aman" , 45 , "Android Developer" , 140000);
$jay = new Employee(102 , "Jay" , 34 , "React Native Developer" , 120000);
$sam = new Employee(103 , "Sam" , 33 , "PHP Developer" , 150000);
$utkarsh = new Employee(104 , "Utkarsh" , 22 , "Java Developer" , 100000);

$employeeDetails = []  ;

array_push($employeeDetails , $aman->get_details() );
array_push($employeeDetails , $jay->get_details() );
array_push($employeeDetails , $sam->get_details() );
array_push($employeeDetails , $utkarsh->get_details() );

echo "<pre>";
print_r($employeeDetails);
echo "</pre>";

?>