<h1>Registarse</h1>

<?php if (isset($_SESSION['register']) && $_SESSION['register']=='completed'):?>
  <strong class="alert_green">Registro completado correctamente</strong>
<?php elseif (isset($_SESSION['register']) && $_SESSION['register']=='failed'): ?>
  <strong class="alert_red">Fallo en el registro, introduce bien los datos</strong>
<?php endif; ?>
<?php Utils::deleteSession('register'); ?>

<form action="<?=base_url?>usuario/save" method="post">
  <label for="nombre">Nombre</label>
  <input type="text" name="nombre" required/> <!-- Los required son para q no te deje enviar el formulario si no completas los datos -->

  <label for="apellido">Apellido</label>
  <input type="text" name="apellido" required/>

  <label for="email">Email</label>
  <input type="email" name="email" required/>

  <label for="password">Contraseña</label>
  <input type="password" name="password" required/>

  <input type="submit" name="" value="Registrarse">
</form>
