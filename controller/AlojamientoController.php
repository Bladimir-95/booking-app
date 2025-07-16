<?php
require_once './config/database.php';
require_once './models/alojamiento.php';


class AlumnoController {
    public $db;
    public $alojamiento;

    public function __construct()
        {
            $database = new Database();
            $this->db = $database->getConnection();
            $this->alojamiento = new Alojamiento($this->db);
        }

        public function read(){
            // Logica para Leer alumnos
            $sentence = $this->alojamiento->read();
            $alojaminetos = $sentence->fetchAll(PDO::FETCH_ASSOC);
            include './views/home.php';
        }

        public function search(){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                // Buscar solo alojamientos donde el título sea igual al destino
                $titulo = $_POST['destination'];
                if(empty($titulo)){
                    // Si no hay título, redirigir a la vista principal
                    $this->read();
                    
                    return;
                }
                $sentence = $this->alojamiento->search($titulo);
                $alojaminetos = $sentence->fetchAll(PDO::FETCH_ASSOC);
               include './views/home.php';
                return;
            }

            if(isset($_GET['lugar'])){
                // Buscar alojamientos por lugar
                $lugar = $_GET['lugar'];
                $sentence = $this->alojamiento->searchLugar($lugar);
                $alojaminetos = $sentence->fetchAll(PDO::FETCH_ASSOC);
                include './views/home.php';
                return;
            } else {
                // Si no hay lugar, redirigir a la vista principal
                $this->read();
                return;
            }
        }
}

 
