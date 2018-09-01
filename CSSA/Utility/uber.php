<?php 

$token = "hf01zCLCp7uKFRRwhy4-kGH-T4LQdoJSPcAHoa8X";

$header = array(
    "Authorization: Token $token",
    "Content-Type: application/json",
    "Accept-Language: en_US");

// CALCULATE FAIR
$url = "https://api.uber.com/v1.2/estimates/price?start_latitude=" . $_POST["Xlat"] . "&start_longitude=" . $_POST["Xlng"] . "&end_latitude=" . $_POST["Ylat"] . "&end_longitude=" . $_POST["Ylng"];


$curl    = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
curl_setopt($curl, CURLOPT_USERPWD, $token);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);


$output1 = curl_exec($curl);

//$parsed = array();
//parse_str(curl_exec($curl), $parsed);
//var_dump($parsed);

//echo "<pre>";
//var_dump($output1);
//var_dump(array( "name"=>"John","time"=>"2pm" ) );

//json_decode($output1, true)); 
echo $output1;


//Client ID: QREx_zP7l6D82xZuNtMgXJuOVw1zoSTK
//Secret lkg6cViGIyC-eUYIL7mL0XvhY0E8D9Y7NZlKPYDm
//Token  hf01zCLCp7uKFRRwhy4-kGH-T4LQdoJSPcAHoa8X
?>
