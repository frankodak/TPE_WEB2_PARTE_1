<?php
require_once './app/models/catalogo.model.php';
require_once './app/views/catalogo.view.php';


class CatalogoController {
    private $model;
    private $view;
    private $user;

    public function __construct($res) {
        $this->model = new CatalogoModel();
        $this->user = isset($_SESSION['EMAIL_USER']) ? $_SESSION['EMAIL_USER'] : null;
        $this->view = new CatalogoView($this->user);
    }
    
    public function showDetail($id) {
        $libro = $this->model->getLibro($id);
        if ($libro) {
            $this->view->showDetail($libro);
        } else {
            $this->showError();;
        }
    }
    
    
    public function addCatalogo() { 
        $generos = $this->model->getGeneros();
        include_once 'templates/addCatalogo.phtml';
    }
    

    public function showLibros() {
        $generos = $this->model->getGeneros();
        $libros = $this->model->getLibros();
        include_once 'templates/layout/header.phtml';
        include_once 'templates/generos.phtml';
        include_once 'templates/catalogo.phtml';
        include_once 'templates/layout/footer.phtml';
    }

    public function addLibro() {
        if (!isset($_POST['nombre']) || empty($_POST['nombre'])) {
            echo 'Falta completar el título';
        }
    
    
        $nombre = $_POST['nombre'];
        $autor = $_POST['autor'];
        $resena = $_POST['resena'];
        $genero = $_POST['genero'];
    
        $id = $this->model->insertLibro($nombre, $autor, $resena,$genero);

        header('Location: ' . BASE_URL);
    }

    
    public function deleteLibro($id) {
        $libro = $this->model->getLibro($id);

        if (!$libro) {
            echo "No existe la tarea con el id=$id";
        }
        $this->model->eraseLibro($id);

        header('Location: ' . BASE_URL);
    }

    function showError(){
        include_once 'templates/layout/error.phtml';
    }

}

