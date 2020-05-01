<?php
require('helper/jwt_helper.php');
include 'account.php';

//Inisialisasi class JwtHelper
$jwthelper = new JwtHelper;

//Menambahkan header type json
header('Content-Type: application/json');

// Cek jika header request berisi Authorization
if (isset(apache_request_headers()["Authorization"])) {
	$headers = apache_request_headers();
	$jwt = $headers['Authorization'];

	$payload = $jwthelper->decoded_jwt($jwt);
	echo json_encode($payload);
	
} else {
	// Jika tidak ada maka munculkan pesan berikut
	http_response_code(401);
	$error = [
		"message" => "Authorization Requested !",
		"code" => http_response_code()
	];
	echo json_encode($error);
}
