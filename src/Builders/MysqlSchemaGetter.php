<?php

namespace Fargonse\Annotate\Builders;

use Fargonse\Annotate\Builders\Interfaces\SchemaGetterInterface;
use Illuminate\Support\Collection;

class MysqlSchemaGetter implements SchemaGetterInterface
{
    public function getTableSchema( string $table ): Collection{
        // TODO: Add Support to Mysql Driver
        return collect(null);
    }
}