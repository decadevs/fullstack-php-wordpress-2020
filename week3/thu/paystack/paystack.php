<?php

class Paystack {
  private $secreteKey;

  function __construct($secreteKey) {
    $this->secreteKey = $secreteKey;
  }

    function createCustomer($fields) {

        $url = "https://api.paystack.co/customer";
    
        $fields_string = http_build_query($fields);
        
        //open connection
        $ch = curl_init();
        
        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: Bearer " . "$this->secreteKey",
        "Cache-Control: no-cache",
        ));
        
        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
        
        //execute post
        $result = curl_exec($ch);
        return $result;
    }

    function listCustomers() {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.paystack.co/customer",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
           "Authorization: Bearer " . "$this->secreteKey",
           "Cache-Control: no-cache",
          ),
        ));
  
        $response = curl_exec($curl);
        $err = curl_error($curl);
      
        curl_close($curl);
      
        if ($err) {
           echo "cURL Error #:" . $err;
        } else {
          return $response;
        }
    }
}

$paystack = new Paystack("sk_test_9081ce3c5ade85d7e9fb685a121eb6f64bba1d06");
$paystack->createCustomer([
  'email' => "",
  'first_name' => "",
  'last_name' => "",
  'phone' => ""
  ]);

$customers = $paystack->listCustomers();
echo $customers;