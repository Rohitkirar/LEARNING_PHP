<?php 
//EXAMPLE 1 CALCULATOR WITH EXCEPTION HANDLING 

$x = (int)readline("Press a number to start or 0 to exit :") ;

while($x){
    try{
        $operand1 = (int)readline("enter number 1 : ");
        $operator = readline("Enter operator [ + , - , / , *, % ] : ");
        $operand2 = (int)readline("enter number 2 : ");

        switch(trim($operator)){
            case '+':
                echo "$operand1 $operator $operand2 = ".$operand1 + $operand2 ."\n" ;
                break;
            case '-':
                echo "$operand1 $operator $operand2 = ".$operand1 - $operand2 ."\n" ;
                break;
            case '*':
                echo "$operand1 $operator $operand2 = ".$operand1 * $operand2 ."\n" ;
                break;
            case '/':
                if($operand2 == 0){
                    throw new Exception("Number is not divisble by 0 \n");
                }
                echo "$operand1 $operator $operand2 = ".$operand1 / $operand2 ."\n" ;
                break;
            case '%':
                echo "$operand1 $operator $operand2 = ".$operand1 % $operand2 ."<BR>" ;
                break;
            default : 
                echo "invalid operator or operands.\n" ; 
        }
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
    finally{
    $x = (int)readline("press a number to continue or 0 to exit : ") ;
    }
}
?>