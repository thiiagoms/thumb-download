<?php

declare(strict_types=1);

namespace Thiiagoms\Thumb;

use Thiiagoms\Thumb\Contracts\Actions\Directory\DirectoryManagerInterface;
use Thiiagoms\Thumb\Contracts\Actions\Download\DownloadYoutubeThumbInterface;
use Thiiagoms\Thumb\Contracts\Actions\Thumb\ThumbManagerInterface;
use Thiiagoms\Thumb\Contracts\Validators\Youtube\YoutubeURLIsValidInterface;
use Thiiagoms\Thumb\Entities\Youtube;
use Thiiagoms\Thumb\Utils\Printer;

readonly class App
{
    private Youtube $youtube;

    private const string DEFAULT_STORAGE_PATH = __DIR__.'/../storage/images/';

    public function __construct(
        private DownloadYoutubeThumbInterface $downloadYoutubeThumb,
        private YoutubeURLIsValidInterface $youtubeURLIsValid,
        private DirectoryManagerInterface $directoryManager,
        private ThumbManagerInterface $thumbManager,
    ) {}

    public function with(string $url): App
    {
        try {

            $this->youtubeURLIsValid->checkYoutubeUrlIsValid($url);

            $this->youtube = new Youtube($url);

            return $this;

        } catch (\Exception $e) {
            Printer::error("⚠️Error: {$e->getMessage()}");
            exit;
        }
    }

    public function handle(): string
    {
        $thumb = $this->downloadYoutubeThumb->downloadThumb($this->youtube);

        $this->directoryManager->createDirectory(self::DEFAULT_STORAGE_PATH.$this->youtube->code());

        $this->thumbManager->buildThumb(self::DEFAULT_STORAGE_PATH, $thumb, $this->youtube);

        return $this->youtube->code();
    }
}
