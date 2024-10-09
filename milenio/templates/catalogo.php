    <?php
        include_once 'db.php';
    ?>
    
    <h2 class="fs-3 fw-bold mt-5 ms-5">Generos</h2>
    <ul class="nav justify-content-start ms-5 mt-4 d-inline-flex gap-3">
        <?php foreach ($generos as $genero): ?>
            <li class="nav-item">
                <button type="button" class="btn btn-outline-primary"><?php echo $genero ?></button>
            </li>
        <?php endforeach; ?>
    </ul>
    
    <div class="mx-5">
    <h2 class="fs-3 fw-bold mt-5">Listado de libros</h2>
    <table class="table mt-5">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Libro</th>
            <th scope="col">Autor</th>
            <th scope="col">Genero</th>
            <th scope="col">Detalle</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($catalogo as $libro){
                    echo '
                        <tr>
                            <th scope="row">' . $libro['id_libro'] . '</th>
                            <td>' . $libro['nombre'] . '</td>
                            <td>' . $libro['autor'] . '</td>
                            <td>' . $libro['genero'] . '</td>
                            <td class="d-inline-flex gap-3">
                                <a href="../router.php?action=detail/' . $libro['id_libro'] . '">
                                    <button type="button" class="btn btn-outline-primary btn-sm">Ver mas</button>
                                </a>
                            </td>
                        </tr>
                    ';
                }
            ?>
        </tbody>
    </table>    
</div>