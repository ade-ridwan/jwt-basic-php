<?php
require 'helper/jwt_helper.php';

//data yang akan dikirim melalui header
$payload = [
"id_user" => "1",
"email" => "sukun024@gmail.com"
];

$jwthelper = new JwtHelper;

//menampilkan token yg sudah dibuat;
echo $jwthelper->generate_jwt($payload);
?>
