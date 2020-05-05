<?php

namespace Fargonse\Annotate\Tests\Unit;

use Fargonse\Annotate\Traits\ModelTableNameGetter;
use Fargonse\Annotate\Tests\TestCase;
use Fargonse\Annotate\Builders\SchemaGetterFactory;
use Illuminate\Support\Collection;

class ModelsProcessorTest extends TestCase
{
    /** @test */
    public function getTableName()
    {
        $this->assertEquals(ModelTableNameGetter::getTableName('\\Fargonse\\Annotate\\Tests\\TestModels\\Test'), 'tests');
    }

    /** @test */
    public function getSchemaGetterOfCurrentConnection()
    {
        $factory = new SchemaGetterFactory;

        $schemaGetter = $factory->getSchemaGetter();

        $this->assertInstanceOf(\Fargonse\Annotate\Builders\SqliteSchemaGetter::class, $schemaGetter);
    }

}

/*

class SchemaGetterTest implements \Fargonse\Annotate\Builders\Interfaces\SchemaGetterInterface{
    public function getTableSchema(string $table): Collection{
        return true;
    }
}
*/