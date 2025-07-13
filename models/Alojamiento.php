<?php 

    class Alojamiento{ 
        public $id;
        public $imagen;
        public $titulo;
        public $precio;
        public $alojamiento;
        public $disponibilidad;
        public $calificacion;
        public $connection;
        public $table_name = "alojamientos";

        public function __construct($db)
        {
            $this->connection = $db;
        }

        public function read(){
            //Logica para leer los alojamientos
            $query = "SELECT * FROM {$this->table_name}";
            $sentence = $this->connection->prepare($query);
            $sentence->execute();
            return $sentence;
        }

        public function selecionar(){
           //Logica para seleccionar un alojamiento

        }

        public function update(){
            //Logica para actualizar un alumno

        }


        public function delete($id){
            //Logica para eliminar un alumno

        }
    }

?>