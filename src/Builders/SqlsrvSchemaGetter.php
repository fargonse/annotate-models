<?php

namespace Fargonse\Annotate\Builders;

use Fargonse\Annotate\Builders\Interfaces\SchemaGetterInterface;
use Illuminate\Support\Collection;

class SqlsrvSchemaGetter implements SchemaGetterInterface
{
    public function getTableSchema( string $table ): Collection{
        // TODO: Add Support to Sqlsrv Driver
        return collect(null);
    }
}