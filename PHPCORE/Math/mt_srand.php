<?php 
/**
 * mt_srand() function seeds the Mersenne Twister random Number generator
 * Syntax  : mt_srand(seed , mode);
 * seed	Optional. Specifies the seed value
 * mode	Optional. Specifies the algorithm to use. Can be one of the following constants:
 * MT_RAND_MT19937 - uses the fixed, correct Mersenne Twister implementation (which is used from PHP 7.1)
 * MT_RAND_PHP - uses the incorrect Mersenne Twister implementation (which was used up to PHP 7.1)
 */
echo(mt_srand(mktime(hour:1)));
echo(mt_rand());

?>