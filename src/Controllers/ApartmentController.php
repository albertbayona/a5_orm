<?php


namespace App\Controllers;


use App\Controller;
use App\Models\Apartment;
class ApartmentController extends Controller
{
    public function index(){
        $this->render(["xD"=>"xS"],"");
    }
    public function create(){
        if (!empty($_REQUEST['title']) &&
            !empty($_REQUEST['lloc']) &&
            !empty($_REQUEST['metres2'])
        ) {
            $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_EMAIL);
            $lloc = filter_input(INPUT_POST, 'lloc', FILTER_SANITIZE_STRING);
            $metres2 = filter_input(INPUT_POST, 'metres2', FILTER_SANITIZE_STRING);
            echo "aa";
            try {
                $apartment = $this->create_apartment($title, $lloc, $metres2,$_SESSION['id']);
                header('location:/');
            } catch (\PDOException $e) {
                $this->error($e->getMessage());
            }
        }
        $this->error("Fill the form");
    }
    public function create_apartment($title, $lloc, $metres2,$user_id){
        $apartment=Apartment::create([
            'title'=>$title,
            'lloc'=>$lloc,
            'metres2'=>$metres2,
            'user_id'=>$user_id]);
        return $apartment;
    }
    public function llistat(){
        $apartments = Apartment::where("user_id",$_SESSION["id"])->get();
        $this->render(["apartments"=>$apartments],"apartmentLlistat");
    }



}