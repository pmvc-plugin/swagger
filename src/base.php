<?php
namespace PMVC\PlugIn\swagger;

abstract class base extends \PMVC\HashMap
{

    public function offsetGet($k)
    {
        if (!$this->verify($k)) {
            return false;
        }
        return parent::offsetGet($k, $v);
    }

    public function offsetSet($k, $v=null)
    {
        if (!$this->verify($k)) {
            return false;
        }
        return parent::offsetSet($k, $v);
    }

    public function verify()
    {
        $default = $this->getDefault();
        if (!isset($default[$k])) {
            trigger_error('key: '. $k. 'not exists in '.get_class($this));
            return false;
        }
        return true;
    }

    public function mergeDefault($inputs)
    {
        $arr = \PMVC\mergeDefault(
            $this->getDefault(),
            $inputs
        );
        \PMVC\set($this,$arr);
    }

    public function getArr()
    {
        return $this->values();     
    }

    abstract public function getDefault();
}
