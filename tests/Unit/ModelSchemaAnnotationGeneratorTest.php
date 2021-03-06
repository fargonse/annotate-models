<?php

namespace Fargonse\Annotate\Tests\Unit;

use Fargonse\Annotate\Traits\ModelSchemaAnnotationGenerator;
use Fargonse\Annotate\Tests\TestCase;
use Illuminate\Support\Collection;

class ModelSchemaAnnotationGeneratorTest extends TestCase
{
    /** @test */
    public function convertTableSchemaToString()
    {
        $schemaGetter = new SchemaGetterTest;

        $tableSchema = $schemaGetter->getTableSchema( 'test_table' );

        $modelAnnotation = ModelSchemaAnnotationGenerator::generateAnnotationFromTableSchema( $tableSchema );

        $expectedAnnotation = '/**
 * ANNOTATION:
 * 
 * @property    $id                      Type: integer            Length:             Precision:          Nullable: false     PK: true       Default:            
 * @property    $name                    Type: varchar            Length: 255         Precision:          Nullable: true      PK: false      Default: null       
 * @property    $created_at              Type: datetime           Length:             Precision:          Nullable: true      PK: false      Default: null       
 * 
 * END ANNOTATION
*/';
        $this->assertEquals($expectedAnnotation, $modelAnnotation);
        
    }

}

class SchemaGetterTest implements \Fargonse\Annotate\Builders\Interfaces\SchemaGetterInterface{
    public function getTableSchema(string $table): Collection{
        $tableStructure = [
            [
                "name" => "id",
                "type" => "integer",
                "length" => "",
                "precision" => "",
                "nullable" => "false",
                "pk" => "true",
                "default" => "",
            ],
            [
                "name" => "name",
                "type" => "varchar",
                "length" => "255",
                "precision" => "",
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