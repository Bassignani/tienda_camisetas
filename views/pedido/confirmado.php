<?php if(isset($_SESSION['pedido']) && $_SESSION['pedido']=='complete'): ?>

    <h1>Tue pedido se ha cofirmado</h1>
    <p>Tu pedido ha sido guardado con exito. Una vez que realices la transferencia bancaria a la cuenta 321763514ffsda con el coste del pedido sera prosesado y enviado</p>
    <br>
    <?php if(isset($pedido)): ?>
          <h3>Datos del pedido</h3>  <br>

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
<?php elseif(isset($_SESSION['pedido']) && $_SESSION['pedido']!='complete'): ?>
  <h1>Tue pedido no ha podido procesarce</h1>
  <p>Hubo un error en el procesamiento de tu pedido, por favor intenta mas tarde</p>
<?php endif; ?>
