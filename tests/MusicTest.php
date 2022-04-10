<?php

namespace Faker\Tests\Provider;

use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase;
use SkyRaptor\FakerMusic\Provider\MusicProvider;

class MusicTest extends TestCase
{
    /**
     * @var Generator
     */
    private $faker;

    protected function setUp(): void
    {
        $faker = Factory::create();
        $faker->addProvider(new MusicProvider($faker));
        $this->faker = $faker;
    }

    public function test_get_random_file(): void
    {
        $this->assertTrue(true);
    }
}