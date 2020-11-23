<?php

    require 'settings.php';

    $customer = new Paystack(KEY);
    try{
        //Create user
        $customer->createCustomer("Lewis", "Obi", "lewis@gmail.com", "0807934");
    }
    catch(Exception $e){
       echo $e->getMessage();
    }

    if($customer->isOk()){echo 'Customer created successfully' . PHP_EOL;}
    else{echo 'Fail to create customer' . PHP_EOL;}

   $customerList = $customer->getCustomers(5,2);
   
   foreach($customerList as $index => $myCustomer){
       $index++;
      echo $index.' '.$myCustomer->getFirstName().' '.$myCustomer->getLastName().' '.$myCustomer->getEmail().' '. $myCustomer->getPhone().PHP_EOL;
   }

    class Paystack{
        protected $secret;
        protected $lastName;
        protected $firstName;
        protected $phone;
        protected $email;
        protected $status = false;
        protected $perPage;
        protected $page;

        public function __construct($key){
            $this->secret = $key;
        }

        public function createCustomer($fName, $lName, $email, $phone = ''){
            $this->email = filter_var($email, FILTER_VALIDATE_EMAIL);
            if(!$this->email){
                throw new Exception('Invalid email');
            }
            if(empty($fName) || strlen($fName) < 2){
                throw new Exception('First name invalid');
            }
            if(empty($lName) || strlen($lName) < 2){
                throw new Exception('Last name invalid');
            }
            if(!is_numeric($phone)){$phone = '';}

            $this->firstName = $fName;
            $this->lastName = $lName;
            $this->email = $email;
            $this->phone = $phone;

            $fields = ['first_name' => $this->firstName, 'last_name' => $this->lastName, 'email' => $this->email, 'phone' => $this->phone];

            $result = json_decode(createCustomerFunc($fields, $this->secret, URL), true);
            $this->status = $result["status"];
        }

        public function isOk(){
            return $this->status;
        }

        //getCustomers
        public function getCustomers($perPage, $page) {
            $defaultPerpage = 50;
            $defaultPage = 1;
            if(empty($perPage) || !is_numeric($perPage)){
                $perPage = $defaultPerpage;
            }
            if(empty($page) || !is_numeric($page)){
                $page = $defaultPage;
            }

            $this->perPage = abs(intval($perPage));
            $this->page = abs(intval($page));
            $info = json_decode(getCustomerFunc($this->perPage, $this->page, $this->secret), true);
           $customerInfo = $info["data"];
            for($i = 0; $i < count($customerInfo); $i++){
                $customerInfo[$i] = new RenderCustomer($customerInfo[$i]["first_name"], $customerInfo[$i]["last_name"], $customerInfo[$i]["email"], $customerInfo[$i]["phone"]);
            }
            return $customerInfo;
        }
    }

    class RenderCustomer{
        protected $first_Name;
        protected $last_Name;
        protected $email;
        protected $phone;

        public function __construct($fName, $lName, $email, $phone){
            $this->first_Name = $fName;
            $this->last_Name = $lName;
            $this->email = $email;
            $this->phone = $phone;
        }

        public function getFirstName(){return $this->first_Name;}
        public function getLastName(){return $this->last_Name;}
        public function getEmail(){return $this->email;}
        public function getPhone(){return $this->phone;}
    }
