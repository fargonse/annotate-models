<?php
namespace Fargonse\Annotate\Console;

use Illuminate\Console\Command;
use Fargonse\Annotate\Traits\ModelsReader;
use Fargonse\Annotate\Traits\ModelsProcessor;

class ProcessCommand extends Command
{
    protected $signature = "annotate:models";

    protected $description = 'Annotates the table structure in the corresponding model.';

    public function handle()
    {
        // Get all Models
        $models = ( new ModelsReader )->getAllModelsFromPath();

        //Annotate Models
        ( new ModelsProcessor($models) )->processModels();
    }
}
