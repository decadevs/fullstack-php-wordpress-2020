<?php
include('validate.php');


class Paystack
{
    private $SECRET_KEY;

    private $url = "https://api.paystack.co/customer";
    
    public function __construct($SECRET_KEY)
    {
        $this->SECRET_KEY = $SECRET_KEY;
    }


    public function createCustomer(array $fields)
    {
        
        try
        {
            // check if any key is empty
            Validate::isNotEmpty($fields);
            //check if valid email entered
            Validate::isEmail($fields['email']);
            //check name is string
            Validate::isString($fields['first_name']);
            Validate::isString($fields['last_name']);
            //check if number is valid
            Validate::isNumber($fields['phone']);
            
            $fields_string = http_build_query($fields);
            //open connection
            $ch = curl_init();
            
            //set the url, number of POST vars, POST data
            curl_setopt($ch,CURLOPT_URL, $this->url);
            curl_setopt($ch,CURLOPT_POST, true);
            curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "Authorization: Bearer " . $this->SECRET_KEY,
                "Cache-Control: no-cache",
            ));
            
            //So that curl_exec returns the contents of the cURL; rather than echoing it
            curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
            
            //execute post
            $result = curl_exec($ch);
            return $result;
           
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }
       
        
    }

    public function getCustomers()
    {
        $curl = curl_init();
  
        curl_setopt_array($curl, array(
          CURLOPT_URL => $this->url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer ". $this->SECRET_KEY,
            "Cache-Control: no-cache",
          ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        
        if ($err) {
          return "Error #:" . $err;
        } else {
          return $response;
        }
    }
}

$paystack = new Paystack('sk_test_5a0fe62395cc614026f4df82eadfa5a76dda7c3b');

    /* echo $paystack->createCustomer([
        'email' => "chidi@gmail.com",
        'first_name'=>'Chidi',
        'last_name' => 'Michael',
        'phone' => '08162292349'
      ]); */
     
    //echo $paystack->getCustomers();