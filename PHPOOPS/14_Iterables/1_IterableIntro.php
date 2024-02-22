<?php 
/**
 What is iterables?
 * Iterable is any value which can we loop through foreach loop.
 * 
 * The iterable pseudo-type was introduced in PHP 7.1, and it can be used as a data type for function arguments and function return values.
 * 
 NOTE : 
 * The iterable keyword can be used as a data type of a function argument or as the return type of a function:
 * All arrays are iterables, so any array can be used as an argument of a function that requires an iterable.
 
 Iterators
 * Any object that implements the Iterator interface can be used as an argument of a function that requires an iterable.
 * An iterator contains a list of items and provides methods to loop through them. It keeps a pointer to one of the elements in the list. Each item in the list should have a key which can be used to find the item.
 * 
 An iterator must have these methods:

 * -> current() - Returns the element that the pointer is currently pointing to. It can be any data type
 * -> key() Returns the key associated with the current element in the list. It can only be an integer, float, boolean or string
 * -> next() Moves the pointer to the next element in the list
 * -> rewind() Moves the pointer to the first element in the list
 * -> valid() If the internal pointer is not pointing to any element (for example, if next() was called at the end of the list), this should return false. It returns true in any other case

 */


?>