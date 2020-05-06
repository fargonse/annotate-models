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
        $string = self::generateStringFromTableSchema($tableSchema);
        
        return Str::of(self::getStringTemplate())->replace('{{STRING}}', $string);
    }

    protected static function generateStringFromTableSchema($tableSchema): String{
        $string = '';
        // * @property    $id                  Type: integer            Length:             Precision:          Nullable: FALSE     PK: TRUE       Default:            
        foreach ($tableSchema as $field) {
            $string .= ' * @property    ';
            $string .= str_pad('$' . $field["name"], 25);
            $string .= str_pad('Type: ' . $field["type"], 25);
            $string .= str_pad('Length: ' . $field["length"], 20);
            $string .= str_pad('Precision: ' . $field["precision"], 20);
            $string .= str_pad('Nullable: ' . $field["nullable"], 20);
            $string .= str_pad('PK: ' . $field["pk"], 15);
            $string .= str_pad('Default: ' . $field["default"], 20);
            $string .= "\n";
        }

        $string = Str::of($string)->rtrim("\n");

        return $string;
    }

    protected static function getStringTemplate(){
        $template = "/**\n";
        $template .= " * ANNOTATION:\n";
        $template .= " * \n";
        $template .= "{{STRING}}\n";
        $template .= " * \n";
        $template .= " * END ANNOTATION\n";
        $template .= "*/";

        return $template;
    }

}

