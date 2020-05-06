<?php

namespace Fargonse\Annotate\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;

class FileWriter
{
    /**
     * Write the content in the file
     *
     * @param   String  $filename
     * @param   String  $content
     * @return  void
     */
    public static function writeFile( $fileName, $content )
    {
        File::put( $fileName, $content );
    }

    public static function updateAnnotation( $fileName, $annotation )
    {
        $content = File::get($fileName);
        $exists = (0 !== preg_match("/\/\*\*\n \* ANNOTATION:\n/s", $content));

        /* If does not exist, we add a placeholder */
        if (!$exists) {
            $content = preg_replace('/<\?(php)?/', "<?php\n/**\n * ANNOTATION:\n * END ANNOTATION\n*/\n", $content, 1);
        }
        $content = preg_replace("/\/\*\*\n \* ANNOTATION:\n.*?END ANNOTATION\n\*\//s", $annotation, $content, 1);
        File::put($fileName, $content);
    }
}
