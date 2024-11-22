<?php

declare(strict_types=1);

namespace Feature\Validators\URL\Fetch;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Thiiagoms\Thumb\Validators\URl\Fetch\URLFetch;

class URLFetchTest extends TestCase
{
    private URLFetch $urlFetch;

    protected function setUp(): void
    {
        $this->urlFetch = new URLFetch;
    }

    public static function urlFetchProvider(): array
    {
        return [
            'it should return false when url provided does not exists and we can not fetch it' => [
                'url' => 'https://invalidurl.com',
                'expected' => false,
            ],
            'it should return true when url provided exists and we can fetch it' => [
                'url' => 'https://google.com',
                'expected' => true,
            ],
        ];
    }

    #[DataProvider('urlFetchProvider')]
    public function test_fetch_url(string $url, bool $expected): void
    {
        $result = $this->urlFetch->fetchUrl($url);

        $this->assertIsBool($result);
        $this->assertEquals($expected, $result);
    }
}
