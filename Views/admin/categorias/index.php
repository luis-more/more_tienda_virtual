<?php include_once 'Views/template/header-admin.php'; ?>

<button type="button" class="btn btn-primary mb-2" id="nuevo_registro">Nueva categoria</button>

<div class="card">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped table-hover align-middle" style="width: 100%;" id="tblCategorias">
        <thead class="">
          <tr>
            <th>#</th>
            <th>Nombres</th>
            <th>Imagen</th>
            <th></th>
          </tr>
        </thead>

      </table>
    </div>
  </div>
</div>

<div id="nuevoModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="titleModal"></h5>
        <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <form id="frmRegistro">
        <div class="modal-body">
          <input type="hidden" id="id" name="id">
          <input type="hidden" id="imagen_actual" name="imagen_actual">
          <div class="form-group mb-2">
            <label for="categoria">Nombres</label>
            <input id="categoria" class="form-control" type="text" name="categoria" placeholder="Categoria">
          </div>
          <div class="form-group">
            <label for="imagen">Imagen (Opcional)</label>
            <input type="file" class="form-control-file" name="imagen" id="imagen" placeholder="" aria-describedby="fileHelpId">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="btnAccion">Registrar</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </form>

    </div>
  </div>
</div>

<?php include_once 'Views/template/footer-admin.php'; ?>
<script src="<?php echo BASE_URL . 'assets/js/modulos/categorias.js'; ?>"></script>

</body>

</html>