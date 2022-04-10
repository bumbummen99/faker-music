<?php

namespace SkyRaptor\FakerMusic\Provider;

use Faker\Provider\Base;
use Faker\Provider\File;

class MusicProvider extends Base
{
    public static function randomMusic(string $targetDirectory, bool $fullPath = true)
    {
        /* Pick a random genere */
        $genere = static::randomElement(self::getGeneres());

        /* Use normal music method */
        return self::music($genere, $targetDirectory, $fullPath);
    }

    public static function music(string $genere, string $targetDirectory, bool $fullPath = true)
    {
        /* Build the path to the genere */
        $haystack = __DIR__ . '/../../data/converted/' . $genere;

        /* Check if it does exist */
        if (! is_dir($haystack)) {
            throw new \Exception("There is no data for the genere '$genere'!");
        }

        /* Normal File Provider behaivour from here on */
        return File::file($haystack, $targetDirectory, $fullPath);
    }

    private static function getGeneres(): array
    {
        $generes = [];

        foreach(glob(__DIR__ . '/../../data/converted/*', GLOB_ONLYDIR) as $dir) {
            $generes[] = basename($dir);
        }

        return $generes;
    }
}