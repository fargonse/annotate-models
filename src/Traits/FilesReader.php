<?php

namespace Fargonse\Annotate\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;

class FilesReader
{
    /**
     * Path to find files
     */
    protected $path = null;

    
    /**
     * Create a new FilesReader instance
     *
     *
     * @param   String  $path
     * @return  void
     */
    public function __construct($path = null)
    {
        $this->path = $path ?? app_path();
    }


    /**
     * Returns all files from specific path
     *
     * @param   String  $path
     * @return  Collection
     */
    public function getFilesFromPath(): Collection
    {
        return collect(File::allFiles($this->path));
    }



}
