<?php

namespace Fargonse\Annotate\Tests\Unit;

use Fargonse\Annotate\Traits\ModelTableNameGetter;
use Fargonse\Annotate\Tests\TestCase;

class ModelTableNameGetterTest extends TestCase
{
    /** @test */
    public function getTableName()
    {
        $this->assertEquals(ModelTableNameGetter::getTableName('\\Fargonse\\Annotate\\Tests\\TestModels\\Test'), 'tests');
    }
}