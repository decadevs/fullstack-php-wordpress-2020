<?php
namespace App;

class Greeting {
  public function index($greeting, $name) {
    echo $greeting . ',' . '  '. $name;
  }
}