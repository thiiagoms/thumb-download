<?php

declare(strict_types=1);

namespace Src\Commands;

use Src\Utils\Printer;

/**
 * Video command
 * 
 * @package Src\Commands
 * @author  Thiago Silva <thiagom.devsec@gmail.com>
 * @version 1.0
 */
class VideoCommand
{

    /**
     * Default assets Path
     * 
     * @var string
     */
    private const ASSETS = __DIR__ . '/../../assets/';

    /**
     * Youtube URL
     *
     * @var string
     */
    private string $url;

    /**
     * Init command
     *
     * @param string $url
     */
    public function __construct(string $url)
    {
        if ($this->getContent($url) == false) {
            Printer::error("{$url} is not valid");
            exit;
        }

        $this->url = $url;
    }

    /**
     * Get video code from url
     *
     * @return string
     */
    private function getUrlCode(): string
    {
        $code = explode('?v=', $this->url);
        return $code[1];
    }

    /**
     * Get content from Url and check if url is valid
     *
     * @param string $url
     * @return string|boolean
     */
    private function getContent(string $url): string|bool
    {
        $code = file_get_contents($url);
        return $code === false ? false : $code;
    }

    /**
     * Create directory with yrl code
     *
     * @param string $code
     * @return void
     */
    private function makeDirectory(string $code): void
    {
        try {
            $path = self::ASSETS . $code;

            if (!is_dir($path)) {
                mkdir(self::ASSETS . $code, 0777, false);
            }

            return;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Thumb URL with max resoluiton
     *
     * @param string $urlCode
     * @return string
     */
    private function downloadThumbMaxSize(string $urlCode): string
    {
        return "https://img.youtube.com/vi/{$urlCode}/maxresdefault.jpg";
    }

    /**
     * Download youtube thumbnail
     *
     * @return string
     */
    public function downloadThumb(): string
    {
        $urlCode = $this->getUrlCode();
        $this->makeDirectory($urlCode);

        $img = "{$urlCode}.jpg";

        $path = self::ASSETS . $urlCode . '/' . $img;
        file_put_contents($path, $this->getContent($this->downloadThumbMaxSize($urlCode)));

        return $urlCode;
    }
}
