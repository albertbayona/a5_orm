<?php


namespace App\Controllers;

use http\Exception;
use App\Controller;
use App\Models\Oferta;

final class DefaultController extends Controller
{
    public function __construct($request)
    {
        parent::__construct($request);
//        echo __CLASS__;
    }

    public function index($error = ""){
        $results = array();
        $results["ofertas"] = $this->cargarOfertas();
        $this->render($results,"");
    }


    public function borrasession(){
        session_unset();
        session_destroy();
        header('Location: /');
    }

    private function cargarOfertas(){
        $ofertas = Oferta::all();

        return $ofertas;

    }

}