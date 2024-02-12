<?php 
/*
Exceptions : Exception is an object that describes an error and unexcept behaviour of php script;

Exception : An exception is a problem that is caused by the program or the user, such as passing an invalid argument to a method or trying to access a null reference.

Error : An error is a serious problem that is usually caused by the system or the environment, such as running out of memory or a system crash. 

Key point to remember : 
* Exception are thrown by many php function and classes 
* User defined function and classes can also throw exception
* Exception are good way to stop the function when it comes across data that it cannot be use

Throwing an Exception in php 
throw keyword allows  a userdefined function  or method to throw an exception. When the exception is thrown the code following it will not be executed .

If an exception is not caught, a fatal error will occur with an "Uncaught Exception" message.

Methods
When catching an exception, the following table shows some of the methods that can be used to get information about the exception:

Method	Description
getMessage()	Returns a string describing why the exception was thrown
getPrevious()	If this exception was triggered by another one, this method returns the previous exception. If not, then it returns null
getCode()	Returns the exception code
getFile()	Returns the full path of the file in which the exception was thrown
getLine()	Returns the line number of the line of code which threw the exception

Lists of Throwable and Exception tree as of 7.2.0

    Error
      ArithmeticError
        DivisionByZeroError
      AssertionError
      ParseError
      TypeError
        ArgumentCountError
    Exception
      ClosedGeneratorException
      DOMException
      ErrorException
      IntlException
      LogicException
        BadFunctionCallException
          BadMethodCallException
        DomainException
        InvalidArgumentException
        LengthException
        OutOfRangeException
      PharException
      ReflectionException
      RuntimeException
        OutOfBoundsException
        OverflowException
        PDOException
        RangeException
        UnderflowException
        UnexpectedValueException
      SodiumException 
*/
?>