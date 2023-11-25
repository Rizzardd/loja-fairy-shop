<?php
namespace Application\core;
class App
{
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $page404 = false;
    protected $params = [];

    //constructor method
    public function __construct()
    {

        $URL_ARRAY = $this->parseUrl();

        $this->getControllerFromUrl($URL_ARRAY);
        $this->getMethodFromUrl($URL_ARRAY);
        $this->getParamsFromUrl($URL_ARRAY);

        call_user_func_array([$this->controller, $this->method], $this->params);
    }
    public function parseUrl()
    {
        return $REQUEST_URI = explode('/', substr(filter_input(INPUT_SERVER, 'REQUEST_URI'), 1));
    }

    public function getControllerFromUrl($url)
    {
        if (!empty($url[0]) && isset($url[0])) {
            if (file_exists('../application/controllers/' . ucfirst($url[0]) . 'Controller.php')) {
                $this->controller = ucfirst($url[0]) . 'Controller';

            } else {
                $this->page404 = true;
            }

        }

        require_once '../application/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller();
    }
    private function getMethodFromUrl($url)
    {
        if(!empty($url[1]) && isset($url[1])){
            if(method_exists($this->controller, $url[1]) && !$this->page404){
                $this->method =$url[1];
            } else {
                $this->method = 'pageNotFound';
            }
        }
    }
    private function getParamsFromUrl($url) {
        if(count($url) > 2){
            $this->params = array_slice($url, 2);
        }
    }
}

?>