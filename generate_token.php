<?php
require('helper/jwt_helper.php');

//menginisialisasi object class JwtHelper
$jwthelper = new JwtHelper;

//insialisasi batas waktu token
$issuedAt   = time(); //waktu token dibuat
$notBefore  = $issuedAt + 10;  // token akan valid setelah 10 second di generate.
$expire     = $notBefore + 60; // 60 detik merupakan waktu masa berlaku nya token dalam satuan.

//data yang akan dikirim melalui header 
//bisa di sesuaikan dengan data yang sobat butuhkan.
//silakan uncomment exp pada isi array $payload untuk menggunakan batas waktu pada token.
$payload = [
"iat" => $issuedAt, 
"nbf" => $notBefore,
// "exp"  => $expire,
"data" => 
	[
		"id_user" => "1",
		"email" => "sukun024@gmail.com",
	],
];

//menampilkan token yg sudah dibuat;
echo $jwthelper->generate_jwt($payload);
?>
