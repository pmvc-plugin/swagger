<?php
namespace PMVC\PlugIn\swagger;

class parameter extends base 
{
    public function getDefault()
    {
        return array(
            'type'=>'',
            'name'=>'',
            'in'=>'',
            'required'=>'',
            'schema'=>''
        );
    }
}
