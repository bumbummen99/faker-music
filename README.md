# Faker Music
Faker Provider for mp3 music files

[![Latest Version on Packagist](https://img.shields.io/packagist/v/skyraptor/faker-music.svg?style=flat-square)](https://packagist.org/packages/skyraptor/faker-music)
[![CI](https://github.com/bumbummen99/faker-music/actions/workflows/ci.yml/badge.svg)](https://github.com/bumbummen99/faker-music/actions/workflows/ci.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/skyraptor/faker-music.svg?style=flat-square)](https://packagist.org/packages/skyraptor/faker-music)

## Installation
You can install the library with the following command
```
composer require --dev skyraptor/faker-music
```

**IMPORTANT: Do NOT use --prefer-src with this package as the source is quite big (>1GB).**

## Usage

You can use it like the `File` Provider, just without the source directory parameter.

Random genere:
```php
$path = $this->faker->randomMusic($targetDirectory, $fullPath);
```

Specific genere:
```php
$path = $this->faker->music('rock', $targetDirectory, $fullPath);
```
