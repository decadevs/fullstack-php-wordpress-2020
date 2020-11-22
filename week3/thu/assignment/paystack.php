<?php

class Paystack{

    private $key;
    private $url = "https://api.paystack.co/customer";

    function __construct(string $key){
        $this->key = $key;
    }


    private function validate(array $data){

      if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
        throw new Exception("please pass a valid email", 1);
        exit;
      }

      if(strlen($data['first_name']) < 3){
        throw new Exception("first_name should have atleast three characters");
      }

      if(strlen($data['last_name']) < 3){
        throw new Exception("last_name should have atleast three characters");
      }

      return true;

    }


    //create a create with this Method
    function createCustomer(array $data){

      if($this->validate($data)){
      
      $curl = curl_init();

      $customer = http_build_query($data);

      curl_setopt($curl,CURLOPT_URL, $this->url);

      curl_setopt($curl,CURLOPT_POST, true);

      curl_setopt($curl,CURLOPT_POSTFIELDS, $customer);

      curl_setopt($curl, CURLOPT_HTTPHEADER, array(

        "Authorization: Bearer " . $this->key . "",

        "Cache-Control: no-cache",

      ));

      // curl_setopt($curl,CURLOPT_RETURNTRANSFER, true); 
      $result = curl_exec($curl);
       
        curl_close($curl);
          return $result;
        
      } 
    
    }

    //return customers
    function getCustomers($perPage = 2, $page = 1){

      $curl = curl_init();

      curl_setopt_array($curl, array(

      CURLOPT_URL => "https://api.paystack.co/customer?perPage=".$perPage."&page=".$page."",

      CURLOPT_RETURNTRANSFER => true,

      CURLOPT_ENCODING => "",

      CURLOPT_MAXREDIRS => 10,

      CURLOPT_TIMEOUT => 30,

      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

      CURLOPT_CUSTOMREQUEST => "GET",

      CURLOPT_HTTPHEADER => array(

        "Authorization: Bearer " . $this->key . "",

        "Cache-Control: no-cache",

      ),

    ));

    $response = curl_exec($curl);

    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      return $err;
    }

    return $response;

    }



            
}


$paystack = new Paystack("sk_test_bbd890b21968393c4418a227a6210e572e721928");

$customer = ['email' => "customer4@example.com", 
             'first_name' => "david",
             'last_name' => "Ngwongwo",
             'phone' => "08065760046",
            
            ];

// $res = $paystack->createCustomer($customer);

$res = $paystack->getCustomers(1,1);

echo $res;



