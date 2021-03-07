<?php

function get_csvdata($payload){
        
        return call($payload);
}
 function call($payload)
    {
        print_object($payload);
     global $CFG;
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'http://localhost/moodle39/webservice/rest/server.php',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => $payload));
        
        $response = curl_exec($curl);
        curl_close($curl);
        return parseResponse(json_decode($response, true));
    }
    function parseResponse($response)
    {
        if(is_array($response)) {
            if(!empty($response['exception'])) {
                if($response['message'] == "Access control exception") {
                    return array(
                        "success" => false,
                        "message" => 'The function has not been added to the webservice on Moodle',
                        "short" => "function_not_added"
                    );
                } else {
                    return array(
                        "success" => false,
                        "message" => $response['message'],
                        "short" => "generic_error"
                    );
                }
            } else {
                return array(
                    "success" => true,
                    "response" => $response
                );
            }
        } else {
            return array(
                "success" => false,
                "message" => "Response was not an array",
                "short" => "not_array"
            );
        }
    }
