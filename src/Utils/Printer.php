<?php

declare(strict_types=1);

namespace Thiiagoms\Thumb\Utils;

abstract class Printer
{
    private function __construct() {}

    private static function out(string $message): void
    {
        echo $message;
    }

    private static function newLine(): void
    {
        self::out(PHP_EOL);
    }

    private static function display(string $message): void
    {
        self::newLine();
        self::out($message);
        self::newLine();
    }

    public static function info(string $message): void
    {
        self::display($message);
    }

    public static function success(string $message): void
    {
        self::display((Colors::GREEN)->color().$message."\e[0m");
    }

    public static function error(string $message): void
    {
        self::display((Colors::RED)->color().$message."\e[0m\n");
    }

    public static function warning(string $message): void
    {
        self::display((Colors::YELLOW)->color().$message."\e[0m");
    }
}
