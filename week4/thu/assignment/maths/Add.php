<?php
namespace maths;


Class Add{

    public $sum;
    public function sum(array $num){
        $this->sum =array_sum($num);
        print_r($this->sum);
        return $this->sum;        
    }
}
