<?php
include_once 'db.php';

if (isset($id)) {
    foreach ($catalogo as $libro) {
        if ($libro['id_libro'] == $id) {
            echo '
            <div class="d-flex justify-content-center mt-4">
                <div class="card" style="width: 90%;">
                    <div class="card-body">
                        <h4 class="card-title mb-3 fw-bold">' . $libro['nombre'] . '</h4>
                        <h6 class="card-subtitle mb-2 text-body-secondary">' . $libro['autor'] . '</h6>
                        <p class="card-text">' . $libro['resena'] . '</p>
                        <span class="badge bg-info">' . $libro['genero'] . '</span>
                        <div class="mt-3">
                            <a href="#" class="card-link btn btn-primary">Editar</a>
                            <a href="#" class="card-link btn btn-danger">Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>
            ';
            break;
        }
    }
} else {
    echo 'No se ha seleccionado ningún libro.';
}
?>

