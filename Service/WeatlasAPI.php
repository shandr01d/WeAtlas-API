<?php
namespace Shandra\WeatlasApiBundle\Service;

class WeatlasAPI
{
    public $aid;
    public $key;
    public $host = 'http://api.weatlas.com/';
    public $mode = 'json';
    public $lang = 'ru';
    
    public function __construct($aid, $key) {
        $this->aid = $aid;
        $this->key = $key;
    }
    
    public function makeRequest($url, array $params){
        $url = $this->host.$url;
        $params['aid'] = $this->aid;
        $params['key'] = $this->key;
        if(!isset($params['mode'])){
            $params['mode'] = $this->mode;
        }
        if(!isset($params['lang'])){
            $params['lang'] = $this->lang;
        }
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        $result = curl_exec($ch);
        curl_close($ch);
        if($params['mode'] == 'xml'){
            $xml = simplexml_load_string($result, 'SimpleXMLElement', LIBXML_NOCDATA);
            return $xml;
        }
        if($params['mode'] == 'json'){
            return json_decode($result);
        }
        return $result;
    }
    
    public function search($term){
        $url = 'http://b2b.weatlas.com/excursions/excursion/auto?term='.$term;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $result = json_decode(curl_exec($ch));
        curl_close($ch);
        return $result;
    }
}

?>