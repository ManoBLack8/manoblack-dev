<?php
require_once("../var_Ambiente.php");

class Conexao
{
    private static $host = $host_db; // Endereço do banco de dados
    private static $dbname = $database; // Nome do banco de dados
    private static $username = $user_db; // Nome de usuário do banco de dados
    private static $password = $password_db; // Senha do banco de dados

    private static $conexao = null;

    public static function getConexao()
    {
        if (self::$conexao === null) {
            try {
                self::$conexao = new PDO(
                    "mysql:host=" . self::$host . ";dbname=" . self::$dbname,
                    self::$username,
                    self::$password
                );
                self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erro na conexão com o banco de dados: " . $e->getMessage());
            }
        }
        return self::$conexao;
    }

    public static function insert($table, $data)
    {
        $conexao = self::getConexao();

        $colunas = implode(", ", array_keys($data));
        $valores = ":" . implode(", :", array_keys($data));

        $sql = "INSERT INTO $table ($colunas) VALUES ($valores)";

        $stmt = $conexao->prepare($sql);
        $stmt->execute($data);
    }

    public static function update($table, $data, $where)
    {
        $conexao = self::getConexao();

        $set = "";
        foreach ($data as $coluna => $valor) {
            $set .= "$coluna = :$coluna, ";
        }
        $set = rtrim($set, ', ');

        $sql = "UPDATE $table SET $set WHERE $where";

        $stmt = $conexao->prepare($sql);
        $stmt->execute($data);
    }

    public static function delete($table, $where)
    {
        $conexao = self::getConexao();

        $sql = "DELETE FROM $table WHERE $where";

        $stmt = $conexao->prepare($sql);
        $stmt->execute();
    }

    public static function select($table, $where = null)
    {
        $conexao = self::getConexao();

        $whereClause = '';
        if ($where !== null) {
            $whereClause = "WHERE $where";
        }

        $sql = "SELECT * FROM $table $whereClause";

        $stmt = $conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
