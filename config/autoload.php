<?php
spl_autoload_register(function (string $class_name) {

    $path = __DIR__ . "/src/" . str_replace("\\", "/", $class_name) . ".php";

    if (file_exists($path)) {
        require_once $path;
    }
});


