<?php

namespace SkyRaptor\FakerMusic\Provider;

use Faker\Provider\Base;
use Faker\Provider\File;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use RegexIterator;

class MusicProvider extends Base
{
    public static function random(string $targetDirectory, bool $fullPath = true)
    {
        return File::file(static::randomElement(self::getFilePaths()), $targetDirectory, $fullPath);
    }

    public static function genere(string $genere, string $targetDirectory, bool $fullPath = true)
    {
        if (is_dir(__DIR__ . '/../data/converted/' . $genere)) {
            throw new \Exception("There is no test data for the genere '$genere'");
        }

        return File::file(static::randomElement(self::getFilePaths($genere)), $targetDirectory, $fullPath);
    }

    /**
     * Searches the converted data directory for mp3 files with
     * the fiven genere or all.
     *
     * @param string $genere
     * @return array
     */
    private static function getFilePaths(string $genere = '.*'): array
    {
        return self::rsearch(__DIR__ . '\\/..\\/data\\/converted', $genere . '\\/.*.mp3');
    }

    /**
     * https://stackoverflow.com/a/17161106
     *
     * @param string $folder
     * @param string $regPattern
     * @return array
     */
    private static function rsearch(string $folder, string $regPattern): array
    {
        $dir = new RecursiveDirectoryIterator($folder);
        $ite = new RecursiveIteratorIterator($dir);
        $files = new RegexIterator($ite, $regPattern, RegexIterator::GET_MATCH);
        $fileList = array();
        foreach($files as $file) {
            $fileList = array_merge($fileList, $file);
        }
        return $fileList;
    }
}