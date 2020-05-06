<?php

namespace Fargonse\Annotate\Tests\Unit;

use Fargonse\Annotate\Traits\FileReader;
use Fargonse\Annotate\Tests\TestCase;

class FileReaderTest extends TestCase
{
    /** @test */
    public function getFilesFromPath()
    {
        $fileReader = new FileReader( 'tests/TestModels' );

        $files = $fileReader->getFilesFromPath();

        $this->assertCount(1, $files);
    }

}
