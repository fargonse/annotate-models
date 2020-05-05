<?php

namespace Fargonse\Annotate\Traits;

use Illuminate\Support\Collection;

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
        foreach ($this->models as $model) {
            $table = (new ModelTableNameGetter( $model["class"] ))->getTableName();
        }
        /*
            foreach models{
                tabla = ObtenerTabla(model) ==> OK
                estructura = ObtenerEstructura(tabla)
                descripcion = ConvertirEstructuraATexto( estructura )
                ActualizarArchivoModelo( descripcion )
            }
        */
    }

}
