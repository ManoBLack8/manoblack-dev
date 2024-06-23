<?php
class Usuario {

    public String $nomeUsuario;
    public String $senha;
    public String $email;
    public String $nivelAcesso; 
    public Datetime $ultimoAcesso;

    public function criarUsuario($nomeUsuario, $senha, $email){
        $conexao = new Conexao();
        $conexao->inserir("INSERT INTO usuario (nome, email, senha, nivelAcesso, UltimoAcesso) VALUES ($nomeUsuario, $email, $senha, 1, now())");
    }
}
?>