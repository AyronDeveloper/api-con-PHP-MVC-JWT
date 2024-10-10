<?php 
require_once("./models/usuario.php");

class UsuarioQuery{
    private $usuario;
    private $db;


    public function __construct(Usuario $usuario){
        $this->db=Database::connect();
        $this->usuario=$usuario;
    }

    public function AllUsuarios(){
        $query="SELECT * FROM tb_usuarios WHERE estado='1'";
        $resultQuery=$this->db->prepare($query);
        $resultQuery->execute();

        $dataUsuario=$resultQuery->fetchAll(PDO::FETCH_ASSOC);

        return $dataUsuario;
    }


    public function usuarioFindId($id){
        $query="SELECT * FROM tb_usuarios WHERE id_usuario=? AND estado='1'";
        $resultQuery=$this->db->prepare($query);
        $resultQuery->execute([$id]);

        $dataUsuario=$resultQuery->fetch(PDO::FETCH_ASSOC);

        return $dataUsuario;
    }

    public function usuarioLoginId(){
        $query="SELECT id_usuario FROM tb_usuarios WHERE email=? AND password=?";
        $resultQuery=$this->db->prepare($query);
        $resultQuery->execute([
            $this->usuario->getEmail(),
            $this->usuario->getPassword()
        ]);

        $idUsuario=$resultQuery->fetch(PDO::FETCH_ASSOC);

        return $idUsuario;
    }


    public function createUsuario(){
        $id_usuario=null;
        $nombre=$this->usuario->getNombre();
        $email=$this->usuario->getEmail();
        $password=$this->usuario->getPassword();
        $image=null;
        $estado=1;
        $create_date=$this->usuario->getCreateDate();
        $update_date=$this->usuario->getUpdateDate();


        $query="INSERT INTO tb_usuarios VALUE(:id_usuario,:nombre,:email,:password,:image,:estado,:create_date,:update_date)";
        $insertUsuario=$this->db->prepare($query);

        $insertUsuario->bindParam(":id_usuario",$id_usuario);
        $insertUsuario->bindParam(":nombre",$nombre);
        $insertUsuario->bindParam(":email",$email);
        $insertUsuario->bindParam(":password",$password);
        $insertUsuario->bindParam(":image",$image);
        $insertUsuario->bindParam(":estado",$estado);
        $insertUsuario->bindParam(":create_date",$create_date);
        $insertUsuario->bindParam(":update_date",$update_date);

        $resultQuery=$insertUsuario->execute();

        if($resultQuery){
            return array("result"=>true);
        }else{
            return array("result"=>false);
        }

    }

    
    public function updateUsuario($id_usuario){
        $query="UPDATE tb_usuarios SET nombre=?, email=?, password=?, update_date=? WHERE id_usuario=?";
        $updateUsuario=$this->db->prepare($query);
        $resultQuery=$updateUsuario->execute([
            $this->usuario->getNombre(),
            $this->usuario->getEmail(),
            $this->usuario->getPassword(),
            $this->usuario->getUpdateDate(),
            $id_usuario
        ]);

        if($resultQuery){
            return array("result"=>true);
        }else{
            return array("result"=>false);
        }

    }


    public function deleteUsuario($id_usuario){
        $query="UPDATE tb_usuarios SET estado=? WHERE id_usuario=?";
        $updateUsuario=$this->db->prepare($query);
        $resultQuery=$updateUsuario->execute([0,$id_usuario]);

        if($resultQuery){
            return array("result"=>true);
        }else{
            return array("result"=>false);
        }
    }



    
}
?>