<?php

namespace Fargonse\Annotate\Traits;

use Illuminate\Support\Collection;
use Fargonse\Annotate\Builders\SchemaGetterFactory;

class ModelsProcessor
{
    /**
     * Models to process
     */
    protected $models = null;

    /**
     * Create a new ModelsProcessor instance
     *
     * @param   Collection   $models
     * @return  void
     */
    public function __construct( $models )
    {
        $this->models = $models;
    }


    /**
     * Process all models
     *
     * @return  void
     */
    public function processModels()
    {
        $schemaGetter = ( new SchemaGetterFactory )->getSchemaGetter();

        foreach ($this->models as $model) {
            $table = ModelTableNameGetter::getTableName( $model["class"] );

            $tableSchema = $schemaGetter->getTableSchema( $table );

            $modelAnnotation = ModelSchemaAnnotationGenerator::generateAnnotationFromTableSchema( $tableSchema );
        }
        /*
            foreach models{
                tabla = ObtenerTabla(model) ==> OK
                estructura = ObtenerEstructura(tabla) ==> TODO
                descripcion = ConvertirEstructuraATexto( estructura ) ==> OK
                ActualizarArchivoModelo( descripcion )
            }
        */
    }

}
