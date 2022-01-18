<h1>Gestionar de productos</h1>
<a href="<?=base_url?>producto/crear" class="button button-small">Crear Producto</a>

<?php if (isset($_SESSION['producto']) && $_SESSION['producto']=='complete') :?>
  <strong class="alert_green">El producto se ha creado correctamente</strong>
<?php elseif (isset($_SESSION['producto']) && $_SESSION['producto']=='filed') :?>
    <strong class="alert_red">Error al crear el producto</strong>
<?php endif; ?>
<?php Utils::deleteSession('producto'); ?>


<?php if (isset($_SESSION['delete']) && $_SESSION['delete']=='complete') :?>
  <strong class="alert_green">El producto se ha borrado</strong>
<?php elseif (isset($_SESSION['delete']) && $_SESSION['delete']=='filed') :?>
    <strong class="alert_red">Error al borrar el producto</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>

<table>
    <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Acciones</th>


    </tr>
  <?php while($pro = $productos->fetch_object()): ?>
      <tr>
          <td><?=$pro->id;?></td>
          <td><?=$pro->nombre;?></td>
          <td><?=$pro->precio;?></td>
          <td><?=$pro->stock;?></td>
          <td>
            <a href="<?=base_url?>?controller=producto&action=editar&id=<?=$pro->id;?>" class="button button-gestion" method="get">Editar</a>
				    <a href="<?=base_url?>?controller=producto&action=eliminar&id=<?=$pro->id?>" class="button button-gestion button-red">Eliminar</a>
          </td>

      </tr>
  <?php endwhile; ?>
</table>
