<?php


if(isset($_SESSION['errores'])) {
    $errores = $_SESSION['errores'];
    $oldData = $_SESSION['old_data'];
    unset($_SESSION['errores'], $_SESSION['old_data']);
} else {
    $errores = [];
    $oldData = [];
}
?>
<section>
   
        <h2>Iniciar Sesión</h2>

        <?php
        if(isset($errores['login'])):
        ?>
        <div class="error"><?= $errores['login'];?></div>
        <?php
        endif;
        ?>

        <form method="post" action="acciones/hacer-login.php" class="form">
            <fieldset>
                <label for="email">E-mail</label>
                <input type="email" name="email" value="<?= isset($oldData['email']) ? $oldData['email'] : '';?>" placeholder="Ingresa tu E-mail." id="email">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Ingresa tu contraseña." id="password">
                <input type="submit" class="enviar" value="Iniciar Sesión">
            </fieldset>
        </form>

       <a href="index.php?s=registrar"><h3>¿No tenes cuenta? ¡Registrate!</h3></a>

     
    
</section>
