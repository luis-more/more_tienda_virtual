const frm = document.querySelector('#frmRegistro');
const btnAccion = document.querySelector('#btnAccion');
let tblProductos;

document.addEventListener("DOMContentLoaded", function () {
  //cargar datos pendientes con data tables
  tblProductos = $('#tblProductos').DataTable({
    ajax: {
      url: base_url + 'productos/listar',
      dataSrc: ''
  },
    columns: [
        { data: 'id' },
        { data: 'nombre' },
        { data: 'precio' },
        { data: 'cantidad' },
        { data: 'imagen' },
        { data: 'accion' }
    ],
   
  });

  //submit productos
  frm.addEventListener('submit', function(e){
    e.preventDefault();
    let data = new FormData(this);
    const url = base_url + "productos/registrar";
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(data);
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
        const res = JSON.parse(this.responseText);
        if(res.icono == 'success'){
          frm.reset();
          tblProductos.ajax.reload();
          document.querySelector('#imagen').value = '';
        }
        Swal.fire("Avizo?", res.msg.toUpperCase(), res.icono);
  }
 }
  });
});

function eliminarCat(idCat){
  Swal.fire({
    title: 'Aviso?',
    text: "Esta seguro de eliminar el registro!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, eliminar!'
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "categorias/delete/" + idCat;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText);
          const res = JSON.parse(this.responseText);
          if(res.icono == 'success'){
            tblCategorias.ajax.reload();
          }
          Swal.fire("Avizo?", res.msg.toUpperCase(), res.icono);
    }
   }
    }
  })
}

function editCat(idCat){
  const url = base_url + "categorias/edit/" + idCat;
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      const res = JSON.parse(this.responseText);
      document.querySelector('#id').value = res.id;
      document.querySelector('#categoria').value = res.categoria;
      document.querySelector('#imagen_actual').value = res.imagen;
      btnAccion.textContent = 'Actualizar';
      titleModal.textContent = 'ACTUALIZAR CATEGORIA';
      myModal.show();
      //$('#nuevoModal').modal('show');
    }
  }
}