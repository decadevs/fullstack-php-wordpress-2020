<?php

class Paystack{

    private $endpoint = "https://api.paystack.co/";

    public function __construct(string $secret_key){
        $this->key = $secret_key;
    }

    /**
     * @param string url to access resources
     * @param string "GET" OR "POST" to determine the request to make
     * @return boolean|string false for failure true Or STRING for success
     */
    protected function buildCurl(string $url, string $method,array $data){
        //Open Connection
        $init = curl_init();
        $configs = $this->generate_base_config();
        $configs[CURLOPT_URL] = $url;
        $configs[CURLOPT_CUSTOMREQUEST] = $method;
        if($method === "POST"){
            $configs[CURLOPT_POSTFIELDS] = $data;
        }
        curl_setopt_array($init,$configs);
        $result = curl_exec($init);
        if(!$result) return false;
        curl_close($init);
        return $result;
    }

    /**
     * Create Customer Profile
     * @param array data of customer to create
     * @return string based on success or Failure
     */

    public function createCustomer(array $data):string{
        try{
            
            if(!$this->has_unnecessary_data($data)){
                throw new Exception("Too many Data to create your profile");
            }
            if(!$this->is_data_not_empty($data)){
                throw new Exception("Your data cannot be empty");
            }
            if(!$this->validateEmail($data['email'])){
                throw new Exception("Invalid Email");
            }

            if($this->buildCurl($this->endpoint.'customer', "POST", $data)){
                return "Customer created Successfully";
            }else{
                throw new Exception("There is an error in connection");
            }
            
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * GET LIST OF CUSTOMERS
     * @param int results to display per page
     * @param int page to show
     * @return string data from the api
     */
    public function getCustomers(int $noPerPage=5,int $page=1){
        try{
            $url = $this->endpoint."customer?perPage=$noPerPage&page=$page";
            $result = $this->buildCurl($url, "GET", []);
            if($result){
                return $result;
            }else{
                throw new Exception("There is an error in connection");
            }
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * Check if data passed is too Much
     * @param array data to pass to the API
     * @return boolean false if more than 4 and true otherwise
     */
    protected function has_unnecessary_data(array $data): bool{
        if(count($data)>4){
            return false;
        }
        return true;
    }

    /**
     * Check if data is empty
     * @param array data to send to API
     * @return boolean false if one is empty OR true otherwise
     */
    protected function is_data_not_empty(array $data): bool{
        foreach ($data as $key => $value) {
            if(!$value){
                return false;
            }
        }
        return true;
    }

    /**
     * Check for Valid Email
     * @param string email of customer to create
     * @return boolean false if invalid Or true otherwise 
     */
    protected function validateEmail($email): bool{
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }

    /**
     * Generate A Common Configuration for the CURL
     * @param void
     * @return array configuration values needed
     */
    protected function generate_base_config():array{
        $base_configs = [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_HTTPHEADER => [
              "Authorization: Bearer $this->key",
              "Cache-Control: no-cache"
            ],
        ];
        return $base_configs;
    }

}
    $secret_key = "";
    $paystack = new Paystack($secret_key);

    $data = [
        "first_name" => "Biola",
        "last_name" => "Dapo",
        "email" => "olubayo@gmail.com",
        "phone" => "08071717970",
    ];
    $res = $paystack->createCustomer($data);
    $res = $paystack->getCustomers(3,2);
    var_dump($res);
?>