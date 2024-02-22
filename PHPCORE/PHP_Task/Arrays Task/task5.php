<?php 
//Q5. Given the associative array $orderDetails = ["Order1" => ["Product" => "Laptop", "Quantity" => 2, "Price" => 1200], "Order2" => ["Product" => "Smartphone", "Quantity" => 3, "Price" => 800], "Order3" => ["Product" => "Tablet", "Quantity" => 1, "Price" => 500]], calculate the total cost of each order (Quantity \* Price), and then find the order with the highest total cost.

$orderDetails = [
    "Order1" => ["Product" => "Laptop" , "Quantity" => 2 , "Price" => 1200],
    "Order2" => ["Product" => "Smartphone" , "Quantity" => 3 , "Price" => 800],
    "Order3" => ["Product" => "Tablet" , "Quantity" => 1 , "Price" => 500]
];

$resultarray = [];
foreach($orderDetails as $key=>$values){

    $totalcost = 1;
    foreach($values as $k => $v){
        if($k == "Product")
            continue;
        else
            $totalcost *= $v;
        
    }
    $resultarray[$key] = $totalcost;
}

arsort($resultarray);

$highest = PHP_INT_MIN ;

foreach($resultarray as $key => $value){

    if($value>=$highest){
        echo("Order name : $key have highest cost : $value<br>\n");
        $highest = $value;
    }
}

echo "<BR>\n";

//METHOD 2 : 

$orderDetails = [
    "Order1" => ["Product" => "Laptop" , "Quantity" => 2 , "Price" => 1200],
    "Order2" => ["Product" => "Smartphone" , "Quantity" => 3 , "Price" => 800],
    "Order3" => ["Product" => "Tablet" , "Quantity" => 1 , "Price" => 500]
];

foreach($orderDetails as $key => $values){

    $values = array_slice($values , 1 );
    $totalcost =  array_product($values);
    $orderDetails[$key]["totalcost"] = $totalcost ;

}

uasort($orderDetails,"sortfunction");

$totalcost = PHP_INT_MIN  ;

foreach($orderDetails as $key => $values){
        if($values["totalcost"] >= $totalcost){
            $totalcost = $values["totalcost"];
            echo("order : $key and totalcost : $totalcost" . "<Br>\n");
        }
}
 

function sortfunction($value1 , $value2){
    return $value1["totalcost"] < $value2["totalcost"] ? 1 : -1 ;
}

?>