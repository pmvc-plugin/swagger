<?php
namespace PMVC\PlugIn\swagger;

class definitions extends base 
{
    public function offsetGet($k)
    {
        if (!isset($this[$k])) {
            $this->values[$k] = new definition();
        }
        return parent::offsetGet($k);
    }

    public function offsetSet($k, $v=null)
    {
        if (!is_object($v) || 'definition'!=get_class($v)) {
            trigger_error('input object not definition() '. print_r($v,true));
        }
        return parent::offsetSet($k,$v);
    }

    public function getDefault()
    {
        return null;
    }
}
