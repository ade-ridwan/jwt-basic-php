<?php
require('helper/jwt_helper.php');
include 'account.php';

//menginisialisasi object class JwtHelper
$jwthelper = new JwtHelper;

// Cek jika body berisikan email dan password yang sama saat token di generate.
if ($body->email == $email and $body->password == $password) {

    // Jika berhasil, kemudian membuat payload yang digunakan untuk menghasilkan 
    // token. terdiri dari email, password, dan expire_date untuk menentukan masa
    // berlaku token yakni 3 hari.

    $expire_date = date('Y-m-d', strtotime(' + 3 days'));
    $payload = [
        'email' => $email,
        'password' => $password,
        'expire_date' => $expire_date
    ];

    //menampilkan token yg sudah dibuat;    
    http_response_code(200);
    $success = [
        "message" => "Success",
        "code" => http_response_code(),
        "token" => $jwthelper->generate_jwt($payload)
    ];
    echo json_encode($success);
} else {
    // Jika tidak ada maka munculkan pesan berikut
    http_response_code(401);
    $error = [
        "message" => "Wrong email & password !",
        "code" => http_response_code()
    ];
    echo json_encode($error);
}
