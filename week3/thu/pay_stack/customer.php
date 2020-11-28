<?php
require 'setup.php';
class Customer extends Setup {
  private $endpoint = 'https://api.paystack.co/customer';
  public function __construct($secret_key) {
    //set parent secret_key
    $this->secret_key = $secret_key;
  }
  
  /**
     * Creates a Customer.
  **/

  public function createCustomer ($email, $firstName, $lastName, $phone) {
   $url = $this->endpoint;
    if ($email) {
     $response = json_decode($this->curlPost($url, TRUE, [
       'email' => $email,
       'first_name' => $firstName,
       'last_name' => $lastName,
       'phone' => $phone
     ]));

     if($response && $response->status){    
       echo 'Customer Created' . PHP_EOL;          
        //return customer_code and ID
        return [
                'first_name'=>$response->data->first_name,
                'last_name'=>$response->data->last_name,
                'customer_id'=>$response->data->id, 
                'customer_code'=>$response->data->customer_code
               ];
     }
      //api request failed
      return false;
    }
    return false;
  }

    /**
     * Lists the Customers.
    **/

  public function listCustomers () {
     $url = $this->endpoint;
    return $response = json_decode($this->curlList($url, TRUE));
  }
}

  /**
     * Test API's.
  **/
$tester = new Customer('sk_test_be2fb87d138fce446cfc07e109abd880528ebfe4');

/* create customer */
    print_r( $tester->createCustomer('tosan@outlook.com', 'tosan', 'eresanara', '08093057922'));

/* list customers */
    // print_r($tester->listCustomers());
