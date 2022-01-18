<h1>Carrito de la compra</h1>

<?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito'])>=1 ): ?>
<table>
  <tr>
    <th>Imagen</th>
    <th>Nombre</th>
    <th>Precio</th>
    <th>Unidades</th>
    <th>Eliminar</th>
  </tr>
  <?php foreach($carrito as $indice => $elemento):
        $producto = $elemento['producto'];
  ?>
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
        <?= $elemento['unidades']?>
        <div class="updown-unidades">
          <a href="<?=base_url?>?controller=carrito&action=up&index=<?=$indice?>"  class="button">+</a>
          <a href="<?=base_url?>?controller=carrito&action=down&index=<?=$indice?>" class="button">-</a>
        </div>
      </td>
      <td>
        <a href="<?=base_url?>?controller=carrito&action=delete&index=<?=$indice?>" class="button button-carrito button-red">Quitar producto</a>
      </td>
    </tr>

  <?php endforeach; ?>
</table>
<div class="total-carrito">
    <?php $stats=Utils::statsCarrito();?>
    <h3>Precio total: $<?=$stats['total'];?></h3>
    <h3>Cantidad de productos: <?=$stats['count'];?></h3>
    <a href="<?=base_url?>pedido/hacer" class="button button-pedido">Hacer pedido</a>
    <a href="<?=base_url?>carrito/deleteAll" class="button button-borrar">Vaciar carrito</a>
</div>

<?php else: ?>
  <p>El carrito esta vacio añade algun producto</p>
<?php endif; ?>
