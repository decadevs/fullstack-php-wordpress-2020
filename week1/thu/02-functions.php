<?php 
    // function greeting(){
    //     echo "Welcome to Programming\n";
    // }
    // greeting();
    // greeting();
    // greeting();
    // greeting();
    // greeting();

    function add(int $a, int $b):int {
        return $a + $b;
    }
    $sum = add(2,5);
    echo "\n";
    echo $sum;
    echo "\n";

    function multiplier(float $a, float $b): float {
        return $a * $b;
    }

    var_dump(multiplier(2,3));
    echo "\n";

    $data = [1,2,3,4,5];
    $data2 =  array_map(function(int $item){
        return $item * 2;
    },$data);
    print_r($data2);
    echo "\n";

    function aj_array_map(callable $callback, array $items){
        $output = [];
        foreach ($items as $item) {
            $output[] = $callback($item);
        }
        return $output;
    }

    $square = function($item){
        return $item * 2;
    };

    $data3 = aj_array_map($square, $data);
    
    print_r($data3);
    echo "manual\n";
    
    // $data4 = aj_array_map($data3, $data);
    
    // print_r($data4);
    // echo "\n";

    function add2(int ...$data){
        $sum = 0;
        foreach($data as $detail)
            $sum += $n;
        return $sum;
    }

    var_dump(add2(1,2,3,4,5));