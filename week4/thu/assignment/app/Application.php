<?php
namespace week4_assignment;

use second_file\Model;

class Application {

    public function mount() {
        $person1 = new Model("Prince", "Dickson", "princed@example.com");

        echo "First Name: " . $person1->getFirstName();
    }
}