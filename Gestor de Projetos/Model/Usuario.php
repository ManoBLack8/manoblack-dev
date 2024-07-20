<?php
namespace Model;
class Usuario {

    public String $nomeUsuario;
    public String $senha;
    public String $email;
    public String $nivelAcesso; 
    public String $ultimoAcesso;

    public function criarUsuario(){
        $conexao = new \Conexao();
        $conexao->inserir("INSERT INTO usuario (nome, email, senha, nivelAcesso, UltimoAcesso) VALUES ($this->nomeUsuario, $this->email, $this->senha, 1, now())");
    }

}
