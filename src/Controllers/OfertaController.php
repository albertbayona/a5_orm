<?php


namespace App\Controllers;

use App\Controller;
use App\Models\Oferta;

class OfertaController extends Controller
{
    public function index(){
        //Me parece logico que el mostrar apartments lo gestione el apartamento
        //Y no quiero tener codigo repetido asi que le dejo al apartmentController que lo gestione el y lo usamos aqui
        $ApartmentController = new ApartmentController($this->request);
        $ApartmentController->llistat();
    }


    public function createForm(){
        $params = $this->request->getParams();
        $this->render($params,"oferta");
    }


    private function create_oferta($title,$disponibilitat,$apartment_id){
        $oferta=Oferta::create([
            'titol'=>$title,
            'disponibilitat'=>$disponibilitat,
            'apartment_id'=>$apartment_id,
            ]);
        return $oferta;
    }


    public function create(){
        if (!empty($_REQUEST['titol']) && !empty($_REQUEST['disponibilitat'])) {
            $titol = filter_input(INPUT_POST, 'titol', FILTER_SANITIZE_EMAIL);
            $disponibilitat = filter_input(INPUT_POST, 'disponibilitat', FILTER_SANITIZE_STRING);
            try {

                $oferta = $this->create_oferta($titol, $disponibilitat, $this->request->getParams()["id"]);
                header('location:/');
            } catch (\PDOException $e) {
                $this->error($e->getMessage());
            }

        }else{
            $this->render(["xD"=>"xS"],"/");
        }
        $this->error("Fill the form");
    }

}