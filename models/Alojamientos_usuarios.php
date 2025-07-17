<?php
class Alojamientos_usuarios {
    public $connection;
    public $usuario_alojamientos = "usuario_alojamientos";

    public function __construct($db) {
        $this->connection = $db;
    }

   public function agregarAlojamiento($user_id, $alojamiento_id) {
    $query = "INSERT INTO usuario_alojamientos (user_id, alojamiento_id) 
              VALUES ($user_id, $alojamiento_id)";
    $sentence = $this->connection->prepare($query);
    return $sentence->execute();
}
    
   public function obtenerAlojamientos($user_id) {
    $query = "SELECT * FROM alojamientos WHERE id IN ( SELECT alojamiento_id FROM usuario_alojamientos WHERE user_id = $user_id)";
    $sentence = $this->connection->prepare($query);
    $sentence->execute();
    return $sentence;
}


    public function delete($user_id, $alojamiento_id) {
    $query = "DELETE FROM {$this->usuario_alojamientos} 
              WHERE user_id = $user_id AND alojamiento_id = $alojamiento_id";
    $sentence = $this->connection->prepare($query);
    return $sentence->execute();
}
    
}

?>