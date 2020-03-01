<?php


namespace App;


class Request
{
    private $controller;
    private $action;
    private $method;
    private $params;

    protected $arrURI;

    function __construct()
    {
        $requestString = htmlentities($_SERVER["REQUEST_URI"]);
        $this -> arrURI = explode("/",$requestString);
        array_shift($this->arrURI);
        $this->extractURI();
        //$this->setMethod($this->getMethod());
//        var_dump($this->arrURI);
        //var_dump($this->controller);
//        var_dump($this->action);
//        var_dump($this->method);
//        var_dump($this->params);
//        situaciones
    /*
     * arrURI=
     * 1->[""]
     * 2->["controlador"]
     * 3->["controlador","accion"]
     * 4->["controlador","accion",["p"=>"1","d"=>"2"]]
     *
     * */
    }
    private function extractURI(){
        $length = count ($this->arrURI);
        switch ($length){
            case 1:
                if ($this->arrURI[0] == ""){
                    $this->setController("default");
                }else{
                    $this->setController($this->arrURI[0]);
                }
                $this->setAction("index");//es la por defecto
                break;
            case 2:
                $this->setController($this->arrURI[0]);
                if ($this->arrURI[1] == ""){
                    $this->setAction("index");
                }else{
                    $this->setAction($this->arrURI[1]);
                }
                break;

            default:
                $this->setController($this->arrURI[0]);
                $this->setAction($this->arrURI[1]);
                if(count($this->arrURI)>2){

                    $this->Params();
                }
                break;
        }
        $this->setMethod($this->getMethod());
    }
    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @param mixed $controller
     */
    public function setController($controller)
    {
        $this->controller = $controller;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param mixed $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return htmlentities($_SERVER["REQUEST_METHOD"]);
    }

    /**
     * @param mixed $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param mixed $params
     */
    public function setParams($params)
    {
        $this->params = $params;
    }
    private function Params()
    {
//        var_dump($param);
//        pasamos un array donde los impares son key y los pares values
        array_shift($this->arrURI);
        array_shift($this->arrURI);
        $param = $this->arrURI;
        $i=0;
        $key ="";
        if(count($param)%2==0){
            foreach ( $param as $val) {
                if ($i%2==0){
                    //key
                    $key = $val;
                }else{
                    $params[$key]=$val;
                }
                $i++;
            }
            $this->params = $params;
        }
    }


}