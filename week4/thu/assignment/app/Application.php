<?php 
namespace App;
use App\Database\DB;
use App\Database\MeekroDB;

class Application {

    public function __construct() {
        $this->loadConfig();
        $this->mount();

    }
    protected function mount() {
        $router =  new Router();
        $router->executeUrl();
    }

    protected function checkConfig() {
        if(!file_exists(DOT_ENV_FILE)) 
            throw new \Exception ('You must create a .env file in the root document');
    }

    public function loadConfig() {
         $this->checkConfig();

         $fp = fopen(DOT_ENV_FILE, "r" );
         if(!$fp) throw \Exception('unable to open .env file reading');

         $lines = [];

         while (!feof($fp)) {
             $line = trim(fgets($fp));
            
             if($line){
                $lines[] = $line;
            } 
          }
         fclose($fp);
        
         $this-> parseConfigLines($lines); 

    }

    protected function parseConfigLines(array $lines){
        foreach($lines as $line){
            $parts = explode('=', $line);
            if(count($parts) === 2){
                $key = $parts[0];
                $value = str_ireplace('"', '', $parts[1]);
                $_ENV[$key] = $value;
            }
        }
    }

     protected function loadSession() {
        session_start();
    }
    
}
