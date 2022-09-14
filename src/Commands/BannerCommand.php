<?php

declare(strict_types=1);

namespace Src\Commands;

use Src\Utils\Printer;

class BannerCommand
{

    /**
     * Main display command
     *
     * @return void
     */
    public static function banner(): void
    {
        Printer::display("
        ████████ ██   ██ ██    ██ ███    ███ ██████  
           ██    ██   ██ ██    ██ ████  ████ ██   ██ 
           ██    ███████ ██    ██ ██ ████ ██ ██████  
           ██    ██   ██ ██    ██ ██  ██  ██ ██   ██ 
           ██    ██   ██  ██████  ██      ██ ██████
        ");
    }

    public static function help(): void
    {
        Printer::display("
            $ ./thumb
                > YouTube url: https://www.youtube.com/watch?v=OK_JCtrrv-c
            $
        ");
    }
}
