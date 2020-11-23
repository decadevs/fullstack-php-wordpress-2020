<?php 

trait Helper {

    public function getInitials() {
        return 'AJ';
    }

}
class Person{

    protected $type;
    protected $name;

    use Helper;

    private $__VERSION  = '0.1';

    public function __construct(string $name, string $type) {
        $this->type = $type;
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }
}

class Teacher extends Person{

    protected $school;
    protected $name;

    public function __construct(string $name) {
        parent::__construct($name, 'teacher');
        $this->school = 'St. Mary';
    }

    public function getName() {
        return strtoupper($this->name);
    }
}

$joe = new Teacher('Abah Joseph');
var_dump($joe->getInitials());

/**
 * public  - all full access
 * protected - only for extention & inside the class
 * private - only inside the class
 */

 /**
  * Static methods
   * Class constants
   * Interface
   * Abstract class
  */


$paystack = new Paystack('private');

 $res =   $paystack->createCustomer(['name' => 'Joe']);

 if($res->isOk()) {
     echo "Customer created";
 }

 $customers = $paystack->getCustomers();