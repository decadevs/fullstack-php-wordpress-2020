<?php 

/**
 * Functions
 */

 //https://thevaluable.dev/php-7-type-hinting-pitfalls/


 function greeting() {
    echo "Welcome to PHP";
 }

 // calling the function 
 //greeting();


 function add(int $a, int $b): int {

    return $a + $b;

 }


$sum = add('3dsds', 5);
echo $sum;

function multi(float $a, float $b) : float {
    return $a * $b;
}

var_dump(multi(2, 2));

$data = [1,2,3,4];
$data2 = array_map(function($item) {
    return $item * 2;
}, $data);

print_r($data2);


function aj_array_map(callable $callback, array $items) : array {
    $output = [];
    foreach($items as $item) {
        $output[] = $callback($item);
    }

    return $output;

}


$power =  function($item) {
    return $item * $item;
};

$data3 = aj_array_map($power, $data);

print_r($data3);






function add2(int $base, int ...$data) {
    $sum = 0;
    foreach($data as $n)
        $sum += $n;

    return  $base + $sum;

}

var_dump(add2(10,2,3,4,5));