<?php
require '../librerias/info-productos.php';

if(isset($_SESSION['old_data'])) {
    $oldData = $_SESSION['old_data'];
    $errores = $_SESSION['errores'];
    unset($_SESSION['old_data'], $_SESSION['errores']);
} else {
    $oldData = traerProductoPorId($db, $_GET['id']);
}
?>


<section>
    <h2>Editar Producto</h2>
    
    <form action="acciones/subir-editar-producto.php?id=<?= $_GET['id'];?>" method="post" enctype="multipart/form-data">
       <fieldset>
            <input type="hidden" name="imagen_actual" value="<?= $oldData['imagen'];?>">
        
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
                <textarea name="sinopsis" id="sinopsis"><?= isset($oldData['sinopsis']) ? $oldData['sinopsis'] : '';?></textarea>
            <?php
            if(isset($errores['sinopsis'])):
            ?>
            <span class="errorR"><?= $errores['sinopsis'];?></span>
            <?php
            endif;
            ?>
        
        
            <label for="paginas">Páginas</label>
            <input type="number" name="paginas" value="<?= isset($oldData['paginas']) ? $oldData['paginas'] : '';?>" id="paginas" min="10">
            
             <?php
            if(isset($errores['paginas'])):
            ?>
            <span class="errorR"><?= $errores['paginas'];?></span>
            <?php
            endif;
            ?>
            
            
            <label for="precio">Precio</label>
            <input type="number" name="precio"  value = "<?= isset($oldData['precio']) ? $oldData['precio'] : '';?>" id="precio" min="10" >
            
             <?php
            if(isset($errores['precio'])):
            ?>
            <span class="errorR"><?= $errores['precio'];?></span>
            <?php
            endif;
            ?>
            
    
            <p class="errorR">Si deseas cambiar la imagen subí una nueva, de lo contrario no subas nada.</p>
        
            <label for="imagen">Imagen</label>
            <input type="file"  name="imagen" id="imagen">
            <?php
            if(isset($errores['imagen'])):
            ?>
            <div class="form-error"><?= $errores['imagen'];?></div>
            <?php
            endif;
            ?>
        
        
        <input type="submit" class="enviar" value="Editar">
        
    </fieldset>    
    </form>
</section>