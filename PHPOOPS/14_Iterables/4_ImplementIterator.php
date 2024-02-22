<?php 
//Iterator is an interface that have five abstract method (current() , next() , rewind() , key() , valid() )

//Create an Iterator 

class MyIterator implements Iterator{
    private $items = [] ; 
    private $pointer = 0 ; 
    public function __construct($items){
        //array_values() makes sure that the keys are numbers;
        $this->items = array_values($items);
    }
    
    public function current(){
        return $this->items[$this->pointer];
    }

    public function key(){
        return $this->pointer;
    }

    public function next(){
        $this->pointer++;
    }

    public function rewind(){
        $this->pointer = 0 ;
    }

    public function valid(){
        //count() indicates how many items are in the list
        return $this->pointer < count($this->items);
    }
}
function printIterable(iterable $myIterable){
    foreach($myIterable as $item){
        echo $item;
    }
}

//use the iterator as an iterable;

$iterator = new MyIterator(["a" , "b" , "c"]);

while($iterator->valid()){
    echo $iterator->current() ."<br>";
    $iterator->next();
}

echo "<br>" ;

//second way to print iterator values;

printIterable($iterator);

?>