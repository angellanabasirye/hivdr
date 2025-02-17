<?php

namespace App\Helpers;

/*
Uses sha256 and ripemd160 ecncryption algorithms
Create new instance as;
$encryptDecrypt=new EncryptDecrypt($hostUsername,$seed);
Where; $hostUsername & $seed are any 2 client static fields
*/
class EncryptDecrypt
{
	public $cipher="aes-128-ctr"; //use aes-128-gcm in php 7+// requires a tag

	function __construct($hostUsername, $seed = 'XXrJVbMuxjrniVVCzmN1Y2trPYXX'){
		//ideally, the seed should be stored on a different server or .env. But for this, I pass
		if (in_array($this->cipher, openssl_get_cipher_methods())) {
			$this->ivlen=openssl_cipher_iv_length($this->cipher);
		}
		//generate client Private key
		$hash_hostUsername=hash('sha256', $hostUsername);
		$key=hash('ripemd160', $hash_hostUsername.$seed);
		$this->key=base64_decode($key);
	}

	function encrypt($plaintext){//string $plaintext
		if ($plaintext!="") {
		 	$iv=openssl_random_pseudo_bytes($this->ivlen);
			$ciphertext=openssl_encrypt($plaintext, $this->cipher, $this->key, $options=0, $iv);
			$iv_ciphertext=base64_encode($iv.$ciphertext); 
			return $iv_ciphertext;
		 }
		 return "";
	}

	function decrypt($iv_ciphertext=""){ 
		if ($iv_ciphertext!="") {
			$iv_ciphertext=base64_decode($iv_ciphertext);
			$iv=substr($iv_ciphertext, 0, $this->ivlen); 
			$ciphertext=substr($iv_ciphertext, $this->ivlen);
			$plaintext=openssl_decrypt($ciphertext, $this->cipher, $this->key, $options=0, $iv);
			return $plaintext;
		}
		return "";
		
	} 
}
// if (!function_exists('encryptedFields')) {
// 	function encryptedFields(){
// 		return array('clinicNumber','nin','address','telecom','contactTelecom','contactName');
// 	}
// }
	
?>