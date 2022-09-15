<?php

declare(strict_types=1);

namespace Src\Utils;

/**
 * Printer package
 *
 * @package Src\Utils
 * @author  Thiago Silva <thiagom.devsec@gmail.com>
 * @version 1.0
 */
class Printer
{

    /**
     * Print message
     *
     * @param string $message
     * @return void
     */
    private static function out(string $message): void
    {
        echo $message;
    }

    /**
     * Add new line in CLI
     *
     * @return void
     */
    private static function newLine(): void
    {
        self::out(PHP_EOL);
    }

    /**
     * Main display
     *
     * @param string $message
     * @return void
     */
    private static function display(string $message): void
    {
        self::newLine();
        self::out($message);
        self::newLine();
    }

    /**
     * Success message
     *
     * @param string $message
     * @return void
     */
    public static function success(string $message): void
    {
        self::display((Colors::GREEN)->color() . $message . "\e[0m");
    }

    /**
     * Error message
     *
     * @param string $message
     * @return void
     */
    public static function error(string $message): void
    {
        self::display((Colors::RED)->color() . $message . "\e[0m\n");
    }

    /**
     * Info message
     *
     * @param string $message
     * @return void
     */
    public static function info(string $message): void
    {
        self::display((Colors::YELLOW)->color() . $message . "\e[0m");
    }
}
