<?php if(isset($_SESSION['identity'])): ?>
      <h1>Hacer pedido</h1>
      <a href="<?=base_url?>carrito/index">Ver los productos selecionados</a>

      <p>
          <h3>Datos para el envio</h3>
      </p>

      <form class="" action="<?=base_url?>pedido/add" method="post">
          <label for="provincia">Provincia</label>
          <input type="text" name="provincia" value="" required/>

          <label for="localidad">Localidad</label>
          <input type="text" name="localidad" value="" required/>

          <label for="direccion">Direccion</label>
          <input type="text" name="direccion" value="" required/>

          <input type="submit" name="" value="Confirmar">
      </form>
<?php else: ?>
      <h1>Necesitas estar identificado</h1>
      <p>Necesitas estar logueado en la web para poder finalizar tu pedido</p>
<?php endif; ?>
