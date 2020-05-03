<?php

namespace Fargonse\Annotate\Tests\Unit;

use Fargonse\Annotate\Traits\ModelsReader;
use Orchestra\Testbench\TestCase;

class ModelsReaderTest extends TestCase
{
    /** @test */
    public function getAllModels()
    {
        $fakeContainer = \Fargonse\Annotate\Tests\Fakers\ContainerFake::class;

        $reader = new ModelsReader( $fakeContainer, 'tests' );

        $models = $reader->getAllModelsFromPath();

        $this->assertCount(1, $models);

        $this->assertEquals($models[0], '\\Fargonse\\Annotate\\Tests\\TestModels\\Test');
    }

}
