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
        dd( $this->models );
        /*
            foreach models{
                tabla = ObtenerTabla(model)
                estructura = ObtenerEstructura(tabla)
                descripcion = ConvertirEstructuraATexto( estructura )
                ActualizarArchivoModelo( descripcion )
            }
        */
    }

}
