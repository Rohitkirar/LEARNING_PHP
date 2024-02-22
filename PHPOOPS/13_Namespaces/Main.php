<?php 
namespace Namespaces;

class Main{
    public $title = "" ;
    public $numRows = 0 ;
    public function message(){
        echo "<p>Table '{$this->title}' has {$this->numRows} rows.</p>" ;
    }
}
$table = new Main();
$table->title = "My Table";
$table->numRows = 5;

$table->message();

function greet(){
    echo "Hello, how are you all?<br>";
}

$name = "ROHIT KIRAR";
?>