<?php


namespace Rentit;


use mysql_xdevapi\Exception;

class App
{
//    public $routes=[];

    static function run(){
        //construir rutas rutas posibles solo dentro de la carpeta controllers

        $routes = self::getRoutes(); //devuelve un array de todas las rutas disponibles
        $request = new Request();
        $controller = $request->getController();
        $action = $request -> getAction();
//        echo $controller."<br>";
//        var_dump($routes);

        try{
            if (in_array($controller."controller",$routes)){


                $nameController= "\Rentit\Controllers\\".ucfirst($controller)."Controller";
    //        echo $nameController;
                $objCont = new $nameController($request);
//                var_dump($objCont);
                if (is_callable([$objCont,$action])){
                    call_user_func([$objCont,$action]);
                }else{
                    call_user_func([$objCont,"error"]);
                }
            }else{
                throw new \Exception("[ERROR]: ruta no definida");
            }
        }catch (\Exception $e){
            echo $e->getMessage();
        }





    }



    static function getRoutes(){
        $dir = __DIR__.'/Controllers';
        $handle = opendir($dir);
        while (false!= ($entry=readdir($handle))){
            if ($entry!="." && $entry!=".."){
                $routes[] = strtolower(substr($entry,0,-4));
            }
        }

        return $routes;
    }
    /*
    private function getArrayController(){
        $requestString=$_SERVER["REQUEST_URI"];
        $requestArr=explode("/",$requestString);
        array_shift($requestArr);
        if($requestArr[0]==""){
            $requestArr[0]= "Default";
            $requestArr[1] = "index";
            $controller = $requestArr[0];
            $method = $requestArr[1];
        }else{
            $controller= ucfirst($requestArr[0]);
            $method= $requestArr[1];
        }

        return [$controller,$method];
    }*/
}