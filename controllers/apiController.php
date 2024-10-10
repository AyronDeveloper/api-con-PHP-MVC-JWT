<?php
require_once("./models/usuarioQuery.php");

class apiController{
    public function index($id=null){
        date_default_timezone_set('America/Lima');

        $usuario=new Usuario;
        $usuarioQuery=new UsuarioQuery($usuario);

        $metodo=$_SERVER["REQUEST_METHOD"];

        if($metodo=="GET"){
            if(!empty($id)){

                $data=$usuarioQuery->usuarioFindId($id);
                echo json_encode($data);

            }else{

                $data=$usuarioQuery->AllUsuarios();
                echo json_encode($data);

            }

        }elseif($metodo=="POST"){

            $usuario->setNombre($_POST["nombre"]);
            $usuario->setEmail($_POST["email"]);
            $usuario->setPassword($_POST["password"]);
            $createDate=new DateTime();
            $createDate=$createDate->format("Y-m-d H:i:s");
            $usuario->setCreateDate($createDate);
            $usuario->setUpdateDate($createDate);

            $insert=$usuarioQuery->createUsuario();
            
            echo json_encode($insert);

        }elseif($metodo=="PUT"){

            $_PUT=json_decode(file_get_contents("php://input"), true);
            
            $usuario->setNombre($_PUT["nombre"]);
            $usuario->setEmail($_PUT["email"]);
            $usuario->setPassword($_PUT["password"]);
            $updateDate=new DateTime();
            $updateDate=$updateDate->format("Y-m-d H:i:s");
            $usuario->setUpdateDate($updateDate);

            $update=$usuarioQuery->updateUsuario($id);

            echo json_encode($update);

        }elseif($metodo=="DELETE"){
            
            $delete=$usuarioQuery->deleteUsuario($id);

            echo json_encode($delete);
        }
    }
}
?>