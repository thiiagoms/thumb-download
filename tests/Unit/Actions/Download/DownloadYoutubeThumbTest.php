<?php

declare(strict_types=1);

namespace Unit\Actions\Download;

use PHPUnit\Framework\TestCase;
use Thiiagoms\Thumb\Actions\Download\DownloadYoutubeThumb;
use Thiiagoms\Thumb\Contracts\Actions\Download\DownloadContentInterface;
use Thiiagoms\Thumb\Contracts\Actions\Youtube\YoutubeThumbnailBuilderInterface;
use Thiiagoms\Thumb\Entities\Youtube;

class DownloadYoutubeThumbTest extends TestCase
{
    private YoutubeThumbnailBuilderInterface $builder;

    private DownloadContentInterface $downloadContent;

    private Youtube $youtube;

    private DownloadYoutubeThumb $downloadYoutubeThumb;

    protected function setUp(): void
    {
        $this->builder = $this->createMock(YoutubeThumbnailBuilderInterface::class);

        $this->downloadContent = $this->createMock(DownloadContentInterface::class);

        $this->downloadYoutubeThumb = new DownloadYoutubeThumb(
            thumbnailBuilder: $this->builder,
            downloadContent: $this->downloadContent
        );

        $this->youtube = new Youtube('https://www.youtube.com/watch?v=zRHNi3QfFlE');
    }

    private function getThumbBuilderOutputMock(): string
    {
        return "https://img.youtube.com/vi/{$this->youtube->code()}/maxresdefault.jpg";
    }

    public function test_it_should_return_youtube_thumb_content(): void
    {
        $expectedYoutubeThumbMock = $this->getThumbBuilderOutputMock();

        $this->builder->method('buildYoutubeThumb')
            ->with($this->youtube)
            ->willReturn($expectedYoutubeThumbMock);

        $this->downloadContent->method('get')
            ->with($expectedYoutubeThumbMock)
            ->willReturn($expectedYoutubeThumbMock);

        $result = $this->downloadYoutubeThumb->downloadThumb($this->youtube);

        $this->assertIsString($result);
        $this->assertSame($expectedYoutubeThumbMock, $result);
    }
}
