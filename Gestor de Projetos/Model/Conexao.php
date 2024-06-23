<?php
class Conexao {
    
    private function conectar(){
        require_once("variaveisAmbiente.php");
        try{
            $pdo = new PDO("mysql:dbname=$banco;host=$servidor;charset=utf8", "$usuario","$senha");
       } catch (Exception $e){
           echo "erro ao conectar com banco de dados" .  $e;
       }
       return $pdo;
    }

    public function chamar($sql){        
        $consulta = $this->conectar()->query($sql);
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function inserir($sql){        
        return $this->conectar()->query($sql);
    
    }

}

?>