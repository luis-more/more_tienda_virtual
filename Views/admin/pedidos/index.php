<?php include_once 'Views/template/header-admin.php'; ?>
<!--inicio tabs y navs -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#listaPedidos" type="button"
      role="tab" aria-controls="listaPedidos" aria-selected="true">Pedidos</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="proceso-tab" data-bs-toggle="tab" data-bs-target="#listaProceso" type="button"
      role="tab" aria-controls="listaProceso" aria-selected="false">proceso</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#pedidosFinalizados" type="button"
      role="tab" aria-controls="pedidosFinalizados" aria-selected="false">Finalizados</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <!---primer tap-->
  <div class="tab-pane fade show active" id="listaPedidos" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-hover align-middle" style="width: 100%;"
            id="tblPendientes">
            <thead class="">
              <tr>
                <th>Id Transaccion</th>
                <th>Monto</th>
                <th>Estado</th>
                <th>Fecha</th>
                <th>Correo</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Dirección</th>
                <th></th>
              </tr>
            </thead>

          </table>
        </div>
      </div>
    </div>
  </div>
  <!---segundo tap-->
  <div class="tab-pane fade" id="listaProceso" role="tabpanel" aria-labelledby="proceso-tab" tabindex="0">
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-hover align-middle" style="width: 100%;"
            id="tblProceso">
            <thead class="">
              <tr>
                <th>Id Transaccion</th>
                <th>Monto</th>
                <th>Estado</th>
                <th>Fecha</th>
                <th>Correo</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Dirección</th>
                <th></th>
              </tr>
            </thead>

          </table>
        </div>
      </div>
    </div>
  </div>
  <!---tercer tap-->
  <div class="tab-pane fade" id="pedidosFinalizados" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-hover align-middle" style="width: 100%;"
            id="tblFinalizados">
            <thead class="">
              <tr>
                <th>Id Transaccion</th>
                <th>Monto</th>
                <th>Estado</th>
                <th>Fecha</th>
                <th>Correo</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Dirección</th>
                <th></th>
              </tr>
            </thead>

          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!--fin -->

<div id="modalPedidos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Productos</h5>
        <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-border table-striped table-hover align-middle" id="tablePedidos"
            style="width: 100%;">
            <thead>
              <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Sub Total</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once 'Views/template/footer-admin.php'; ?>
<script src="<?php echo BASE_URL . 'assets/js/modulos/pedidos.js'; ?>"></script>

</body>

</html>