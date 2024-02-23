<?php 
//instanceof keyword is used to check if an object belongs to a specific class or not;

//Example 1 of instanceof 

class Employee{
    public $name , $age , $designation , $salary ;

    public function set_details(...$details){
        $this->name = $details[0] ;
        $this->age = $details[1] ;
        $this->designation = $details[2] ;
        $this->salary = $details[3] ; 
    }

    public function get_details(){
        echo "Name : $this->name <br>Age : $this->age<br>Designation : $this->designation<br>Salary : $this->salary<hr>" ;
    }
}

$aman = new Employee();
$jay = new Employee();
$sam = new Employee();
$utkarsh = new Employee();

$aman->set_details("Aman" , 45 , "Android Developer" , 140000);
$jay->set_details("Jay" , 34 , "React Native Developer" , 120000);
$sam->set_details("Sam" , 33 , "PHP Developer" , 150000);
$utkarsh->set_details("Utkarsh" , 22 , "Java Developer" , 100000);

if($aman instanceof Employee)
    $aman->get_details();

if($jay instanceof Employee)
    $jay->get_details();

if($sam instanceof Employee)
    $sam->get_details();

if($utkarsh instanceof Employee)
    $utkarsh->get_details();

$hariom = 0 ; 

if($hariom instanceof Employee)
    $utkarsh->get_details();
else{
    echo '$hariom is not a instance of Employee <hr>' ;
}
?>