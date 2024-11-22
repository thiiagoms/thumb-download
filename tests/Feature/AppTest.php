<?php

namespace Feature;

use PHPUnit\Framework\TestCase;
use Thiiagoms\Thumb\App;

class AppTest extends TestCase
{
    private App $app;

    private string $storagePath;

    protected function setUp(): void
    {
        require __DIR__.'/../../bootstrap.php';

        $this->app = $container->get(App::class);
    }

    public function test_it_should_download_youtube_thumb(): void
    {
        $response = $this->app->with('https://www.youtube.com/watch?v=jfKfPfyJRdk')
            ->handle();

        $this->assertEquals('jfKfPfyJRdk', $response);

        $this->storagePath = __DIR__.'/../../storage/images/jfKfPfyJRdk/jfKfPfyJRdk.jpg';

        $this->assertFileExists($this->storagePath);
    }

    protected function tearDown(): void
    {
        unlink($this->storagePath);

        rmdir(__DIR__.'/../../storage/images/jfKfPfyJRdk');
    }
}
