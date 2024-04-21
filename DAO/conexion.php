<?php
class Conexion{
    private function Conectar(){
        $host = 'localhost';
        $dbname = 'inventario';
        $username = 'root';
        $password = '';
        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            return $conn;
        } catch(PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
            die();
        }
    }
    public function ObtenerConexion(){
        return $this->Conectar();
    }
}
?>



