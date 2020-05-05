<?php

namespace Fargonse\Annotate\Builders;

use Fargonse\Annotate\Builders\Interfaces\SchemaGetterInterface;
use Illuminate\Support\Collection;

class PgsqlSchemaGetter implements SchemaGetterInterface
{
    public function getTableSchema( string $table ): Collection{
        // TODO: Add Support to Pgsql Driver
        return collect(null);
    }
}