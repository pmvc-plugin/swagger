<?php
namespace PMVC\PlugIn\swagger;

class tags extends base 
{
    public function offsetGet($k=null)
    {
        if (!is_null($k) && !isset($this[$k])) {
            $this[$k] = new tag();
        }
        return parent::offsetGet($k);
    }

    public function offsetSet($k, $v=null)
    {
        if (!is_object($v) || __NAMESPACE__.'\tag' !== get_class($v)) {
            trigger_error('input object not tag() '. print_r($v,true));
        }
        return parent::offsetSet($k,$v);
    }

    public function getDefault()
    {
        return null;
    }
}
