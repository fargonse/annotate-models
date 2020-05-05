<?php

namespace Fargonse\Annotate\Traits;

use Illuminate\Support\Collection;

class ModelTableNameGetter
{
    /**
     * Get table from
     */
    protected $model = null;

    /**
     * Create a new ModelTableNameGetter instance
     *
     * @param   String   $model
     * @return  void
     */
    public function __construct( $model )
    {
        $this->model = new $model;
    }


    /**
     * Get the table name from model
     *
     * @return  String
     */
    public function getTableName(): String
    {
        return $this->model->getTable();
    }

}
