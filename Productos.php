<?php
include_once('conexion.php');
// Uso de la clase para obtener la conexión
$conexion = new Conexion();
$conn = $conexion->ObtenerConexion();
class Productos {
    private $conn;
    public function __construct($conexion) {
        $this->conn = $conexion;
    }
    public function GetAll() {
        try {
            $query = "SELECT p.*, c.Nombre AS CategoriaNombre FROM Productos p INNER JOIN Categorias c ON p.ID_Categoria = c.ID_Categoria";
            $statement = $this->conn->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch(PDOException $e) {
            echo "Error al obtener productos: " . $e->getMessage();
            return false;
        }
    }
    public function GetByCategoria($categoria) {
        try {
            // Asegúrate de usar comillas simples alrededor del valor de $categoria para evitar problemas de SQL Injection
            $query = "SELECT p.*, c.Nombre AS CategoriaNombre FROM Productos p INNER JOIN Categorias c ON p.ID_Categoria = c.ID_Categoria WHERE c.Nombre = :categoria";
    
            // Preparar la consulta
            $statement = $this->conn->prepare($query);
            
            // Asignar el valor del parámetro :categoria
            $statement->bindParam(':categoria', $categoria, PDO::PARAM_STR);
    
            // Ejecutar la consulta
            $statement->execute();
    
            // Obtener el resultado
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    
            // Retornar el resultado
            return $result;
        } catch(PDOException $e) {
            // Manejar cualquier excepción
            echo "Error al obtener productos: " . $e->getMessage();
            return false;
        }
    }  
    public function Insert($titulo,$talla,$marca,$estilo,$precio,$genero,$cantidad,$id){
        try {
            // Preparar la sentencia SQL
            $sql = "INSERT INTO Productos (titulo, talla, marca, estilo, precio, genero, cantidaddisponible, ID_Categoria) VALUES (:titulo, :talla, :marca, :estilo, :precio, :genero, :cantidad, :ID_Categoria)";
            $stmt = $this->conn->prepare($sql);

            // Vincular los parámetros
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':talla', $talla);
            $stmt->bindParam(':marca', $marca);
            $stmt->bindParam(':estilo', $estilo);
            $stmt->bindParam(':precio', $precio);
            $stmt->bindParam(':genero', $genero);
            $stmt->bindParam(':cantidad', $cantidad);
            $stmt->bindParam(':ID_Categoria', $id);

            // Ejecutar la sentencia
            if ($stmt->execute()) {
                return true; // Éxito
            } else {
                return false; // Error
            }
        } catch(PDOException $e) {
            echo "Error al insertar los datos: " . $e->getMessage();
            return false;
        }
    } 
}
?>