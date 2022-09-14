<?php

declare(strict_types=1);

/**
 * Custom autoload
 *
 * @param string $class name
 * @return void
 */
spl_autoload_register(function (string $class): void {
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    $class = str_replace("Src", "src", $class) . ".php";

    if (!file_exists($class)) {
        throw new \Exception("Class {$class} not found!!");
    }

    require_once $class;
});