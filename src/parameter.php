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
            'required'=>false,
            'description'=>'',
            'schema'=>''
        );
    }


    public function getArr()
    {
        if ('path'===$this['in']) {
            $this['required'] = true;
        }
        return parent::getArr();
    }
}
