<?php

require 'librerias/info-productos.php';

$productos = traerProductos($db);


?>
<main>

    <section>
        <h2>Nuestros libros</h2>
        <div id="libros">
            <?php
           foreach($productos as $unProducto):
        ?>
            <h3 class="tituloproducto">
                <?= $unProducto['titulo'];?>
            </h3>
            <div class="listado">
                <picture>
                    <source srcset="img/<?= str_replace('.jpg', '-big.jpg', $unProducto['imagen']);?>" media="all and (min-width: 600px)">
                    <img src="img/<?= $unProducto['imagen'];?>" alt="<?= $unProducto['imagen'];?>">
                </picture>

                <p>Sinopsis:
                    <?= $unProducto['sinopsis'];?>
                </p>
                
                <p><a href="index.php?s=ver-producto&id=<?= $unProducto['idproductos'];?>">Detalles</a></p>
            </div>
            <?php
        endforeach;
        ?>
        </div>
    </section>

</main>

