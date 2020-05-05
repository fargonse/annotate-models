<?php

namespace Fargonse\Annotate\Tests\Unit;

use Fargonse\Annotate\Traits\ModelsReader;
use Fargonse\Annotate\Tests\TestCase;

class ModelsReaderTest extends TestCase
{
    /** @test */
    public function getAllModels()
    {
        $fakeContainer = ModelsContainerFake::class;

        $reader = new ModelsReader( $fakeContainer, 'tests' );

        $models = $reader->getAllModelsFromPath();

        $this->assertCount(1, $models);

        $this->assertArrayHasKey( "file", $models[0] );

        $this->assertArrayHasKey( "class", $models[0] );
        
        $this->assertEquals($models[0]["class"], '\\Fargonse\\Annotate\\Tests\\TestModels\\Test');
    }

}

class ModelsContainerFake
{
    public static function getInstance(){
        return new ModelsContainerInstance;
    }
}

class ModelsContainerInstance{
    public function getNamespace(){
        return "Fargonse\\Annotate\\Tests\\";
    }
}