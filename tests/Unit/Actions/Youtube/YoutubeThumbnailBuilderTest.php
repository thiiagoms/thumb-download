<?php

declare(strict_types=1);

namespace Unit\Actions\Youtube;

use PHPUnit\Framework\TestCase;
use Thiiagoms\Thumb\Actions\Youtube\YoutubeThumbnailBuilder;
use Thiiagoms\Thumb\Entities\Youtube;

class YoutubeThumbnailBuilderTest extends TestCase
{
    private YoutubeThumbnailBuilder $thumbBuilder;

    protected function setUp(): void
    {
        $this->thumbBuilder = new YoutubeThumbnailBuilder;
    }

    public function test_it_should_return_thumbnail_url(): void
    {
        $youtube = new Youtube('https://www.youtube.com/watch?v=mokBtjyT8fo');

        $thumb = $this->thumbBuilder->buildYoutubeThumb($youtube);

        $expectedThumb = 'https://img.youtube.com/vi/mokBtjyT8fo/maxresdefault.jpg';

        $this->assertIsString($thumb);
        $this->assertEquals($expectedThumb, $thumb);
    }
}
