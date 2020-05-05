<?php

namespace Fargonse\Annotate\Traits;

use Illuminate\Support\Collection;
use Str;

class ModelSchemaAnnotationGenerator
{
    /**
     * Get the table name from model
     *
     * @return  String
     */
    public static function generateAnnotationFromTableSchema( $tableSchema ): String
    {
        // * @property    $id                  Type: integer            Length:            Precision:          Nullable: FALSE     PK: TRUE      Default:
        $string = self::generateStringFromTableSchema($tableSchema);
        return '/**
 * ANNOTATION:
 * 
' . $string . '
 * 
 * END ANNOTATION
*/';
    }

    protected static function generateStringFromTableSchema($tableSchema): String{
        

        return " * ESQUEMA EN STRING";
    }

}

