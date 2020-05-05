<?php

namespace Fargonse\Annotate\Traits;

use Illuminate\Support\Collection;

class ModelTableNameGetter
{
    /**
     * Get the table name from model
     *
     * @return  String
     */
    public static function getTableName( $model ): String
    {
        return ( new $model )->getTable();
    }

}
