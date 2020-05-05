<?php

namespace Fargonse\Annotate\Builders;

use Fargonse\Annotate\Builders\Interfaces\SchemaGetterInterface;
use Illuminate\Support\Collection;

class SqliteSchemaGetter implements SchemaGetterInterface
{
    public function getTableSchema( string $table ): Collection{
        // TODO: Add Support to Sqlite Driver
        return collect(null);
    }
}