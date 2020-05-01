<?php
require('vendor/autoload.php');
use \Firebase\JWT\JWT;

class JwtHelper {
	//key ini bukan patokan dan kalian bebas menggantinya
	public $key = "0753370551417f2d7b72acb6c260d39d83741d36fd4ab01e4f82a3235e43aa63";
	
	//insialisasi batas waktu token
	public $notBefore  = 10; 
	
	//function untuk membuat token
	public function generate_jwt($data,$expired = 0){
		$issuedAt   = time(); //waktu token dibuat
		$payload["iat"] = $issuedAt; 
		$payload["nbf"] = $issuedAt + $this->notBefore; //jarak waktu token valid setelah di generate.
		
		//jika waktu expired di isi maka tambahkan $payload["exp"];
		if($expired !== 0){
			$payload["exp"] = ($issuedAt + $this->notBefore) + $expired; //berisi waktu expired
		}

		$payload["data"] = $data;
		$jwt = JWT::encode($payload, $this->key);
		return $jwt;
	}
	
	//function untuk menerjemahkan token dan mengambil data yg kita kirim pada payload
	public function decoded_jwt($jwt){
		try{
			//jika token sesuai akan mengembalikan pesan berikut
			$decoded = JWT::decode($jwt, $this->key, array('HS256'));
			$decoded->code = http_response_code();
			return $decoded;
		}
		catch (Exception $ex){
			//jika token tidak sesuai maka akan mengembalikan pesan berikut
			http_response_code(401);
			$decoded = [
				"message" => $ex->getMessage(), //menampilkan pesan error default
				"code" =>  http_response_code()
			];
			return $decoded;
		}
		
	}
}
?>
