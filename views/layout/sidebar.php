<!-- BARRA LATERAL -->
<aside id="lateral">

<?php if(isset($_SESSION['identity']) ): ?>
  <div id="carrito" class="block_aside">
    <h3>Mi carrito de compras</h3>
    <ul>
      <?php  $stats=Utils::statsCarrito()?>
      <li><a href="<?=base_url?>carrito/index">Cantidad de productos: <?=$stats['count']?></a></li>
      <li><a href="<?=base_url?>carrito/index">Total de gasto: $<?=$stats['total']?></a></li>
      <li><a href="<?=base_url?>carrito/index">Ver el carrito</a></li>
    </ul>
  </div>
<?php endif; ?>

  <div id="login" class="block_aside">

<?php if(!isset($_SESSION['identity'])):?>
    <h3>Entrar a la Web</h3>
    <form class="" action="<?=base_url?>usuario/login" method="post">
        <label for="email">Email</label>
        <input type="email" name="email" value="">

        <label for="password">Contraseña</label>
        <input type="password" name="password" value="">

        <input type="submit" name="" value="Enviar">
    </form>

<?php else: ?>
      <h3><?=$_SESSION['identity']->nombre?>  <?=$_SESSION['identity']->apellido?></h3>
<?php endif;  ?>

    <ul>
      <?php if(isset($_SESSION['admin'])): ?>
            <li><a href="<?=base_url?>categoria/index">Gestionar categorias</a></li>
            <li><a href="<?=base_url?>producto/gestion">Gestionar productos</a></li>  <!-- Estos dos enlases solo se muestran si me logeo y soy admin  -->
            <li><a href="<?=base_url?>pedido/gestion">Gestionar pedidos</a></li>
      <?php endif; ?>
      <?php if(isset($_SESSION['identity'])):?>
        <li><a href="<?=base_url?>pedido/misPedidos">Mis pedidos</a></li>  <!-- Estos dos enlases solo se muestran si me logeo  -->
        <li><a href="<?=base_url?>usuario/logout">Cerrar sesion</a></li>
      <?php else:?>
          <li><a href="<?=base_url?>usuario/registro">Registrate aqui</a></li>
      <?php endif;?>
    </ul>

  </div>
</aside>
<!-- CONTENIDO CENTRAL -->
<div id="central">
