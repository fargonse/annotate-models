<?php
namespace Fargonse\Annotate\Console;

use Illuminate\Console\Command;
use Fargonse\Annotate\Traits\ModelsReader;

class ProcessCommand extends Command
{
    protected $signature = "annotate:models";

    protected $description = 'Annotates the table structure in the corresponding model.';

    public function handle()
    {
        
    }
}
