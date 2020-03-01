<?php


namespace App\Controllers;


use App\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function create_user($email,$passwd,$nom){
        $user=User::create([
            'email'=>$email,
            'passw'=>$passwd,
            'nom'=>$nom]);
        return $user;
    }

    public function sign(){
        $this->render(["xD"=>"xS"],"sign");
    }
    public function signup()
    {
        if (!empty($_REQUEST['email']) &&
            !empty($_REQUEST['pass']) &&
            !empty($_REQUEST['verifypass']) &&
            !empty($_REQUEST['nom'])
        ) {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $passwd1 = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);
            $passwd2 = filter_input(INPUT_POST, 'verifypass', FILTER_SANITIZE_STRING);
            $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
            if ($passwd1 == $passwd2) {
                $passwdhash = password_hash($passwd1,PASSWORD_ARGON2I);
                try {
                    $user = $this->create_user($email, $passwdhash, $nom);
                    header('location:/');
                } catch (\PDOException $e) {
                    $this->error($e->getMessage());
                }
            } else {
                $this->error("Password does not match");
            }
        }else{
            $this->render(["xD"=>"xS"],"sign");
        }
        $this->error("Fill the form");
    }
    public function login(){
        if(empty($_POST["email"]) || empty($_POST["pass"])){
            header('Location: /');
            die();
        }
        $email =filter_var($_POST["email"],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $pass =filter_var($_POST["pass"],FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $user = User::where("email",$email)->first();

        $hash = $user->passw;
        if (password_verify($pass, $hash)) {
            $_SESSION['nom'] = $user->nom;
            $_SESSION['id'] = $user->id;
            header('Location: /');
        } else {
            echo 'Invalid password.';
        }

    }
}