<?php
require('helper/jwt_helper.php');

//menginisialisasi object class JwtHelper
$jwthelper = new JwtHelper;

//data yang akan dikirim melalui header
$payload = [
"id_user" => "1",
"email" => "sukun024@gmail.com"
];

//menampilkan token yg sudah dibuat;
echo $jwthelper->generate_jwt($payload);
?>
