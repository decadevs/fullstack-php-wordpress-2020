<?php

$now   = time() - (60 * 60 * 24 * 2);

echo date("l jS \of F Y h:i:s A", $now);

//strtotime