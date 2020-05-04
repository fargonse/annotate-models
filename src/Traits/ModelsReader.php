<?php

namespace Fargonse\Annotate\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class ModelsReader
{
    /**
     * The Container Class
     */
    protected $container = null;


    /**
     * The FilesReader Class
     */
    protected $filesReader = null;

    /**
     * The FilesReader Class
     */
    protected $classNameBuilder = null;


    /**
     * Create a new ModelsReader instance
     *
     * @param   Class   $container
     * @param   String  $path
     * @return  void
     */
    public function __construct($container = null, $path = null)
    {
        $this->filesReader = new FilesReader( $path ?? app_path() );
        $this->classNameBuilder = new ClassNameBuilder( $container );
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
                return $this->classIsModel($class);
            });

        return $models->values();

    }


    /**
     * Determines if the class is a Eloquent Model Subclass $ it's not an abstract class
     *
     * @param   String  $class
     * @return  Bool
     */
    protected function classIsModel($class): Bool
    {
        $isValidModel = false;
        if (class_exists($class)) {
            $reflection = new \ReflectionClass($class);
            $isValidModel = $reflection->isSubclassOf(Model::class) &&
            !$reflection->isAbstract();
        }

        return $isValidModel;
    }

}
