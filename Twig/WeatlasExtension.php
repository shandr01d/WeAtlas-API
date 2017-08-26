<?php
namespace Shandra\WeatlasApiBundle\Twig;

use Shandra\WeatlasApiBundle\Service\WeatlasAPI;
use Twig_SimpleFunction;

class WeatlasExtension extends \Twig_Extension
{
    protected $environment;
    protected $api;
    
    public function initRuntime(\Twig_Environment $environment)
    {
        $this->environment = $environment;
    }
    
    public function __construct(WeatlasAPI $api)
    {
        $this->api = $api;
    }
    
    public function getName()
    {
        return 'weatlas_extension';
    }
    
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('WeatlasAPI', array($this, 'WeatlasAPI')),
            new \Twig_SimpleFunction('WeatlasSearch', array($this, 'WeatlasSearch')),
        );
    }
    
    public function WeatlasAPI($url, $params){
        return $this->api->makeRequest($url, $params);
    }
    
    public function WeatlasSearch($term){
        return $this->api->search($term);
    }
    
}

?>