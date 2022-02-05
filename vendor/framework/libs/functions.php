<?php

function debug($arr, $die = false) {

    $debug_text =   '<pre>' . 
                    date("Y.m.d") . " " . 
                    date("H:i:s") . "\t" . 
                    print_r($arr, true) . 
                    '</pre>';

    echo $debug_text;

    $fp = fopen('data.html', 'a'); //opens file in append mode
    fwrite($fp, $debug_text);
    fclose($fp);


    if ($die) die();
}
function redirect($http = false) {
    if ($http) {
        $redirect = $http;
    } else {
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/';
    }

    header("Location: $redirect");
    exit();
}

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES);
}

function __($key, $echo = true) {
    if ($echo === false) {
        return \framework\core\base\Lang::get($key);
    } else {
        echo \framework\core\base\Lang::get($key);
    }
}
