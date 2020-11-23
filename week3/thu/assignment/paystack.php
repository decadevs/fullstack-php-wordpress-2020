<?php



trait ValidateInput{
    
    public function validate($email, $first_name, $last_name){
        $last_name = filter_var($last_name, FILTER_SANITIZE_STRING);
        $first_name = filter_var($first_name, FILTER_SANITIZE_STRING);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $fields=["email"=>$email,"first_name"=>$first_name,"last_name"=>$last_name];
        
        return $fields;
    }
 }


class Paystack{
    use ValidateInput;
    private $key;
    public $url = "https://api.paystack.co/customer";

    public function __construct($key){
        $this->key = $key;
    
    }
    public function create_customer($email, $first_name, $last_name){
        $fields=$this->validate($email, $first_name, $last_name);
        $fields_string = http_build_query($fields);
  
        $curl = curl_init();
  
 
        curl_setopt($curl,CURLOPT_URL, $this->url);
        curl_setopt($curl,CURLOPT_POST, true);
        curl_setopt($curl,CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer ".$this->key,
            "Cache-Control: no-cache",
        ]);
        
        curl_setopt($curl,CURLOPT_RETURNTRANSFER, true); 
    
    
        $result = curl_exec($curl);
        return $customer;

    }
    public function list_customers(){
        $curl = curl_init();
  
        curl_setopt_array($curl, [
        CURLOPT_URL => $this->url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "Authorization: Bearer ".$this->key,
            "Cache-Control: no-cache",
        ],
        ]);
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }

    }

    public function list_customers_page($perpage=1, $page=1){
        $curl = curl_init();
  
        curl_setopt_array($curl, [
        CURLOPT_URL => $this->url."?perPage=".$perpage."&page=".$page,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "Authorization: Bearer ".$this->key,
        "Cache-Control: no-cache",
        ],
        ]);
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }

    }
}

