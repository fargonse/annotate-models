<?php

namespace Fargonse\Annotate\Tests\Unit;

use Fargonse\Annotate\Traits\ModelTableNameGetter;
use Fargonse\Annotate\Tests\TestCase;

class ModelsProcessorTest extends TestCase
{
    /** @test */
    public function getTableName()
    {
        $tableNameGetter = new ModelTableNameGetter('\\Fargonse\\Annotate\\Tests\\TestModels\\Test');
        
        $this->assertEquals($tableNameGetter->getTableName(), 'tests');
    }

}