<?php

declare(strict_types=1);

namespace Unit\Validators\URL;

use PHPUnit\Framework\TestCase;
use Thiiagoms\Thumb\Contracts\Validators\URL\Fetch\URLFetchInterface;
use Thiiagoms\Thumb\Contracts\Validators\URL\URLFormatInterface;
use Thiiagoms\Thumb\Exceptions\URL\URLInvalidFormatException;
use Thiiagoms\Thumb\Exceptions\URL\URLNotFoundException;
use Thiiagoms\Thumb\Messages\URL\URLMessage;
use Thiiagoms\Thumb\Validators\URL\URLExists;

class URLExistsTest extends TestCase
{
    private URLFormatInterface $urlFormat;

    private URLFetchInterface $urlFetch;

    private URLExists $urlExists;

    protected function setUp(): void
    {
        $this->urlFormat = $this->createMock(URLFormatInterface::class);

        $this->urlFetch = $this->createMock(URLFetchInterface::class);

        $this->urlExists = new URLExists(urlFormat: $this->urlFormat, urlFetch: $this->urlFetch);
    }

    public function test_it_should_throw_exception_when_url_provided_has_invalid_format(): void
    {
        $url = 'invalid-url';

        $this->urlFormat->method('checkUrlFormatIsValid')
            ->with($url)
            ->willThrowException(new URLInvalidFormatException(URLMessage::URL_FORMAT_IS_INVALID));

        $this->expectException(URLInvalidFormatException::class);
        $this->expectExceptionMessage(URLMessage::URL_FORMAT_IS_INVALID);

        $this->urlExists->checkUrlExists($url);
    }

    public function test_it_should_throw_exception_when_url_has_a_valid_url_format_but_does_not_exist(): void
    {
        $url = 'https://invalid-url.com';

        $this->urlFormat->method('checkUrlFormatIsValid')
            ->with($url);

        $this->urlFetch->method('fetchUrl')
            ->with($url)
            ->willReturn(false);

        $this->expectException(URLNotFoundException::class);
        $this->expectExceptionMessage(URLMessage::URL_DOES_NOT_EXISTS);

        $this->urlExists->checkUrlExists($url);
    }
}
