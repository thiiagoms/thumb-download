<?php

declare(strict_types=1);

namespace Src\Commands;

use Src\Utils\Printer;

/**
 * Printer Command
 * 
 * @package Src\Commands
 * @author  Thiago Silva <thiagom.devsec@gmail.com>
 * @version 1.0
 */
class BannerCommand
{

    /**
     * Main display command
     *
     * @return void
     */
    public static function banner(): void
    {
        Printer::info("
        ████████ ██   ██ ██    ██ ███    ███ ██████  
           ██    ██   ██ ██    ██ ████  ████ ██   ██ 
           ██    ███████ ██    ██ ██ ████ ██ ██████  
           ██    ██   ██ ██    ██ ██  ██  ██ ██   ██ 
           ██    ██   ██  ██████  ██      ██ ██████
        ");
    }

    /**
     * Display help command
     *
     * @return void
     */
    public static function help(): void
    {
        Printer::info("
            $ ./thumb

                > Enter with your YouTube url: https://www.youtube.com/watch?v=OK_JCtrrv-c

            [*] Downloading thumb

            > URL code: OK_JCtrrv-c
            > Check your files inside assets/OK_JCtrrv-c/
        ");
    }
}
