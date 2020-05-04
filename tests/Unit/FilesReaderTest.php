<?php

namespace Fargonse\Annotate\Tests\Unit;

use Fargonse\Annotate\Traits\FilesReader;
use Orchestra\Testbench\TestCase;

class FilesReaderTest extends TestCase
{
    /** @test */
    public function getFilesFromPath()
    {
        $fileReader = new FilesReader( 'tests/TestModels' );

        $files = $fileReader->getFilesFromPath();

        $this->assertCount(1, $files);
    }

}