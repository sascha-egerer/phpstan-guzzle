# Guzzle extensions for PHPStan

**This extension is deprecated, because since PHPStan 0.8 `@method` annotations are read including method parameters, making this extension obsolete. Guzzle HTTP client can now be used without any special extension.**

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
