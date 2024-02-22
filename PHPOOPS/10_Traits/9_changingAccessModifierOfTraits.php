<?php 
// with the "as" keyword we can change the visibilty of function or properties fo trait also;
//Example 
trait HelloWorld{
    function sayHello(){
        echo "Hello World!<br>" ;
    }
}

class Main1{
    use HelloWorld{
        sayHello as protected;
    }
    function printdetails(){
        $this->sayHello();
    }
    use HelloWorld{
        sayHello as private printHello;
    }

    function printHellodetails(){
        $this->printHello();
    }
}
$main1 = new Main1();

// $main1->sayHello(); //error : protected method cannot we access
$main1->printdetails();

// $main1->printHello(); //error :  privateMethod cannot we access
$main1->printHellodetails();
?>