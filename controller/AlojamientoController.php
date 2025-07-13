<?php 
    require_once './config/database.php';
    require_once './models/Alojamiento.php';

    class AlojamientoController{
        public $alojamiento;
        public $db;

        public function __construct()
        {
            $database = new Database();
            $this->db = $database->getConnection();
            $this->alojamiento = new Alojamiento($this->db);
        }

        public function read(){
            // Logica para Leer alojamientos
            $sentence = $this->alojamiento->read();
            $alojamiento = $sentence->fetchAll(PDO::FETCH_ASSOC);
            include './views/home.php';
        }

        public function create(){
            //Logica para crear alumnos

        }

        public function update($id){
                //Logica para actualizar alumno

        }

        public function delete($id){
                //Logica para eliminar alumno

        }

    }

?>