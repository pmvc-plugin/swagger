<?php
namespace PMVC\PlugIn\swagger;

abstract class base extends \PMVC\HashMap
{


    public function __construct($values=array())
    {
        parent::__construct($values);
        if ( !count($this) ) {
            $this->mergeDefault();
        }
    }

    public function offsetGet($k = null)
    {
        if (!is_null($k) && !$this->verify($k)) {
            return false;
        }
        return parent::offsetGet($k);
    }

    public function offsetSet($k, $v=null)
    {
        if (!$this->verify($k)) {
            return false;
        }
        return parent::offsetSet($k, $v);
    }

    public function verify($k)
    {
        $default = $this->getDefault();
        if ($default && !isset($default[$k])) {
            trigger_error('key: '. $k. ' not exists in '.get_class($this));
            return false;
        }
        return true;
    }


    public function mergeDefault($inputs=array())
    {
        if ( empty($this->getDefault()) ) {
            return;
        }
        if (!\PMVC\isArray($inputs)) {
            $inputs = array();
        }
        $arr = \PMVC\mergeDefault(
            $this->getDefault(),
            $inputs
        );
        \PMVC\set($this,$arr);
    }

    public function getArr()
    {
        foreach ($this as $k=>$v) {
            if (\PMVC\isArrayAccess($v)) {
                $ref = $this->{$k};
                $v = $ref($v->getArr());
            }
            if (0!==$v && false!==$v && empty($v)) {
                unset($this[$k]);
            }
        }
        return \PMVC\get($this);
    }

    abstract public function getDefault();
}
