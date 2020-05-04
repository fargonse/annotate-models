<?php

namespace Fargonse\Annotate\Tests;

use Fargonse\Annotate\AnnotateModelsBaseServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * Get package providers.
     * 
     * @param \Illuminate\Foundation\Application    $app
     * 
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            AnnotateModelsBaseServiceProvider::class,
        ];
    }
}
