<?php

declare(strict_types=1);

if (php_sapi_name() !== 'cli') {
    echo "<h1>Only in CLI mode</h1>";
    exit;
}

require_once __DIR__ . '/autoload.php';

use Src\Commands\BannerCommand;
use Src\Commands\VideoCommand;

BannerCommand::banner();

$youtubeUrl = "https://www.youtube.com/watch?v=HrQWtbxY1Hs";
$downloader = new VideoCommand($youtubeUrl);
$downloader->downloadThumb();
