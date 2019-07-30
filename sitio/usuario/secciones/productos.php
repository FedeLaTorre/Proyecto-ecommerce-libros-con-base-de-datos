<?php
require '../librerias/info-productos.php';

$productos = traerProductos($db);
?>
<div id="main-panel">
    <h2>Lista de todos los productos</h2>
    
    
            
    <div id="libros">
            <?php
           foreach($productos as $unProducto):
        ?>
            <h3 class="tituloproducto">
                <?= $unProducto['titulo'];?>
            </h3>
            <div class="listado">
                <picture>
                    <source srcset="../img/<?= str_replace('.jpg', '-big.jpg', $unProducto['imagen']);?>" media="all and (min-width: 600px)">
                    <img src="img/<?= $unProducto['imagen'];?>" alt="<?= $unProducto['imagen'];?>">
                </picture>

                <p>Sinopsis:
                    <?= $unProducto['sinopsis'];?>
                </p>
                
                <p><a href="index.php?s=editar-producto&id=<?= $unProducto['idproductos'];?>">Editar</a></p>
                 <p><a href="acciones/eliminar-producto.php?id=<?= $unProducto['idproductos'];?>">Eliminar</a></p>
            </div>
            <?php
        endforeach;
        ?>
        </div>
    
</div>





