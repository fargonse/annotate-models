<?php

namespace Fargonse\Annotate\Traits;

use Illuminate\Database\Eloquent\Model;

class ModelDeterminer
{
    /**
     * Determines if the class is a Eloquent Model Subclass $ it's not an abstract class
     *
     * @param   String  $class
     * @return  Bool
     */
    public function classIsModel( $class ): Bool
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
