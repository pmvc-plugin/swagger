<?php
namespace PMVC\PlugIn\swagger;

class root extends base 
{

    public function offsetSet($k, $v=null)
    {
        $default = $this->getDefault();
        if (!isset($default[$k])) {
            trigger_error('key: '. $k. 'not exists in root');
        }
        parent::offsetSet($k, $v);
    }

    public function mergeDefault($inputs)
    {
        $arr = \PMVC\mergeDefault(
            $this->getDefault(),
            $inputs
        );
        \PMVC\set($this,$arr);
    }

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
           'definitions'=>new definitions()
        );
    }
}
