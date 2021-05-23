<?php
namespace App\VivaSms;

use App\Http\Controllers\Controller;

class Viva extends Controller 
{
	protected static $sender;
	protected static $timeSend;
	protected static $dateSend;
	protected static $deleteKey;
	protected static $resultType;
	protected static $viewResult;
	protected static $userAccount;
	protected static $passAccount;
	protected static $MsgID;
  
  public static function run() {
		static::$sender      = config('vivasms.sender');
		static::$userAccount = config('vivasms.user');
		static::$passAccount = config('vivasms.password');
	}

	public static function Balance() {
		static::run();
		$url          = "www.viva-ksa.com/index.php/api/chk_balance/";
		$stringToPost = "?user=" . static::$userAccount . "&pass=" . static::$passAccount;
		$ch           = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url.$stringToPost);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");  
		$result = curl_exec($ch);
		return $result;
		// return curl_getinfo($ch);
	}

  public static function Send($numbers, $msg) {
		static::run();
		$numbers         = self::format_numbers($numbers);
		$url             = "http://www.viva-ksa.com/index.php/api/sendsms/";
		$stringToPost = "?user=" . static::$userAccount . "&pass=" . static::$passAccount . "&to=" . $numbers .  "&message=" . urlencode($msg) ."&sender=Marina";
		$ch           = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url.$stringToPost);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");  
		$result = curl_exec($ch);
		return $result;
		// return curl_getinfo($ch);

  }

  public static function format_numbers($numbers) {
		if (!is_array($numbers)) {
			return self::format_number($numbers);
		}

		$numbers_array = array();
		foreach ($numbers as $number) {
			$n = self::format_numbers($number);
			array_push($numbers_array, $n);
		}
		return implode(',', $numbers_array);
	}

	public static function format_number($number) {
		if (strlen($number) == 10 && starts_with($number, '05')) {
			return preg_replace('/^0/', '966', $number);
		} elseif (starts_with($number, '00')) {
			return preg_replace('/^00/', '', $number);
		} elseif (starts_with($number, '+')) {
			return preg_replace('/^+/', '', $number);
		}

		return $number;
	}

	public static function count_messages($text) {
		$length = mb_strlen($text);
		if ($length <= 70) {
			return 1;
		} else {
			return ceil($length / 67);
		}

	}
  
}