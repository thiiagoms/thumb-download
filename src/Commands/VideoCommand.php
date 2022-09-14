<?php

declare(strict_types=1);

namespace Src\Commands;

class VideoCommand
{

    /**
     * Youtube URL
     *
     * @var string
     */
    private string $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    private function getCode(): string
    {
        $code = explode('?v=', $this->url);
        return $code[1];
    }

    public function downloadThumb()
    {
        $dir = __DIR__ . '/../../assets/';
        $code = $this->getCode();
        $thumb = "https://img.youtube.com/vi/{$code}/maxresdefault.jpg";
        $content = file_get_contents($thumb);
        file_put_contents($dir . "$code.jpg", $content);
    }
}