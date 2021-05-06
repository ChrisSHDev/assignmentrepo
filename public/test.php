<?php
$flowers = array();
echo("The array is empty, as you can see. \n");
print_r($flowers);
echo("Now, we have added the values. \n");
$flowers[] = "Rose";
$flowers[] = "Jasmine";
$flowers[] = "Lili";
$flowers[] = "Hibiscus";
$flowers[] = "Tulip";
var_dump($flowers);