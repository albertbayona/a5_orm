<?php


namespace App;


abstract class Controller implements View
{
    protected $request;
    function __construct($request)
    {
        $this->request=$request;
    }

    function error($error = "[ERROR::]:Non existent method"){
        throw new \Exception($error);
    }

    function render(array $dataview=null,string $template=null)
    {
        if ($dataview) {
            extract($dataview);//combierte en variables las posiciones de un array assoc
            //marca
            if ($template != "") {
                include 'templates/' . $template . '.tpl.php';
            }else{
                include 'templates/' . $this->request->getController() . '.tpl.php';
            }
        }//si no se pasa dataview no se incuye nada
    }
    function getDB(){
        $db=DB::singleton();
        return $db;
    }
    protected function query($db,$sql,$params =null){
        $stmt = $db->prepare($sql);
        if ($params){
            $res = $stmt->execute($params);
        }else{
            $res = $stmt->execute();
        }
        return $stmt;
    }

    protected function row_extract($stmt){
        //despues de la query

            $rows = $stmt ->fetchAll(\PDO::FETCH_ASSOC);
            $row = $rows[0];

        return $row;
    }
    protected function rows_extract($stmt){
        //despues de la query

        $rows = $stmt ->fetchAll(\PDO::FETCH_ASSOC);

        return $rows;
    }
}