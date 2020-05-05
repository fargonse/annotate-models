<?php

namespace Fargonse\Annotate\Tests\Unit;

use Fargonse\Annotate\Traits\ModelTableNameGetter;
use Fargonse\Annotate\Traits\ModelSchemaAnnotationGenerator;
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



    public function convertTableSchemaToString()
    {
        $schemaGetter = new SchemaGetterTest;

        $tableSchema = $schemaGetter->getTableSchema( 'test_table' );

        $modelAnnotation = ModelSchemaAnnotationGenerator::generateAnnotationFromTableSchema( $tableSchema );

        $expectedAnnotation = '/**
 * ANNOTATION:
 * 
 * @property    $id                  Type: integer            Length:            Precision:          Nullable: FALSE     PK: TRUE      Default:
 * @property    $name                Type: varchar            Length: 255        Precision:          Nullable: TRUE      PK: FALSE     Default: NULL
 * @property    $created_at          Type: datetime           Length:            Precision:          Nullable: TRUE      PK: FALSE     Default: NULL
 * 
 * END ANNOTATION
*/';
        $this->assertEquals($expectedAnnotation, $modelAnnotation);
        
    }

}

/**
 * ANNOTATION:
 * 
 * @property    $id                  Type: integer            Length:            Precision:          Nullable: FALSE     PK: TRUE      Default:
 * @property    $name                Type: varchar            Length: 255        Precision:          Nullable: TRUE      PK: FALSE     Default: NULL
 * @property    $created_at          Type: datetime           Length:            Precision:          Nullable: TRUE      PK: FALSE     Default: NULL
 * 
 * END ANNOTATION
*/

class SchemaGetterTest implements \Fargonse\Annotate\Builders\Interfaces\SchemaGetterInterface{
    public function getTableSchema(string $table): Collection{
        $tableStructure = [
            [
                "name" => "id",
                "type" => "integer",
                "length" => "",
                "precision" => "null",
                "nullable" => "false",
                "pk" => "true",
                "default" => "",
            ],
            [
                "name" => "name",
                "type" => "varchar",
                "length" => "255",
                "precision" => "null",
                "nullable" => "true",
                "pk" => "false",
                "default" => "null",
            ],
            [
                "name" => "created_at",
                "type" => "datetime",
                "length" => "",
                "precision" => "",
                "nullable" => "true",
                "pk" => "false",
                "default" => "null",
            ]
        ];

        return collect($tableStructure);
    }
}