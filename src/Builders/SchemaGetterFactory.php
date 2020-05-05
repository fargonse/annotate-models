<?php

namespace Fargonse\Annotate\Builders;

use DB;
use Str;

class SchemaGetterFactory
{
    protected $schemaGetter = null;

    public function __construct( \Fargonse\Annotate\Builders\Interfaces\SchemaGetterInterface $schemaGetter = null ){
        $className = "\\Fargonse\\Annotate\\Builders\\" . Str::title(DB::connection()->getDriverName()) . "SchemaGetter";
        
        $this->schemaGetter = $schemaGetter ?? new $className;
    }

    public function getSchemaGetter(){
        return $this->schemaGetter;
    }


}