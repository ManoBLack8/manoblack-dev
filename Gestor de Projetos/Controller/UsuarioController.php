<?php
namespace Controller;

use Model\Usuario;
use Controller\Controller;
class UsuarioController extends Controller {
    
    public function CadastrarUsuario(){
        $usuario = new Usuario();
        $usuario->nomeUsuario = $_POST["nomeUsuario"];
        $usuario->email = $_POST["emailUsuario"];
        $usuario->senha = $_POST["senhaUsuario"];
        $usuario->criarUsuario();
        var_dump($usuario);
    }
}
?>
