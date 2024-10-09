<div class="container-sm mt-5">
    <h2 class="fs-3 fw-bold mt-5 mb-3">Agregar Genero</h2>
    <form>
    <div class="mb-3">
        <label for="" class="form-label">Nuevo Genero</label>
        <input type="" class="form-control" id="" aria-describedby=""> 
    </div>
    <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
</div>

<div class="container-sm mt-5">
    <h2 class="fs-3 fw-bold mt-5 mb-3">Agregar libro</h2>
    <form class="mb-5">
    <div class="mb-3">
        <label for="" class="form-label">Nombre nuevo libro</label>
        <input type="" class="form-control" id="" aria-describedby=""> 
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Autor</label>
        <input type="" class="form-control" id="" aria-describedby=""> 
    </div>
    <?php
        include_once 'db.fake.php';
        echo '<label for="" class="form-label">Categoria</label>';
        echo '<select class="form-select mb-3" aria-label="Default select example" name="categoria">';
        echo '<option selected>Seleccione una categoria</option>';
        foreach ($generos as $genero) {
            echo '<option value="' . $genero. '">' . $genero. '</option>';    }

        echo '</select>';
    ?>
    <div class="mb-3">
        <label for="" class="form-label">Reseña</label>
        <textarea class="form-control" id="" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
</div>


