<?php
require('helper/jwt_helper.php');
include 'account.php';

header('Content-Type: application/json');

//menginisialisasi object class JwtHelper
$jwthelper = new JwtHelper;


// Mendapatkan dan menginisialisasi body yang dikirimkan
//bisa di sesuaikan dengan data yang sobat butuhkan.
$body = json_decode(file_get_contents("php://input"));

// Cek jika body berisikan email dan password yang sama saat token di generate.
if ($body->email == $email and $body->password == $password) {
	
	//data yang akan dikirim melalui header 
	//bisa di sesuaikan dengan data yang sobat butuhkan.
	$payload = [
		"id_user" => "1",
		"email" => $email,
	];

	//menampilkan token yg sudah dibuat;
	/*
	pada function generate_jwt($param1,$param2)
	$param1 berisi data payload
	$param2 berisi waktu yang ditentukan dalam second (sobat bisa kosongkan param2 jika ingin tidak menggunakan waktu) *
	 */
	http_response_code(200);
    $success = [
        "message" => "Success",
        "code" => http_response_code(),
        "token" => $jwthelper->generate_jwt($payload,60)
    ];
    echo json_encode($success);
}
else{
	// Jika tidak ada maka munculkan pesan berikut
    http_response_code(401);
    $error = [
        "message" => "Wrong email & password !",
        "code" => http_response_code(),
    ];
    echo json_encode($error);
}
?>