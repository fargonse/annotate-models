<?php

namespace Fargonse\Annotate\Tests\Fakers;


class ContainerFake
{
    public static function getInstance(){
        return new Instance;
    }
}

class Instance{
    public function getNamespace(){
        return "Fargonse\\Annotate\\Tests\\";
    }
}