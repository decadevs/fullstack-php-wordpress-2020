<?php

class Paystack
{

    private $secretKey;

    function __construct($sk)
    {
        $this->secretKey = $sk;
    }

    function getSecretKey()
    {
        return $this->secretKey;
    }


    function createCustomer($fields)
    {
        $url = "https://api.paystack.co/customer";
        $fields = [
            'email' => $fields["email"],
            'first_name' => $fields["first_name"],
            'last_name' => $fields["last_name"],
            'phone' => $fields["phone"]
        ];

        if (!filter_var($fields["email"], FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email format");
        }

        if (!preg_match("/^[a-zA-Z-' ]*$/", $fields["first_name"])) {
            throw new Exception("Only letters and white space allowed for first name");
        }

        if (!preg_match("/^[a-zA-Z-' ]*$/", $fields["last_name"])) {
            throw new Exception("Only letters and white space allowed for last name");
        }

        if (!preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{3}$/", $fields["phone"])) {
            throw new Exception("Invalid Phone number");
        }


        $fields_string = http_build_query($fields);
        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer " . $this->getSecretKey(),
            "Cache-Control: no-cache",
        ));

        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //execute post
        $result = curl_exec($ch);
        return $result;
    }



    function getCustomers()
    {

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
                "Authorization: Bearer " . $this->getSecretKey(),
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

$paystack = new Paystack("sk_test_12f4e6e0c711cf17036fba33116151f5c7b751c9");

echo "<pre>";
var_dump($paystack->createCustomer(['first_name' => '..', 'last_name' => 'John', 'phone' => '0939039209', 'email' => 'jchuokaa@example.com']));
echo "</pre>";

echo "<pre>";
var_dump($paystack->getCustomers());
echo "</pre>";
