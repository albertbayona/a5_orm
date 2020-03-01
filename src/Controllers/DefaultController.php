<?php


namespace Rentit\Controllers;

use http\Exception;
use Rentit\Controller;

final class DefaultController extends Controller
{
    public function __construct($request)
    {
        parent::__construct($request);
//        echo __CLASS__;
    }

    public function index($error = ""){
//        echo "hola";
        $results = array();
        $results["inmuebles"] = $this->cargarinmuebles();
        $results["error"]=$error;
        if (isset($_SESSION["user"])){
            $results["user"] = $_SESSION["user"];
        }else{
            $results["formLogin"]=1;
        }
        $this->render($results,"");
    }




    public function login(){
        //$sql = $mdb->prepare("SELECT user,pass,admin FROM users WHERE user=:user AND pass=:pass");
        $DB = $this->getDB();
        if(empty($_POST["user"]) || empty($_POST["pass"])){
            header('Location: /');
            die();
        }

        $user =filter_var($_POST["user"],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $pass =filter_var($_POST["pass"],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $sql = "SELECT id,nick,pass FROM Users WHERE nick='".$user."'";

        $stmt = $this->query($DB,$sql);
        $fila = $this->row_extract($stmt);
        $vpass = $fila["pass"];
        $iduser = $fila["id"];

        if(password_verify($pass,$vpass)){

            session_start();
            $_SESSION["user"] = $user;
            $_SESSION["id"] = $iduser;
            $_SESSION["com"] = 0;
            $_SESSION["ven"] = 0;
            $sql = "SELECT idRol,idUser FROM User_rol WHERE idUser='".$iduser."'";
            $stmt = $this->query($DB,$sql);
            $filas = $this->rows_extract($stmt);

            if(count($filas)>0){
                foreach ($filas as $permiso){
                    if($permiso["idRol"]==3){
                        $_SESSION["ven"] = 1;

                    }
                    if($permiso["idRol"]==4){
                        $_SESSION["com"] = 1;

                    }
                }
            }
            header('Location: /');
        }else{
            header('Location: /default/errorlogin');
        }
    }

    public function errorlogin(){
        $error = "<p>Error en la contraseña</p>";
        $this->index($error);
    }


    public function borrasession(){
        session_unset();
        session_destroy();
        header('Location: /');
    }

    private function cargarinmuebles(){
        $DB = $this->getDB();
        $sql = "SELECT id,titulo,lugar FROM Inmueble";
        $stmt = $this->query($DB,$sql);
        $filas = $this->rows_extract($stmt);
        $html = "<table>";
        $html .= "<tr>";
        $i=0;//para que al entrar empieze por 0

        $mas_info = "";
        foreach ($filas as $inmueble){
            $i++;
            if ($i==0){
                $html .= "<tr>";
            }

            if(isset($_SESSION["com"]) && $_SESSION["com"]==1){
                $mas_info = "<br><a href='/masinfo/index/inmueble/".$inmueble["id"]."'>Més info</a>";
            }

            $html .= "<td>Titol: ".$inmueble["titulo"]."<br>Lloc: ".$inmueble["lugar"].$mas_info."</td>";
            if ($i==4){
                $html .= "</tr>";
                $i=0;
            }
        }

        $html .= "</table>";
        return $html;

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