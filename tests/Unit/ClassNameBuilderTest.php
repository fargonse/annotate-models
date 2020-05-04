<?php

namespace Fargonse\Annotate\Tests\Unit;

use Fargonse\Annotate\Traits\ClassNameBuilder;
use Illuminate\Support\Facades\File;
use Fargonse\Annotate\Tests\TestCase;

class ClassNameBuilderTest extends TestCase
{
    /** @test */
    public function buildClassFromFile()
    {
        $fakeContainer = ClassNameBuilderContainerFake::class;

        $classNameBuilder = new ClassNameBuilder( $fakeContainer );

        $class = $classNameBuilder->BuildClassNameFromFile( File::files('tests/TestModels')[0] );

        $this->assertEquals($class, '\\Fargonse\\Annotate\\Tests\\TestModels\\Test');
    }

}

class ClassNameBuilderContainerFake
{
    public static function getInstance(){
        return new ClassNameBuilderContainerInstance;
    }
}

class ClassNameBuilderContainerInstance{
    public function getNamespace(){
        return "Fargonse\\Annotate\\Tests\\TestModels\\";
    }
}
