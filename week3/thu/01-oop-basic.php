<?php 

class Post {

    public $title = "Hello";
    public $body = "body";
    public $postedAt = "2020-10-20";

    public function getTitle(): string {
        return $this->title;
    }


    public function setTitle(string $title) {
        $this->title = $title;
    }

}

$p1 = new Post();
$p2 = new Post();



echo $p2->getTitle() . PHP_EOL;
$p2->setTitle('This is a new title');
echo $p2->getTitle(). PHP_EOL;

class Car {

    public $color;

    public $iMoving = false;

    public function move() {
         $this->iMoving  = true;
    }

    public function setColor(string $color) {
        $this->color = $color;
    }
}


$benz = new Car();


if($benz->iMoving) {
    echo "Car is moving";
} else {
    echo "Not moving";
}