<?php
namespace PMVC\PlugIn\swagger;

${_INIT_CONFIG}[_CLASS] = __NAMESPACE__.'\swagger';

class swagger extends \PMVC\PlugIn
{
    private $swagger;

    function get($k=null)
    {
        if(empty($this->swagger)){
            $this->swagger = new root();
        }
        return $this->swagger[$k];
    }

    function gen()
    {
        $arr = $this->get()->getArr();
        foreach ($arr as &$v) {
            if (\PMVC\isArrayAccess($v)) {
                $v = $v->getArr();
            }
        }
        return $arr;
    }

}
