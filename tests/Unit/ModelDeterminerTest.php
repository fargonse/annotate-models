<?php

namespace Fargonse\Annotate\Tests\Unit;

use Fargonse\Annotate\Traits\ModelDeterminer;
use Orchestra\Testbench\TestCase;

class ModelDeterminerTest extends TestCase
{
    /** @test */
    public function classIsModel()
    {
        $modelDeterminer = new ModelDeterminer;

        $isModel = $modelDeterminer->classIsModel('\\Fargonse\\Annotate\\Tests\\TestModels\\Test');

        $this->assertTrue($isModel);
    }

}
