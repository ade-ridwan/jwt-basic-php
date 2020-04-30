<?php
require('vendor/autoload.php');
use \Firebase\JWT\JWT;

class JwtHelper {
	public 	$key = "0753370551417f2d7b72acb6c260d39d83741d36fd4ab01e4f82a3235e43aa63";

	public function generate_jwt($payload){	
		$jwt = JWT::encode($payload, $this->key);
		return $jwt;
	}

	public function decoded_jwt($jwt){
		try{
			$decoded = JWT::decode($jwt, $this->key, array('HS256'));
			$decoded->code = http_response_code();
			return $decoded;
		}
		catch (Exception $ex){
			http_response_code(401);
			$decoded = [
				"message" => "Unauthroizhed",
				"code" =>  http_response_code()
			];
			return $decoded;
		}
		
	}
}
?>