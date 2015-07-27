<?php
namespace PMVC\PlugIn\swagger;

${_INIT_CONFIG}[_CLASS] = __NAMESPACE__.'\swagger';

class swagger extends \PMVC\PlugIn
{
    protected $swagger;

    function init()
    {
        $this->swagger = new root();
    }

    function get($k=null)
    {
        if (is_null($k)) {
            return $this->swagger;
        }
        return $this->swagger[$k];
    }

    function gen()
    {
        return $this->get()->getArr();
    }

    public function setInfo($title, $version='1.0')
    {
        $this->swagger['info'] = array(
            'title'=>$title,
            'version'=>$version
        );
        return $this;
    }

    public function setUrl($url)
    {
        $uri = parse_url($url);
        $this->swagger['host']=$uri['host'];
        $this->swagger['schemes']=array($uri['scheme']);
        $this->swagger['basePath']=$uri['path'];
        return $this;
    }

    /**
     *    {
     *        type: "apiKey",
     *        name: "api_key",
     *        in: "header"
     *    }
     */
    public function setSecurity($key,$arr)
    {
        $this->swagger['securityDefinitions'][$key] = $arr;
        return $this;
    }
}
