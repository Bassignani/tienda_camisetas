<h1>Detalle del pedido</h1>

<?php if(isset($pedido)): ?>
      <?php if (isset($_SESSION['admin'])) :?>
          <h3>Cambiar estado del pedido</h3>
          <form class="" action="<?=base_url?>pedido/estado" method="post">
              <input type="hidden" name="pedido_id" value="<?=$pedido->id;?>">   <!-- De esta forma el id del pedido viaja por POST en la cabecera de la URL -->
              <select class="" name="estado">
                <option value="confirm" <?=$pedido->estado == "confirm" ? 'selected' : '';?>>Pendiente</option>
                <option value="preparation" <?=$pedido->estado == "preparation" ? 'selected' : '';?>>En preparacion</option>
                <option value="ready" <?=$pedido->estado == "ready" ? 'selected' : '';?>>Listo para enviar</option>
                <option value="sended" <?=$pedido->estado == "sended" ? 'selected' : '';?>>Enviado</option>
              </select>
              <input type="submit" name="" value="Cambiar estado">
          </form>
      <?php endif; ?>

      <h3>Dotos de Envio</h3>
      Provinco: <?=$pedido->provincia;?> <br>
      Localidad: <?=$pedido->localidad;?> <br>
      Direccio: <?=$pedido->direccion;?><br>

      <h3>Datos del pedido</h3>
      Estado: <?=Utils::showStatus($pedido->estado);?> <br>
      Numero de pedido: <?=$pedido->id;?> <br>
      Total a pagar: $<?=$pedido->coste;?> <br>
      Productos:
      <table>
      <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>
      </tr>
      <?php while($producto = $productos->fetch_object()): ?>


            <tr>
              <td>
                <?php if($producto->imagen!=null): ?>
                <img src="<?=base_url?>uploads/images/<?=$producto->imagen;?>"  class="img_carrito"/>  <!-- Si tiene imagen la muestra -->
                <?php else: ?>
                <img src="<?=base_url?>assets/img/camiseta.png" class="img_carrito"/>  <!-- sino miestra la del logo -->
                <?php endif; ?>
              </td>
              <td>
                <a href="<?=base_url?>?controller=producto&action=ver&id=<?=$producto->id?>"> <?= $producto->nombre?></a>
              </td>
              <td>
                <?= $producto->precio?>
              </td>
              <td>
                <?= $producto->unidades?>
              </td>
            </tr>

      <?php endwhile; ?>
      </table>
<?php endif; ?>
