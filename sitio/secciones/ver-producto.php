<?php
require 'librerias/info-productos.php';

$id = $_GET['id'];

$producto = traerProductoPorId($db, $id);
$generos    = traerGenerosDeProductosPorId($db, $id);
?>
<main>
    <h2><?= $producto['titulo'];?></h2>

    <div class="productoDetalle">
        <picture>
            <source srcset="img/<?= str_replace('.jpg', '-big.jpg', $producto['imagen']);?>" media="all and (min-width: 600px)">

            <img src="img/<?= $producto['imagen'];?>" alt="<?= $producto['imagen'];?>">
        </picture>

        <h3>Sinopsis:</h3>
        <p><?= $producto['sinopsis'];?></p>

        <h3>Más detalles:</h3>
        <div>
           <table>
            <tr>
                <td>Título:</td>
                <td><?= $producto['titulo'];?></td>
                
            </tr>
            <tr>
                <td>Páginas:</td>
                <td><?= $producto['paginas'];?></td>
                
            </tr>
            <tr>
                <td>Precio:</td>
                <td><?= $producto['precio'];?></td>
                
            </tr>
            <tr>
                <td>Géneros:</td>
                <td><?php
                /*foreach($generos as $genero):
                ?>
                <?= $genero['generos'];?>
                <?php
                endforeach;*/
//                    echo "<pre>";
                    $lista = array_map(function($val) {
                        return $val['generos'];
                    }, $generos);
                    echo implode(', ', $lista);
//                    print_r($generos);
//                    print_r($lista);
//                    echo "</pre>";
                ?></td>
            </tr>
        </table>
       
       </div>

    </div>
</main>
