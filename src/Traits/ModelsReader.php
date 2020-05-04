<?php

namespace Fargonse\Annotate\Traits;

use Illuminate\Support\Collection;

class ModelsReader
{
    /**
     * FilesReader Class - Get the file from directory
     */
    protected $filesReader = null;

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
        $this->filesReader = new FilesReader( $path );
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
        $models = $this->filesReader->getFilesFromPath()
            ->map(function ($file) {
                return $this->classNameBuilder->BuildClassNameFromFile($file);
            })
            ->filter(function ($class) {
                return $this->modelDeterminer->classIsModel($class);
            });

        return $models->values();

    }

}
