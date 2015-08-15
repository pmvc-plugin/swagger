<?php
namespace PMVC\PlugIn\swagger;

class root extends base 
{

    public function getDefault()
    {
        return array(
           'swagger'=>'2.0',
           'consumes'=>array(
                'application/json'
            ),
           'produces'=>array(
                'application/json'
            ),
           'paths'=>new paths(),
           'definitions'=>new definitions(),
           'host'=>'',
           'schemes'=>'',
           'basePath'=>'',
           'info'=>array(),
           'tags'=>new tags(),
           'securityDefinitions'=>new securityDefinitions()
        );
    }

}
