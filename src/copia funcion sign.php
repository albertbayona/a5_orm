public function sign(){
//        print_r($_POST);

        $DB = $this->getDB();
        if(empty($_POST["user"]) || empty($_POST["pass"]) || $_POST["pass"]!=$_POST["verifypass"]){
            header('Location: /sign');
            die();
        }
//        $_POST["ven"];
//        $_POST["com"];
        $user =filter_var($_POST["user"],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $pass =filter_var($_POST["pass"],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $pass = password_hash($pass, PASSWORD_BCRYPT);
        $sql = "INSERT INTO `Users`(`nick`, `pass`, `email`) VALUES ('".$user."','".$pass."','".$_POST["email"]."')";
        $stmt =$this->query($DB,$sql);



//        $sql = "SELECT * FROM `Users` WHERE `nick`=:nick";
//        $stmt = $this->query($DB,$sql,array(':nick' => $user));
//        print_r($this->row_extract($stmt));




//        if(isset($_POST["ven"])){
//            $sql = "INSERT INTO `User_rol`(`idRol`, `idUser`) VALUES ('".$user."','".$pass."','".$_POST["email"]."')";
//
//            $stmt = $this->query($DB,$sql);
//        }



        header('Location: /');

        die();

    }