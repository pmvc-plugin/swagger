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
        if ('path'===$this->values['in']) {
            $this->values['required'] = true;
        }
        return parent::getArr();
    }
}
