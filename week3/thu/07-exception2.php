<?php 

class InvalidEmailException extends Exception {}

function validate($data) {
    if(!$data) throw new InvalidEmailException('Invalid email');

    if(strlen($data) > 5 ) throw new Exception('Invalid email');
}

try {
    validate('');
} catch(Exception $e ) {
    
    if($e instanceof InvalidEmailException) {
        echo "This is an invalid email error";
    }elseif($e instanceof RuntimeException) {
        echo "RuntimeException";
    } else {
        echo "This is a general error";
    }
}