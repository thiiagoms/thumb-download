<?php

declare(strict_types=1);

namespace Unit\Validators\Youtube;

use PHPUnit\Framework\TestCase;
use Thiiagoms\Thumb\Contracts\Validators\URL\URLExistsInterface;
use Thiiagoms\Thumb\Exceptions\URL\URLInvalidFormatException;
use Thiiagoms\Thumb\Exceptions\URL\URLNotFoundException;
use Thiiagoms\Thumb\Exceptions\Youtube\YoutubeURLInvalidException;
use Thiiagoms\Thumb\Messages\URL\URLMessage;
use Thiiagoms\Thumb\Messages\Youtube\YoutubeMessage;
use Thiiagoms\Thumb\Validators\Youtube\YoutubeURLIsValid;

class YoutubeURLIsValidTest extends TestCase
{
    private URLExistsInterface $urlExists;

    private YoutubeURLIsValid $youtubeURLIsValid;

    protected function setUp(): void
    {
        $this->urlExists = $this->createMock(URLExistsInterface::class);

        $this->youtubeURLIsValid = new YoutubeURLIsValid(urlExists: $this->urlExists);
    }

    public function test_it_should_throw_exception_when_url_provided_is_not_a_valid_url(): void
    {
        $url = 'invalid-url';

        $this->urlExists->method('checkUrlExists')
            ->with($url)
            ->willThrowException(new URLInvalidFormatException(URLMessage::URL_FORMAT_IS_INVALID));

        $this->expectException(URLInvalidFormatException::class);
        $this->expectExceptionMessage(URLMessage::URL_FORMAT_IS_INVALID);

        $this->youtubeURLIsValid->checkYoutubeUrlIsValid($url);
    }

    public function test_it_should_throw_exception_when_url_provided_is_a_valid_url_but_does_not_exist(): void
    {
        $url = 'https://invalidurl.com';

        $this->urlExists->method('checkUrlExists')
            ->with($url)
            ->willThrowException(new URLNotFoundException(URLMessage::URL_DOES_NOT_EXISTS));

        $this->expectException(URLNotFoundException::class);
        $this->expectExceptionMessage(URLMessage::URL_DOES_NOT_EXISTS);

        $this->youtubeURLIsValid->checkYoutubeUrlIsValid($url);
    }

    public function test_it_should_throw_exception_when_url_provided_is_a_valid_url_and_exists_but_that_is_not_a_youtube_url(): void
    {
        $url = 'https://www.youtube.com/watch?v=TfsO0BGvGn0&list=PLHz_AreHm4dlFPrCXCmd5g92860x_Pbr_';

        $this->urlExists->method('checkUrlExists')
            ->with($url);

        $this->expectException(YoutubeURLInvalidException::class);
        $this->expectExceptionMessage(YoutubeMessage::YOUTUBE_URL_IS_INVALID);

        $this->youtubeURLIsValid->checkYoutubeUrlIsValid($url);
    }
}
