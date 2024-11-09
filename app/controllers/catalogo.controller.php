<?php
    require_once './app/models/libro.model.php';
    require_once './app/models/genero.model.php';
    require_once './app/views/catalogo.view.php';


class CatalogoController {
    private $modelLibro;
    private $modelGenero;
    private $view;
    private $user;

    public function __construct($res) {
        $this->modelLibro = new LibroModel();
        $this->modelGenero = new GeneroModel();
        $this->user = isset($_SESSION['EMAIL_USER']) ? $_SESSION['EMAIL_USER'] : null;
        $this->view = new CatalogoView($this->user);
    }
    
    public function showDetail($id) {
        $libro = $this->modelLibro->getLibro($id);
        if ($libro) {
            $this->view->showDetail($libro);
        } else {
            $this->showError();;
        }
    }
    
    
    public function addCatalogo() { 
        $generos = $this->modelGenero->getGeneros();
        include_once 'templates/form_alta.phtml';
    }
    

    public function showLibros() {
        $generoSeleccionado = isset($_GET['genero']) ? $_GET['genero'] : null;
        $generos = $this->modelGenero->getGeneros();
        if ($generoSeleccionado) {
            $libros = $this->modelLibro->getLibrosPorGenero($generoSeleccionado);
        } else {
            $libros = $this->modelLibro->getLibros();
        }
    
        include_once 'templates/layout/header.phtml';
        include_once 'templates/generos.phtml';
        include_once 'templates/catalogo.phtml';
        include_once 'templates/layout/footer.phtml';
    }
    

    public function addLibro() {
        if (!empty($_POST['titulo'])) {
            echo 'Falta completar el titulo';
        }
    
        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $reseña = $_POST['reseña'];
        $nombre = $_POST['genero_nombre'];
    
        $id = $this->modelLibro->insertLibro($titulo, $autor, $reseña, $nombre);

        header('Location: ' . BASE_URL);
    }

    
    public function deleteLibro() {
        if (isset($_POST['id'])) {
            $id = $_POST['id']; 
            $libro = $this->modelLibro->getLibro($id);
    
            if (!$libro) {
                echo "No existe el libro con el id=$id";
                return;
            }

            $this->modelLibro->eraseLibro($id);

            header('Location: ' . BASE_URL);
        }
            else {
                echo "ID no proporcionado.";
            }
    }
    
    public function editLibro($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['titulo'], $_POST['autor'], $_POST['reseña'], $_POST['genero_nombre'])) {
                $titulo = $_POST['titulo'];
                $autor = $_POST['autor'];
                $reseña = $_POST['reseña'];
                $genero_nombre = $_POST['genero_nombre'];

                (new LibroModel())->editLibro($id, $titulo, $autor, $reseña, $genero_nombre);
    
                header('Location: ' . BASE_URL);
                exit();
            } else {
                echo "Faltan datos en el formulario.";
            }
        } else {
            $libro = (new LibroModel())->getLibro($id);
            $generos = (new GeneroModel())->getGeneros();
            if ($libro) {
                require 'templates/form_edit.phtml';
            } else {
                $this->showError();
            }
        }
    }
    

    function showError(){
        include_once 'templates/layout/error.phtml';
    }

    public function addGenero() {
        if (!empty($_POST['genero'])) {
            echo 'Falta completar el genero';
        }
    
        $genero = $_POST['genero'];
    
        $id = $this->modelGenero->insertGenero($genero);

        header('Location: ' . BASE_URL);
    }

}

