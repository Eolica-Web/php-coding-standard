# Eolica's PHP Easy Coding Standard configuration

This is an opinionated PHP linting and code style configuration package for [Easy Coding Standard](https://github.com/easy-coding-standard/easy-coding-standard)

## Installation

You can install the package via [Composer](https://getcomposer.org/):

``` sh
composer require --dev eolica/coding-standard
```

## Usage

Add the default set to your `ecs.php` file:

``` php
<?php

declare(strict_types=1);

use Eolica\CodingStandard\Eolica;
use Symplify\EasyCodingStandard\Config\ECSConfig;

return ECSConfig::configure()
    ->withSets([Eolica::DEFAULT]);
```

You can test it by executing the following command:

``` sh
./vendor/bin/ecs check
```
