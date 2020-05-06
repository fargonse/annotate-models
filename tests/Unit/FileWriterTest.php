<?php

namespace Fargonse\Annotate\Tests\Unit;

use Fargonse\Annotate\Traits\FileReader;
use Fargonse\Annotate\Traits\FileWriter;
use Fargonse\Annotate\Tests\TestCase;
use Illuminate\Support\Facades\File;

class FileWriterTest extends TestCase
{
    /** @test */
    public function annotate()
    {
        // get default content
        $defaultContent = $this->getDefaultModelContent();

        // get model file
        $fileReader = new FileReader( 'tests/TestModels' );
        $fileName = $fileReader->getFilesFromPath()[0]->getPathname();

        // set default content
        FileWriter::writeFile( $fileName, $defaultContent );

        // Assert
        $this->assertEquals(File::get( $fileName ), "<?php\nnamespace Fargonse\\Annotate\\Tests\\TestModels;\n\nuse Illuminate\Database\Eloquent\Model;\n\nclass Test extends Model\n{\n\n}");


        // create annotation
        $annotation = $this->getAnnotation();
        FileWriter::updateAnnotation( $fileName, $annotation );

        // Assert
        $expectedContent = '<?php
/**
 * ANNOTATION:
 * 
 * @property    $id                      Type: integer            Length:             Precision:          Nullable: false     PK: true       Default:            
 * @property    $name                    Type: varchar            Length: 255         Precision:          Nullable: true      PK: false      Default: null       
 * @property    $created_at              Type: datetime           Length:             Precision:          Nullable: true      PK: false      Default: null       
 * 
 * END ANNOTATION
*/

namespace Fargonse\\Annotate\\Tests\\TestModels;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{

}';
        $this->assertEquals(File::get( $fileName ), $expectedContent);
        
        // update annotation
        $annotation = $this->getUpdatedAnnotation();
        FileWriter::updateAnnotation( $fileName, $annotation );

        // Assert
                $expectedContent = '<?php
/**
 * ANNOTATION:
 * 
 * @property    $id                      Type: integer            Length:             Precision:          Nullable: false     PK: true       Default:            
 * @property    $name                    Type: varchar            Length: 255         Precision:          Nullable: true      PK: false      Default: null       
 * @property    $description             Type: text               Length: 8000        Precision:          Nullable: true      PK: false      Default: null       
 * @property    $created_at              Type: datetime           Length:             Precision:          Nullable: true      PK: false      Default: null       
 * @property    $updated_at              Type: datetime           Length:             Precision:          Nullable: true      PK: false      Default: null       
 * 
 * END ANNOTATION
*/

namespace Fargonse\\Annotate\\Tests\\TestModels;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{

}';
        $this->assertEquals(File::get( $fileName ), $expectedContent);

        // set default content
        FileWriter::writeFile( $fileName, $defaultContent );

        // Assert
        $this->assertEquals(File::get( $fileName ), "<?php\nnamespace Fargonse\\Annotate\\Tests\\TestModels;\n\nuse Illuminate\Database\Eloquent\Model;\n\nclass Test extends Model\n{\n\n}");
    }


    protected function getDefaultModelContent(){
        $modelContent = "";
        $modelContent .= "<?php\n";
        $modelContent .= "namespace Fargonse\\Annotate\\Tests\\TestModels;\n\n";
        $modelContent .= "use Illuminate\Database\Eloquent\Model;\n\n";
        $modelContent .= "class Test extends Model\n";
        $modelContent .= "{\n";
        $modelContent .= "\n";
        $modelContent .= "}";
    
        return $modelContent;
    }
    
    protected function getAnnotation(){
        return '/**
 * ANNOTATION:
 * 
 * @property    $id                      Type: integer            Length:             Precision:          Nullable: false     PK: true       Default:            
 * @property    $name                    Type: varchar            Length: 255         Precision:          Nullable: true      PK: false      Default: null       
 * @property    $created_at              Type: datetime           Length:             Precision:          Nullable: true      PK: false      Default: null       
 * 
 * END ANNOTATION
*/';
    }

    protected function getUpdatedAnnotation(){
        return '/**
 * ANNOTATION:
 * 
 * @property    $id                      Type: integer            Length:             Precision:          Nullable: false     PK: true       Default:            
 * @property    $name                    Type: varchar            Length: 255         Precision:          Nullable: true      PK: false      Default: null       
 * @property    $description             Type: text               Length: 8000        Precision:          Nullable: true      PK: false      Default: null       
 * @property    $created_at              Type: datetime           Length:             Precision:          Nullable: true      PK: false      Default: null       
 * @property    $updated_at              Type: datetime           Length:             Precision:          Nullable: true      PK: false      Default: null       
 * 
 * END ANNOTATION
*/';
    }
}
