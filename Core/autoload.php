<?php
spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    if (file_exists($class.'.php')) {
        include $class.'.php';
    } elseif (file_exists('src/'.$class.'.php')) {
        require 'src/'.$class.'.php';
    }
});
