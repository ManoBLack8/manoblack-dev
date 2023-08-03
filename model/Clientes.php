<?php
use Conexao;
 class Clientes
 {
     private $id;
     private $nome;
     private $documneto;
     private $email;
     private $telefone;

     private $table = "clientes";
 
     public function __construct($id, $nome, $email, $telefone)
     {
         $this->id = $id;
         $this->nome = $nome;
         $this->documneto;
         $this->email = $email;
         $this->telefone = $telefone;
     }
 
     // Métodos de acesso (getters) e modificação (setters)
 
     public function getId()
     {
         return $this->id;
     }
 
     public function getNome()
     {
         return $this->nome;
     }
 
     public function setNome($nome)
     {
         $this->nome = $nome;
     }
 
     public function getEmail()
     {
         return $this->email;
     }
 
     public function setEmail($email)
     {
         $this->email = $email;
     }
 
     public function getTelefone()
     {
         return $this->telefone;
     }
 
     public function setTelefone($telefone)
     {
         $this->telefone = $telefone;
     }

     public function CadastrarCliente($Cliente)
     {
        Conexao::insert($this->table, $Cliente);
     }

     public function projetosCliente($Cliente, $projeto)
     {
        Conexao::select($this->table, "cliente_projeto = {$projeto}");
     }
 }
 