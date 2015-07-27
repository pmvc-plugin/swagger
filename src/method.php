<?php
namespace PMVC\PlugIn\swagger;

class method extends base 
{
    public function getDefault()
    {
        return array(
            'description'=>''
            ,'parameters'=>array()
            ,'security'=> array() 
            ,'responses'=> array()
            ,'summary'=> '' 
            ,'tags'=> array() 
        );
    }
}
