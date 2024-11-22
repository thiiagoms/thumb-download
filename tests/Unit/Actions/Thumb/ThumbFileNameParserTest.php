<?php

namespace Unit\Actions\Thumb;

use PHPUnit\Framework\TestCase;
use Thiiagoms\Thumb\Entities\Youtube;

class ThumbFileNameParserTest extends TestCase
{
    private Youtube $youtube;

    protected function setUp(): void
    {
        $this->youtube = new Youtube('https://www.youtube.com/watch?v=jfKfPfyJRdk');
    }

    public function test_it_should_return_valid_youtube_code(): void
    {
        $youtubeCode = explode('?v=', 'https://www.youtube.com/watch?v=jfKfPfyJRdk')[1];

        $this->assertEquals($youtubeCode, $this->youtube->code());
    }
}
