<?php

class Validate {
	static $errors = true;

	static function isNotEmpty($arr) {
        
        if(empty($arr)){
            self::throwError('Data can not be empty');
        }else{

            foreach ($arr as $value) {	
                if (empty($value)) {
                    self::throwError('Some Datas are missing');
                }
            }
        }
	}

	static function isNumber($val) {
		// Allow +, - and . in phone number
        $filtered_phone_number = filter_var($val, FILTER_SANITIZE_NUMBER_INT);
        // Remove "-" from number
        $phone_to_check = str_replace("-", "", $filtered_phone_number);

        // Check the lenght of number
        // This can be customized if you want phone number from a specific country
        if (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14 ) {
            self::throwError('invalid Phone Number');
        } 

        return $val;

	}

	static function isString($val) {
		if (!is_string($val)) {
			self::throwError('Invalid Name');
		}
		return $val;
	}

	static function isEmail($val) {
		$val = filter_var($val, FILTER_VALIDATE_EMAIL);
		if ($val === false) {
			self::throwError('Invalid Email');
		}
		return $val;
	}

	static function throwError($error = 'Error In Processing') {
		if (self::$errors === true) {
			throw new Exception($error);
		}
	}
}