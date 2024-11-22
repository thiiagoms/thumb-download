<?php

declare(strict_types=1);

namespace Unit\Validators\URL;

use PHPUnit\Framework\TestCase;
use Thiiagoms\Thumb\Exceptions\URL\URLInvalidFormatException;
use Thiiagoms\Thumb\Messages\URL\URLMessage;
use Thiiagoms\Thumb\Validators\URL\URLFormat;

class URLFormatTest extends TestCase
{
    private URLFormat $urlFormat;

    protected function setUp(): void
    {
        $this->urlFormat = new URLFormat;
    }

    public function test_it_should_throw_exception_when_url_provided_has_invalid_format(): void
    {
        $this->expectException(URLInvalidFormatException::class);
        $this->expectExceptionMessage(URLMessage::URL_FORMAT_IS_INVALID);

        $this->urlFormat->checkUrlFormatIsValid('invalid-url');
    }
}
