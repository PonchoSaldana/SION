<?php
class conexion_db {
    private $host = "localhost";      // Host del servidor MySQL
    private $usuario = "root";        // Usuario de la base de datos
    private $clave = "";              // Contraseña del usuario
    private $bd = "sion_db";      // Nombre de la base de datos
    private $conexion;

    // Método para conectar a la base de datos
    public function conectar() {
        $this->conexion = new mysqli($this->host, $this->usuario, $this->clave, $this->bd);

        // Comprobar si hubo error de conexión
        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }

        return $this->conexion;
    }

    // Método para cerrar la conexión
    public function cerrar() {
        if ($this->conexion) {
            $this->conexion->close();
        }
    }
}
?>