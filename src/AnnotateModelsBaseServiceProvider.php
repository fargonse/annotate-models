<?php
namespace Fargonse\Annotate;

use Illuminate\Support\ServiceProvider;

class AnnotateModelsBaseServiceProvider extends ServiceProvider
{
    public function boot()
    {

    }

    public function register()
    {
        $this->commands([
            Console\ProcessCommand::class,
        ]);
    }

}
