<?php

    if(!defined('__INCLUDED__')){die('Bad request');}

    function createCustomerFunc($fields, $secret, $url){

        $fields_string = http_build_query($fields);
        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer " . $secret,
        "Cache-Control: no-cache",
        ));

        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

        //execute post
        $result = curl_exec($ch);
        return $result;

    }

    function getCustomerFunc($perPage, $page, $secretKey){

        $curl = curl_init();
  
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.paystack.co/customer?perPage=".$perPage."&page=".$page,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer " . $secretKey,
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