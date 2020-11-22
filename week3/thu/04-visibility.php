<?php 

class User {

    protected $email = 'test@m.com';



    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email) {
        $this->validateEmail($email);
        $this->email = $email;
    }

    protected function validateEmail($email) {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('Invalid email address');
        }
    }
}


$user = new User();
$user->setEmail('abah@yahoo.com');
var_dump($user->getEmail());

try {
    $user->setEmail('abah');
    echo "Line 32";
    echo "line 33";
}catch(Exception $e){

}

echo "LINE 38";