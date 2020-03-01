<?php


namespace Rentit\Controllers;

use Rentit\Controller;

final class MasinfoController extends Controller
{
    public function __construct($request)
    {
        parent::__construct($request);
//        echo __CLASS__;
    }

    public function index(){
//        echo "hola";
//        $results["idInmueble"]= $this->request->getParams()["inmueble"];
        $results = $this->getInfo();
        $this->render($results,"");
    }
    public function getInfo()
    {
        $DB = $this->getDB();
        $idInmueble = $this->request->getParams()["inmueble"];
        $sql = "SELECT `titulo`, `lugar`, `publicat_data`, `contacte` FROM `Inmueble` WHERE `id`=:id";
        $stmt = $this->query($DB,$sql,array(':id' => $idInmueble));
        $result = $this->row_extract($stmt);

        $idUser = $result["contacte"];
        $sql = "SELECT nick,email FROM Users WHERE `id`=:id";
        $stmt = $this->query($DB,$sql,array(':id' => $idUser));
        $result2 = $this->row_extract($stmt);
        $resFinal = array_merge($result,$result2);
        return $resFinal;
    }

    public function getSingleResult()
    {
        // TODO: Implement getSingleResult() method.
    }

    public function getResults()
    {
        //aqui por ejemplo podriamos necesitar consulta a base de datos en caso de querer mostrar por ejemplo todos los inmubles
        // TODO: Implement getResults() method.
    }


}