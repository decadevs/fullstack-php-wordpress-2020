<?php

if(!function_exists('env')) {
    function env($key, $default='') {
        return isset($_ENV[$key]) ? $_ENV[$key] : $default;
    }
}


function meekrodb_error_handler($params) {
    if (isset($params['query'])) $out[] = "QUERY: " . $params['query'];
    if (isset($params['error'])) $out[] = "ERROR: " . $params['error'];
    $out[] = "";

    if (php_sapi_name() == 'cli' && empty($_SERVER['REMOTE_ADDR'])) {
        echo implode("\n", $out);
    } else {
        echo implode("<br>\n", $out);
    }

    die;
}

function meekrodb_debugmode_handler($params) {
    echo "QUERY: " . $params['query'] . " [" . $params['runtime'] . " ms]";
    if (php_sapi_name() == 'cli' && empty($_SERVER['REMOTE_ADDR'])) {
        echo "\n";
    } else {
        echo "<br>\n";
    }
}
