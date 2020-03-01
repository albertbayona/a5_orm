<?php


namespace Rentit\Controllers;


use Rentit\Controller;

final class AlquilerController extends Controller
{
    public function index($error = ""){
//        echo "hola";
        $results = $this->getResults();

        if (isset($_SESSION["user"])){
            $results["user"] = $_SESSION["user"];
        }else{
            $results["formLogin"]=1;
        }
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
    public function publicar(){
        //        print_r($_POST);

        $DB = $this->getDB();
        if(empty($_POST["titulo"]) || empty($_POST["lugar"])){
            header('Location: /alquiler');
            die();
        }

        $titulo =filter_var($_POST["titulo"],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $lugar =filter_var($_POST["lugar"],FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        date_default_timezone_set(date_default_timezone_get());
        $date = date('Y/m/d h:i:s', time());
        $sql = "INSERT INTO `Inmueble`(`titulo`, `lugar`, `publicat_data`, `contacte`) VALUES ('".$titulo."','".$lugar."','".$date."',".$_SESSION["id"].")";

        $stmt =$this->query($DB,$sql);
        print_r($stmt);




        header('Location: /');

        die();
    }
}