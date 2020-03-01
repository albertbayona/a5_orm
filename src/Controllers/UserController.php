<?php


namespace Rentit\Controllers;


use Rentit\Controller;

final class UserController extends Controller
{
    public function __construct($request)
    {
        parent::__construct($request);
        //var_dump($this->request->params);
    }
    public function index(){
//        echo "hola";
        $results = $this->getResults();
        $results["hola"] ="hola";
        $this->render($results,"");
    }

    public function getSingleResult()
    {
        // TODO: Implement getSingleResult() method.
    }

    public function getResults()
    {
        // TODO: Implement getResults() method.
    }
}