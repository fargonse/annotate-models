<?php

namespace Fargonse\Annotate\Traits;

class ClassNameBuilder
{
    /**
     * The Container Class to get de App Namespace
     */
    protected $container = null;

    /**
     * Create a new ModelsReader instance
     *
     * @param   Class   $container
     * @param   String  $path
     * @return  void
     */
    public function __construct($container = null)
    {
        $this->container = $container ?? \Illuminate\Container\Container::class;
    }

    /**
     * Returns class from specific file
     *
     * @param   String  $file
     * @return  String
     */
    public function BuildClassNameFromFile( $file ): String
    {
        $relativePathName = $file->getRelativePathName();

        $class = sprintf('\%s%s',
            $this->container::getInstance()->getNamespace(),
            strtr(
                substr($relativePathName, 0, strrpos($relativePathName, '.')),
                '/',
                '\\'
            )
        );

        return $class;

    }
}
