<?php if(isset($edit) && isset($pro)  && is_object($pro)): ?>
  <h1>Editar productos <?=$pro->nombre?></h1>
  <?php  $url_action = base_url."?controller=producto&action=save&id=".$pro->id;?>
<?php else: ?>
  <h1>Crear nuevos productos</h1>
  <?php  $url_action = base_url."producto/save" ;?>
<?php endif; ?>

<div class="form_container">
    <form class="" action="<?=$url_action?>" method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="<?= isset($pro)  && is_object($pro)? $pro->nombre : '' ; ?>" required>

        <label for="descripcion">descripcion</label>
        <textarea name="descripcion" rows="8" cols="80"><?= isset($pro)  && is_object($pro)? $pro->descripcion : '' ; ?></textarea>

        <label for="precio">Precio</label>
        <input type="text" name="precio" value="<?= isset($pro)  && is_object($pro)? $pro->precio : '' ; ?>" required>

        <label for="stock">Stock</label>
        <input type="number" name="stock" value="<?= isset($pro)  && is_object($pro)? $pro->stock : '' ; ?>" required>

        <label for="categoria_id">Categoria</label>
        <?php $categorias = Utils::showCategorias();?>
        <select class="" name="categoria_id">
            <?php while($cat = $categorias->fetch_object()): ?>
                <option value="<?=$cat->id?>" <?= isset($pro)  && is_object($pro) && $cat->id == $pro->categoria_id ? 'selected' : '' ; ?>>
                    <?= $cat->nombre?>
                </option>
            <?php endwhile; ?>
        </select>

        <label for="imagen">Imagen</label>
        <?php if (isset($pro)  && is_object($pro) && !empty($pro->imagen)): ?>
          <img src="<?=base_url?>uploads/images/<?=$pro->imagen?>" alt="" class="thumb">
        <?php endif;?>
        <input type="file" name="imagen" value="" >


        <input type="submit" name="" value="Guardar">



    </form>
</div>
