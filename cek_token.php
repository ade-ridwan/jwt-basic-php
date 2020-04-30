<?php
require 'helper/jwt_helper.php';
$jwthelper = new JwtHelper;
header('Content-Type: application/json');

if(isset(apache_request_headers()["Authorization"])){
	$headers = apache_request_headers();
	$jwt = $headers['Authorization'];

	$payload = $jwthelper->decoded_jwt($jwt);
	echo json_encode($payload);
	
}else{
	http_response_code(401);
	$error = [
		"message" => "Authorization Requested !",
		"code" => http_response_code()
	];
	echo json_encode($error);
}
	
