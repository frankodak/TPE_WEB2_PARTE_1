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
            $this->showError();
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
            $genero = $this->modelGenero->getGeneroPorNombre($generoSeleccionado);
            
            if ($genero) {
                $libros = $this->modelLibro->getLibrosPorGenero($genero->id);
                $generoDetalle = $genero;
            }
        } else {
            $libros = $this->modelLibro->getLibros();
            $generoDetalle = null;
        }
        include_once 'templates/layout/header.phtml';
        include_once 'templates/generos.phtml';
        include_once 'templates/catalogo.phtml';
        include_once 'templates/layout/footer.phtml';
    }
    

    public function addLibro() {
        if (empty($_POST['titulo']) || empty($_POST['autor']) || empty($_POST['reseña']) || empty($_POST['genero_id'])) {
            echo 'Faltan completar los campos.';
            return;
        }

        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $reseña = $_POST['reseña'];
        $genero_id = $_POST['genero_id'];

        $id = $this->modelLibro->insertLibro($titulo, $autor, $reseña, $genero_id);

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
        } else {
            echo "ID no proporcionado.";
        }
    }

    public function editLibro($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['titulo'], $_POST['autor'], $_POST['reseña'], $_POST['genero_id'])) {
                $titulo = $_POST['titulo'];
                $autor = $_POST['autor'];
                $reseña = $_POST['reseña'];
                $genero_id = $_POST['genero_id'];

                (new LibroModel())->editLibro($id, $titulo, $autor, $reseña, $genero_id);

                header('Location: ' . BASE_URL);
                exit();
            } else {
                echo "Faltan datos en el formulario.";
            }
        } else {
            $libro = (new LibroModel())->getLibro($id);
            $generos = (new GeneroModel())->getGeneros();
            if ($libro) {
                require 'templates/form_edit-libro.phtml';
            } else {
                $this->showError();
            }
        }
    }

    function showError(){
        include_once 'templates/layout/error.phtml';
    }

    public function addGenero() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['genero']) && !empty($_POST['descripcion'])) {
                $genero = $_POST['genero'];
                $descripcion = $_POST['descripcion'];
                $id = $this->modelGenero->insertGenero($genero, $descripcion);
                header('Location: ' . BASE_URL);
            } else {
                echo 'Por favor complete todos los campos.';
            }
        }
    }

    public function editarGenero($id) {
        $genero = $this->modelGenero->getGenero($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['nombre'], $_POST['descripcion']) && !empty($_POST['nombre']) && !empty($_POST['descripcion'])) {
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
    
                $this->modelGenero->editGenero($id, $nombre, $descripcion);
                header('Location: ' . BASE_URL);
            } else {
                echo "Por favor complete todos los campos.";
            }
        } else {
            require_once 'templates/form_edit-genero.phtml';
        }
    }

    public function eliminarGenero($id) {
        $this->modelGenero->deleteGenero($id);

        header("Location: " . BASE_URL);
    }

}
