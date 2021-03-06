<?php
namespace PMVC\PlugIn\swagger;

class paths extends base 
{
    public function getDefault()
    {
        return null;
    }

    public function offsetGet($k=null)
    {
        if (!is_null($k) && !isset($this[$k])) {
            $this[$k] = new path();
        }
        return parent::offsetGet($k);
    }

    public function offsetSet($k, $v=null)
    {
        if (!is_object($v) || __NAMESPACE__.'\path' !== get_class($v)) {
            trigger_error('input object not path() '. print_r($v,true));
        }
        return parent::offsetSet($k,$v);
    }

    public function getArr()
    {
        $this->parseParametersType();
        return parent::getArr();
    }

    public function parseParametersType()
    {
        $definitions = \PMVC\plug('swagger')->get('definitions'); 
        foreach ($this as $path) {
            foreach ($path as $method) {
                if (!empty($method['tags'])) {
                    if (empty($method['responses'])) {
                        $method['responses'] = array ( 
                            '200' => array(
                                'description'=>'success'
                            )
                        );
                    }
                }
                if (empty($method['parameters'])) {
                    continue;
                }
                foreach ($method['parameters'] as $k=>$param) {
                    if (isset($definitions[$param['type']])) {
                        $param['schema'] = array(
                            '$ref'=>'#/definitions/'.$param['type']
                        );
                        unset($param['type']);
                        $method['parameters'][$k] = $param; 
                    }
                }
            }
        }
    }
}
