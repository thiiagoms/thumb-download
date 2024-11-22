<?php

declare(strict_types=1);

use Thiiagoms\Thumb\Actions\Directory\DirectoryBuilder;
use Thiiagoms\Thumb\Actions\Directory\DirectoryChecker;
use Thiiagoms\Thumb\Actions\Directory\DirectoryManager;
use Thiiagoms\Thumb\Actions\Download\DownloadContent;
use Thiiagoms\Thumb\Actions\Download\DownloadYoutubeThumb;
use Thiiagoms\Thumb\Actions\Thumb\ThumbFileNameParser;
use Thiiagoms\Thumb\Actions\Thumb\ThumbManager;
use Thiiagoms\Thumb\Actions\Thumb\ThumbPathBuilder;
use Thiiagoms\Thumb\Actions\Thumb\ThumbWriter;
use Thiiagoms\Thumb\Actions\Youtube\YoutubeThumbnailBuilder;
use Thiiagoms\Thumb\Contracts\Actions\Directory\DirectoryBuilderInterface;
use Thiiagoms\Thumb\Contracts\Actions\Directory\DirectoryCheckerInterface;
use Thiiagoms\Thumb\Contracts\Actions\Directory\DirectoryManagerInterface;
use Thiiagoms\Thumb\Contracts\Actions\Download\DownloadContentInterface;
use Thiiagoms\Thumb\Contracts\Actions\Download\DownloadYoutubeThumbInterface;
use Thiiagoms\Thumb\Contracts\Actions\Thumb\ThumbFileNameParserInterface;
use Thiiagoms\Thumb\Contracts\Actions\Thumb\ThumbManagerInterface;
use Thiiagoms\Thumb\Contracts\Actions\Thumb\ThumbPathBuilderInterface;
use Thiiagoms\Thumb\Contracts\Actions\Thumb\ThumbWriterInterface;
use Thiiagoms\Thumb\Contracts\Actions\Youtube\YoutubeThumbnailBuilderInterface;
use Thiiagoms\Thumb\Contracts\Validators\URL\Fetch\URLFetchInterface;
use Thiiagoms\Thumb\Contracts\Validators\URL\URLExistsInterface;
use Thiiagoms\Thumb\Contracts\Validators\URL\URLFormatInterface;
use Thiiagoms\Thumb\Contracts\Validators\Youtube\YoutubeURLIsValidInterface;
use Thiiagoms\Thumb\Validators\URL\Fetch\URLFetch;
use Thiiagoms\Thumb\Validators\URL\URLExists;
use Thiiagoms\Thumb\Validators\URL\URLFormat;
use Thiiagoms\Thumb\Validators\Youtube\YoutubeURLIsValid;

return [
    DirectoryBuilderInterface::class => DI\autowire(DirectoryBuilder::class),
    DirectoryCheckerInterface::class => DI\autowire(DirectoryChecker::class),
    DirectoryManagerInterface::class => DI\autowire(DirectoryManager::class),
    DownloadContentInterface::class => DI\autowire(DownloadContent::class),
    DownloadYoutubeThumbInterface::class => DI\autowire(DownloadYoutubeThumb::class),
    ThumbFileNameParserInterface::class => DI\autowire(ThumbFileNameParser::class),
    ThumbManagerInterface::class => DI\autowire(ThumbManager::class),
    ThumbPathBuilderInterface::class => DI\autowire(ThumbPathBuilder::class),
    ThumbWriterInterface::class => DI\autowire(ThumbWriter::class),
    YoutubeThumbnailBuilderInterface::class => DI\autowire(YoutubeThumbnailBuilder::class),
    URLFetchInterface::class => DI\autowire(URLFetch::class),
    URLExistsInterface::class => DI\autowire(URLExists::class),
    URLFormatInterface::class => DI\autowire(URLFormat::class),
    YoutubeURLIsValidInterface::class => DI\autowire(YoutubeURLIsValid::class),
];
