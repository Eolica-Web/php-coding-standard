<?php

declare(strict_types=1);

use Eolica\CodingStandard\Eolica;
use Symplify\EasyCodingStandard\Config\ECSConfig;

return ECSConfig::configure()
    ->withPaths([__DIR__.'/config', __DIR__.'/src', __DIR__.'/ecs.php'])
    ->withSets([Eolica::DEFAULT])
;
