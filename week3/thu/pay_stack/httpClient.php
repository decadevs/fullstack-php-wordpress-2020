<?php

class HttpClient {
  protected $endpoint = 'https://api.paystack.co/customer';
  protected $secret_key;
  public function __construct($secret_key) {
    //set parent secret_key
    $this->secret_key = $secret_key;
  }

//   protected function curlPost ($url, $use_post, $post_data=[], $use_custom=FALSE, $custom_type=''){
//     $curl = curl_init();

//     $headers = [
//             "Authorization: Bearer {$this->secret_key}",
//             'Content-Type: application/json'
//         ];
        
//         curl_setopt($curl, CURLOPT_URL, $url);
//         curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//         curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        
//         if($use_post){
//             curl_setopt($curl, CURLOPT_POST, TRUE);
//             curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($post_data));
//         }

//         else if($use_custom){
//             curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $custom_type);
//             curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($post_data));
//         }
        
//         curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
//         curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, TRUE);
		
//         $response = curl_exec($curl);
		
//         curl_close($curl);
        
//         return $response;
//   }

//   protected function curlList (){
//       $curl = curl_init();
//       $url = $this->endpoint;
  
//     curl_setopt_array($curl, array(
//         CURLOPT_URL => $url,
//         CURLOPT_RETURNTRANSFER => true,
//         CURLOPT_ENCODING => "",
//         CURLOPT_MAXREDIRS => 10,
//         CURLOPT_TIMEOUT => 30,
//         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//         CURLOPT_CUSTOMREQUEST => "GET",
//         CURLOPT_HTTPHEADER => array(
//         "Authorization: Bearer ". $this->secret_key,
//         "Cache-Control: no-cache",
//         ),
//     ));

//     $response = curl_exec($curl);
//     $err = curl_error($curl);
//     curl_close($curl);

//       if ($err) {
//         echo "cURL Error #:" . $err;
//     } else {
//         echo $response;
//     }
//   }

//    protected function redirect($url){
//         header("Location: {$url}");
//     }

    /**
     * @param string url to access resources
     * @param string "GET" OR "POST" to determine the request to make
     * @return boolean|string false for failure true Or STRING for success
     */
    protected function curl(string $url, string $method, array $data){
        //Open Connection
        $init = curl_init();
        $configs = $this->generate_base_config();
        $configs[CURLOPT_URL] = $this->endpoint;
        $configs[CURLOPT_CUSTOMREQUEST] = $method;
        if($method === "POST"){
            $configs[CURLOPT_POSTFIELDS] = $data;
        } else if ($method === "GET") {
            $configs[CURLOPT_CUSTOMREQUEST];
        }
        curl_setopt_array($init,$configs);
        $result = curl_exec($init);
        if(!$result) return false;
        curl_close($init);
        return $result;
    }


     /**
     * Generate A Common Configuration for the CURL
     * @param void
     * @return array configuration values needed
     */
    protected function generate_base_config():array{
         $curl = curl_init();

        $base_configs = [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
            "Authorization: Bearer {$this->secret_key}",
            "Content-Type: application/json",
            "Cache-Control: no-cache"
            ],
        ];
        // $response = curl_exec($curl);
        //     $err = curl_error($curl);
        //     curl_close($curl);

        //     if ($err) {
        //         echo "cURL Error #:" . $err;
        //     } else {
        //         echo $response;
        //     }
        return $base_configs;
    }

}
    


