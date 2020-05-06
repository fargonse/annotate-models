<?php

namespace Fargonse\Annotate\Traits;

use Illuminate\Support\Collection;

class ModelsReader
{
    /**
     * FileReader Class - Get the file from directory
     */
    protected $fileReader = null;

    /**
     * ClassNameBuilder Class - Builds the name of the class from a filename
     */
    protected $classNameBuilder = null;


    /**
     * Class that determines if class it's a Eloquent Model
     */
    protected $modelDeterminer = null;

    /**
     * Create a new ModelsReader instance
     *
     * @param   Class   $container
     * @param   String  $path
     * @return  void
     */
    public function __construct($container = null, $path = null)
    {
        $this->fileReader = new FileReader( $path );
        $this->classNameBuilder = new ClassNameBuilder( $container );
        $this->modelDeterminer = new ModelDeterminer();
    }


    /**
     * Returns all models from specific path
     *
     * @return  Collection
     */
    public function getAllModelsFromPath(): Collection
    {
        $models = $this->fileReader->getFilesFromPath()
            ->map(function ($file) {
                return [
                    "file" => $file,
                    "class" => $this->classNameBuilder->BuildClassNameFromFile($file)
                ];
            })
            ->filter(function ($item) {
                return $this->modelDeterminer->classIsModel($item["class"]);
            });

        return $models->values();

    }

}
