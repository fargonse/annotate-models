<?php

namespace Fargonse\Annotate\Tests\Unit;

use Fargonse\Annotate\Tests\TestCase;
use Fargonse\Annotate\Builders\SchemaGetterFactory;

class SchemaGetterFactoryTest extends TestCase
{
    /** @test */
    public function getSchemaGetterOfCurrentConnection()
    {
        $factory = new SchemaGetterFactory;

        $schemaGetter = $factory->getSchemaGetter();

        $this->assertInstanceOf(\Fargonse\Annotate\Builders\SqliteSchemaGetter::class, $schemaGetter);
    }
}