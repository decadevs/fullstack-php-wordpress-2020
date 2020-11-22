<?php


class Paystack {

    private $SECRET_KEY;
    private $url = "https://api.paystack.co/customer";

    public function __construct($SECRET_KEY) {

        $this->SECRET_KEY = $SECRET_KEY;
    }

    protected function validateEmail($email) {
        
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('Error: Invalid email address');
        }
        return true;
    }

    protected function validateNumber($number) {
        
        if(!filter_var((int)$number, FILTER_VALIDATE_INT)) {
            throw new Exception('Error: Invalid Phone Number');
        }
        return true;
    }

    protected function validateName($name) {
        
        if (!$name && !($name instanceof string )) {
            throw new Exception('Error: Invalid Name Error');
        }
    }

    protected function validateMetadata($metadata) {
        
        if (!$name && !($metadata instanceof object )) {
            throw new Exception('Error: Invalid Metadata Error');
        }
    }

    

    public function createCustomer(array $fields) {
        
        try {
            if (isset($fields['email']) && isset($fields['first_name']) && isset($fields['last_name'])){ 
            
                $this -> validateEmail($fields['email']);
                $this -> validateName($fields['first_name']);
                $this -> validateName($fields['last_name']);
                if (array_key_exists("phone", $fields)) {
                    $this->validateNumber($fields['phone']);
                }
                if (array_key_exists("metadata",$fields)) {
                    $this->validateNumber($fields['phone']);
                }

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
            } else {
                throw new Exception('Error: Incomplete field');
            };

        } catch(Exception $e) {

            // return false;
            return $e->getMessage();
        }
        
        
    }

    public function getCustomers($data='') {
        if ($data !== '') {
            $queryString =  http_build_query($data);
        } else {
            $queryString =  '';
        }
        

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->url . '?' . $queryString,
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

function isOk($result) {
        
    if (substr($result, 0, 4) === 'Error'){
        return false;
    } else {
        return true;
    }
}



    $paystack = new Paystack('sk_test_e6993f24cc41a4a9aa6c375ab3c3f52df0db31c2');

    $res =   $paystack->createCustomer([
            'email' => "mula@email.com",
            'first_name'=>'lovette',
            'last_name' => 'doe',
            'phone' => '08177655339'
          ]);


    if(isOk($res)) {
        echo "Customer created" . PHP_EOL;
    } else {
        echo $res;
    }

    $customers = $paystack->getCustomers(['hater'=>'vivi']);

    if(isOk($customers)) {
        echo $customers. PHP_EOL;
        echo "Customers retrieved" . PHP_EOL;
    } else {
        echo $customers;
    }






