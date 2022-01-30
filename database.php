<?php
class Conexion
{
    private $serverName = "localhost";
    private $databaseName = "app";
    private $userName = "root";
    private $password = "";
    private $Conn;

    public function __construct()
    {
        try {
            $this->Conn = new PDO(
                "mysql:host=$this->serverName; dbname=$this->databaseName",
                $this->userName,
                $this->password
            );

            $this->Conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "conexion fallida " . $e->getMessage();
        }
    }

    public function ejecutar($sql)
    {
        $this->Conn->exec($sql);
        return $this->Conn->lastInsertId();
    }

    public function consultar($sql){
        $sentencia = $this->Conn->prepare($sql);
        $sentencia->execute();
        return $sentencia->fetchAll();
    }
}
