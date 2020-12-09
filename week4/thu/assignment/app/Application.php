<?php 
namespace App;

class Application {

    public function mount() {
        $router =  new Router();

        $router->executeUrl();

    }

    /**
     * Load .env file
     */

     public function loadConfig() {
         $this->checkConfig();

         $fp = fopen(DOT_ENV_FILE, "r");
         if(!$fp) {
             
         }
     }
}