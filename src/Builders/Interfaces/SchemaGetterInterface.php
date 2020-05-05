<?php


namespace Fargonse\Annotate\Builders\Interfaces;

use Illuminate\Support\Collection;

interface SchemaGetterInterface
{
    public function getTableSchema(string $table): Collection;
}