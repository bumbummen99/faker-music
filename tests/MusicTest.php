<?php

namespace Faker\Tests\Provider;

use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase;
use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamDirectory;
use SkyRaptor\FakerMusic\Provider\MusicProvider;

class MusicTest extends TestCase
{
    private Generator $faker;

    private vfsStreamDirectory $fileSystem;

    protected function setUp(): void
    {
        /* Setup Faker */
        $this->faker = Factory::create();
        $this->faker->addProvider(new MusicProvider($this->faker));

        /* Setup virtual file system */
        $this->fileSystem = vfsStream::setup('root', 444, [
            'songs' => [],
        ]);
    }

    public function test_get_random_file(): void
    {
        $file = $this->faker->randomMusic($this->fileSystem->url('/'));

        $this->assertTrue(file_exists($file));
    }

    public function test_get_specific_genere_file(): void
    {
        $file = $this->faker->music('rock', $this->fileSystem->url('/'));

        $this->assertTrue(file_exists($file));
    }

    public function test_genere_does_not_exist(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('There is no data for the genere \'DOESNOTEXIST\'!');

        $file = $this->faker->music('DOESNOTEXIST', $this->fileSystem->url('/'));
    }
}