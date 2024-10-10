<?php
require_once("./models/usuarioQuery.php");

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class homeController{
    public function viewIndex(){
        require_once("./views/homeViews/inicio.php");
    }

    public function viewLogin(){
        require_once("./views/homeViews/login.php");
    }

    public function viewAuth(){
        require_once("./views/homeViews/auth.php");
    }

    public function login(){
        $usuario=new Usuario;
        $usuarioQuery=new UsuarioQuery($usuario);

        //var_dump($_POST);

        $usuario->setEmail($_POST["email"]);
        $usuario->setPassword($_POST["password"]);

        $id=$usuarioQuery->usuarioLoginId()["id_usuario"];

        $key="tu_clave_secreta"; // Usa una clave secreta segura
        $payload=[
            'iat' => time(), // Tiempo en que se emite el token
            'exp' => time() + (60 * 60), // Tiempo de expiración del token (1 hora)
            'sub' => $id // Puedes incluir información del usuario, como su ID
        ];

        $jwt = JWT::encode($payload, $key,"HS256");

        // Devolver el token al frontend en formato JSON
        echo json_encode([
            "result"=>true,
            "token"=>$jwt
        ]);
        
        //echo json_encode($id);
    }

    public function authLogin(){
        $usuarioQuery=new UsuarioQuery(new Usuario);

        $token=$_POST["token"];
        $key="tu_clave_secreta";

        $decode=JWT::decode($token, new Key($key, 'HS256'));

        //var_dump($decode->sub);
        $data=$usuarioQuery->usuarioFindId($decode->sub);

        echo json_encode(["result"=>true,"data"=>$data]);
    }
}
?>