<?php
namespace maths;


Class Subtract{
    public $subtract;
    
    public function subtraction(array $num){
        $this->subtract =$num[0];
        for ($i = 1; $i < count($num); $i++) {
            $this->subtract -= $num[$i];
        }
        print_r($this->subtract);
        return $this->subtract;        
    }
}
