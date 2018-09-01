
<?php
//
// A very simple PHP example that sends a HTTP POST to a remote site
//

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"https://rest.nexmo.com/sms/json");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
            "api_key=f9139db5&api_secret=2tIT2y0zM7H9vdGl&from=12035809403&to=12019147728&text=Hello+world");

// in real life you should use something like:
// curl_setopt($ch, CURLOPT_POSTFIELDS, 
//          http_build_query(array('postvar1' => 'value1')));

// receive server response ...
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec ($ch);
curl_close ($ch);

var_dump($server_output);
// further processing ....
//if ($server_output == "OK") { ... } else { ... }

?>