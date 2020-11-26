<?php
require_once __DIR__."/vendor/autoload.php";

trait ValidateInput{
    public function validateName($name){

        try{
            $pattern = "/^[a-z'-]+$/";
            if (preg_match($pattern, $name) ===0){
                throw new Exception("Invalid name");
            }
            return $name;
        }
        catch(Exception $e){
            echo 'Message: '.$e->getMessage();
        }
     }
        
    public function validateEmail($email){
        try{
            if(filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE){
                throw new Exception("Invalid email");
            }
            return $email;
        }
        catch(Exception $e){
            echo 'Message: '.$e->getMessage() ;
        }
    }
        
     
 }

 trait SanitizeInput{
    
    public function sanitizeName($name){
        return filter_var($name, FILTER_SANITIZE_STRING);
        
    }
    public function sanitizeEmail($email){
        return filter_var($email, FILTER_SANITIZE_EMAIL);
    }
 }
Class Paystack{
    use ValidateInput;
    use sanitizeInput;
    private $key;
    public $httpclient ;
    public $header;
    public $url = "https://api.paystack.co/customer";
    

    public function __construct($key){
        $this->key = $key;
        $this->header = ["Authorization" => "Bearer ".$this->key, "Cache-control"=>"no-cache"];
        $this->client = new \GuzzleHttp\client(['base_uri' => $this->url]);
    
    }
    public function customer($email, $firstName, $lastName){
        $email= $this->sanitizeEmail($this->validateEmail($email));
        $firstName = $this->sanitizeName($this->validateName($firstName));
        $lastName = $this->sanitizeName($this->validateName($lastName));
        return ["email"=>$email,"firstName"=>$firstName,"lastName"=>$lastName];
       
    }
    public function createCustomer($email, $firstName, $lastName){
        try{
            $customer = $this->customer($email, $firstName, $lastName);
        
            $res = $this->client->request("POST", "/customer",["headers"=>$this->header], ["body"=>$customer]);
            return "{$firstName}: Your account has been created";
        }
        catch(\GuzzleHttp\Exception\RequestException $e){
            if ($e->hasResponse()) {
                $response = $e->getResponse();
                return((string) $response->getBody());
            }
    
        }
    }
    public function getCustomer(){
       try{
        $res = $this->client->request("GET", "/customer",["headers"=>$this->header]);
        return json_decode($res->getBody());
       }

       catch(\GuzzleHttp\Exception\RequestException $e){
        if ($e->hasResponse()) {
            $response = $e->getResponse();
            return((string) $response->getBody());
        }

    }
        
    }
    
}

