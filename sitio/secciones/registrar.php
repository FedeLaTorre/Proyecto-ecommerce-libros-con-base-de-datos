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
      <h2>Crear cuenta</h2>
    
      <form method="post" action="acciones/registrar.php" enctype="multipart/form-data">
          <fieldset>

              <label for="email_r">Email</label>
              <input type="email" name="email"  value="<?= $oldData['email_r'] ?? '';?>" placeholder="Ingresa tu E-mail." id="email_r">
              <?php
            if(isset($errores['email'])):
            ?>
              <span class="errorR"><?= $errores['email'];?></span>
              <?php
            endif;
            ?>


              <label for="password">Password</label>
              <input type="password" name="password" placeholder="Ingresa tu contraseña." id="password">
              <?php
            if(isset($errores['password'])):
            ?>
              <span class="errorR"><?= $errores['password'];?></span>
              <?php
            endif;
            ?>


              <label for="cpassword_r">Confirmar Password</label>
              <input type="password" name="cpassword" placeholder="Confirma tu contraseña." id="cpassword_r">



              <label for="nombre">Nombre</label>
              <input type="text" name="nombre" value="<?= $oldData['nombre'] ?? '';?>" placeholder="Ingresa tu nombre." id="nombre">


              <label for="apellido">Apellido</label>
              <input type="text" name="apellido" value="<?= $oldData['apellido'] ?? '';?>" placeholder="Ingresa tu apellido." id="apellido">

                <input type="submit" class="enviar" value="Registrarse">
              
          </fieldset>
      </form>
  </section>
