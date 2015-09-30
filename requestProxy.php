<?php
//Some basic protection against anyone using the proxy (I know the referer can be spoofed)
if (preg_match("/".preg_quote('gigya-cs.com',"/")."/i",$_SERVER['HTTP_REFERER']) === FALSE) {
   die('Invalid referrer.');
}

//Use Gigya's SSL cert for HTTPS requests
$cafile = realpath('../../cacert.pem');

//Construct the Gigya endpoint
$tokens =  explode(".",$_POST['apiMethod']);
$namespace = $tokens[0];
$apiURL = 'https://' . $namespace . '.' . $_POST['dataCenter'] . '.gigya.com/' . $_POST['apiMethod'];

//Remove the values from what will be sent to Gigya
unset($_POST['dataCenter']);
unset($_POST['apiMethod']);

//Check to see if libcurl is installed			
if (!function_exists('curl_init')){
	die("Sending this request requires PHP to be compiled with libcurl.");
}

//Now send the request using the data that was posted to us
$ch = curl_init();
$defaults = array(
			CURLOPT_URL => $apiURL,
			CURLOPT_POST=>1,
			CURLOPT_HEADER => 1,
			CURLOPT_POSTFIELDS=> $_POST,
			CURLOPT_HTTPHEADER => array( 'Expect:'),
			CURLOPT_RETURNTRANSFER => TRUE,
			CURLOPT_SSL_VERIFYPEER => TRUE, 
			CURLOPT_SSL_VERIFYHOST => 2,
			CURLOPT_CAINFO => $cafile,
			CURLOPT_HEADER => false,
		);
		
$ch = curl_init();
curl_setopt_array($ch, $defaults);
$response = curl_exec($ch);
curl_close($ch);
echo $response;
?>
