<?php
require '../librerias/info-generos.php';

if(isset($_SESSION['errores'])) {
    $errores = $_SESSION['errores'];
    $oldData = $_SESSION['old_data'];
    unset($_SESSION['errores'], $_SESSION['old_data']);
} else {
    $errores = [];
    $oldData = [];
}

$generos = obtenerGeneros($db);
?>
<section>
    <h2>Crear nuevo producto</h2>
   
    <form action="acciones/subir-producto.php" method="post" enctype="multipart/form-data">
       <fieldset>
        
            <label for="titulo">Título</label>
            <input type="text"  name="titulo"  value="<?= isset($oldData['titulo']) ? $oldData['titulo'] : '';?>" id="titulo">
            <?php
            if(isset($errores['titulo'])):
            ?>
            <span class="errorR"><?= $errores['titulo'];?></span>
            <?php
            endif;
            ?>
        
            <label for="sinopsis">Sinopsis</label>
            <textarea id="sinopsis" name="sinopsis" class="form-field"> <?= isset($oldData['sinopsis']) ? $oldData['sinopsis'] : '';?></textarea>
            <?php
            if(isset($errores['sinopsis'])):
            ?>
            <span class="errorR"><?= $errores['sinopsis'];?></span>
            <?php
            endif;
            ?>
            
            <label for="paginas">Páginas</label>
            <input type="number" name="paginas" <?= isset($oldData['paginas']) ? $oldData['paginas'] : '';?> id="paginas" min="10">
            
             <?php
            if(isset($errores['paginas'])):
            ?>
            <span class="errorR"><?= $errores['paginas'];?></span>
            <?php
            endif;
            ?>
            
            
            <label for="precio">Precio</label>
            <input type="number" name="precio" <?= isset($oldData['precio']) ? $oldData['precio'] : '';?> id="precio" min="10">
            
             <?php
            if(isset($errores['precio'])):
            ?>
            <span class="errorR"><?= $errores['precio'];?></span>
            <?php
            endif;
            ?>
            
            
            <label for="imagen">Imagen</label>
            <input type="file" id="imagen" name="imagen" class="form-field">
            <?php
            if(isset($errores['imagen'])):
            ?>
            <span class="errorR"><?= $errores['imagen'];?></span>
            <?php
            endif;
            ?>
        
        
     <input type="submit" class="enviar" value="Crear">
        </fieldset>
    </form>
</section>