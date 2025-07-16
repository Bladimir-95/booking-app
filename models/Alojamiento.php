<?php 

class Alojamiento{
    public $id;
    public $img;
    public $titulo;
    public $precio;
    public $alojamiento;
    public $disponibilidad;
    public $calificacion;
    public $Lugar;
    public $connection;
    public $table_name = "alojamientos";

     public function __construct($db)
        {
            $this->connection = $db;
        }

        public function read(){
            //Logica para leer los alumnos
            $query = "SELECT * FROM {$this->table_name} LIMIT 6";
            $sentence = $this->connection->prepare($query);
            $sentence->execute();
            return $sentence;
        }

        public function search($titulo){
    $query = "SELECT * FROM {$this->table_name} WHERE titulo = :titulo";
    $sentence = $this->connection->prepare($query);
    $sentence->bindParam(':titulo', $titulo);
    $sentence->execute();
    return $sentence;
}

public function searchLugar($lugar){
    $query = "SELECT * FROM {$this->table_name} WHERE lugar = :lugar";
    $sentence = $this->connection->prepare($query);
    $sentence->bindParam(':lugar', $lugar);
    $sentence->execute();
    return $sentence;
}
}

?>