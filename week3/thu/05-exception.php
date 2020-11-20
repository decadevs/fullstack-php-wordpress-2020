<?php 

function fire() {
    throw new Exception('Exception thrown');
}

echo "Before exception" . PHP_EOL;

try {
    fire();
} catch(Exception $e) {
    echo $e->getMessage() . PHP_EOL;;
}

echo "After exception". PHP_EOL;;