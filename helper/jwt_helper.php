<?php
require('vendor/autoload.php');
use \Firebase\JWT\JWT;

class JwtHelper {
	//key ini bukan patokan dan kalian bebas menggantinya
	public 	$key = "0753370551417f2d7b72acb6c260d39d83741d36fd4ab01e4f82a3235e43aa63";
	
	//function untuk membuat token
	public function generate_jwt($payload){	
		$jwt = JWT::encode($payload, $this->key);
		return $jwt;
	}
	
	//function untuk menerjemahkan token dan mengambil data yg kita kirim pada payload
	public function decoded_jwt($jwt){
		try{
			//jika token sesuai akan mengembalikan pesan berikut
			//JWT::$leeway = 60;
			$decoded = JWT::decode($jwt, $this->key, array('HS256'));
			$decoded->code = http_response_code();
			return $decoded;
		}
		catch (Exception $ex){
			//jika token tidak sesuai maka akan mengembalikan pesan berikut
			http_response_code(401);
			$decoded = [
				"message" => $ex->getMessage(),
				"code" =>  http_response_code()
			];
			return $decoded;
		}
		
	}
}
?>
