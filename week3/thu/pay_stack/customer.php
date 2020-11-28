<?php
 // Autoloader
require_once ('./vendor/autoload.php');
// Startup
require_once('httpClient.php');

// dotenv
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
class Customer extends HttpClient { 
  public function __construct($secret_key) {
    //set parent secret_key
    parent::__construct($secret_key);
  }
  
  /**
     * Creates a Customer.
  **/

  public function createCustomer (array $data) {
    try {
      
      if($this->curl($this->endpoint.'customer', "POST", $data)){
                return $data;
            }else {
                throw new Exception("There is an error in connection");
            }
    } catch(Exception $error){
            return $error->getMessage();
        }
  }


    /**
     * Lists the Customers.
    **/

  public function listCustomers(){
        try{
            $result = $this->curl($this->endpoint, "GET", []);
            if($result){
                return $result;
            }else{
                throw new Exception("There is an error in connection");
            }
        }catch(Exception $error){
            return $error->getMessage();
        }
    }
}

  /**
     * Test API's.
  **/
$secret_key = "";
  $tester = new Customer($secret_key);
    $data = [
        "first_name" => "Warami",
        "last_name" => "Eresanara",
        "email" => "waieresanara@outlook.com",
        "phone" => "08170002951",
    ];
/* create customer */
    // print_r( $tester->createCustomer($data));

/* list customers */
    print_r($tester->listCustomers());
