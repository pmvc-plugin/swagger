<?php
namespace PMVC\PlugIn\swagger;

class paths extends base 
{
    public function getDefault()
    {
        return array(
            'description'=>null
            ,'parameters'=>null
            ,'security'=> null 
            ,'responses'=> array ( 
                '200' => array(
                    'description'=>'success'
                )
            )
            ,'summary'=> null
            ,'tags'=> null
        );
    }
}
