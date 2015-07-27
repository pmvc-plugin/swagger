<?php
namespace PMVC\PlugIn\swagger;

class path extends base 
{
    public function getDefault()
    {
        return array(
            '$ref'=> '', 
            'get'=> new method(),
            'put'=> new method(),
            'post'=> new method(),
            'delete'=> new method(),
            'options'=> new method(),
            'head'=> new method(),
            'patch'=> new method(),
            'parameters'=> array()
        );
    }

}
