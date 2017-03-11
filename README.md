# Guzzle extensions for PHPStan

[![Build Status](https://travis-ci.org/phpstan/phpstan-guzzle.svg)](https://travis-ci.org/phpstan/phpstan-guzzle)
[![Latest Stable Version](https://poser.pugx.org/phpstan/phpstan-guzzle/v/stable)](https://packagist.org/packages/phpstan/phpstan-guzzle)
[![Coverage Status](https://coveralls.io/repos/github/phpstan/phpstan-guzzle/badge.svg?branch=master)](https://coveralls.io/github/phpstan/phpstan-guzzle?branch=master)
[![Code Climate](https://codeclimate.com/github/phpstan/phpstan-guzzle/badges/gpa.svg)](https://codeclimate.com/github/phpstan/phpstan-guzzle)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/97e9801f916f4244a8fa06599e0f7ba5)](https://www.codacy.com/app/phpstan/phpstan-guzzle?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=phpstan/phpstan-guzzle&amp;utm_campaign=Badge_Grade)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/de604dee-49f0-40c9-965c-62d0b001c887/mini.png)](https://insight.sensiolabs.com/projects/de604dee-49f0-40c9-965c-62d0b001c887)

* [PHPStan](https://github.com/phpstan/phpstan)
* [Guzzle](https://github.com/guzzle/guzzle)

This extension provides following feature:

* Adds missing magics method (`get`, `post`, ... and the asynchronous ones) on `GuzzleHttp\Client` with correct return types

## Usage

To use this extension, require it in [Composer](https://getcomposer.org/):

```
composer require --dev phpstan/phpstan-guzzle
```

And include `extension.neon` in your project's PHPStan config:

```
includes:
	- vendor/phpstan/phpstan-guzzle/extension.neon
```
