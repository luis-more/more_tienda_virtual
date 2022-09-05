const btnAddDeseo = document.querySelectorAll(".btnAddDeseo");
const btnAddCarrito = document.querySelectorAll(".btnAddCarrito");
const btnDeseo = document.querySelector("#btnCantidadDeseo");
const btnCarrito = document.querySelector("#btnCantiadCarrito");
const verCarrito = document.querySelector('#verCarrito');
const tableListaCarrito = document.querySelector('#tableListaCarrito tbody'); 

	//ver carrito
	const myModal = new bootstrap.Modal(document.getElementById('myModal'))

let listaDeseo, listaCarrito;

document.addEventListener("DOMContentLoaded", function () {
	if (localStorage.getItem("listaDeseo") != null) {
		listaDeseo = JSON.parse(localStorage.getItem("listaDeseo"));
	}
    if (localStorage.getItem("listaCarrito") != null) {
		listaCarrito = JSON.parse(localStorage.getItem("listaCarrito"));
	}

	//lista de deseo
	for (let i = 0; i < btnAddDeseo.length; i++) {
		btnAddDeseo[i].addEventListener("click", function () {
			let idProducto = btnAddDeseo[i].getAttribute("prod");
			agregarDeseo(idProducto);
		});
	}

	//lista de carrito de compras
	for (let i = 0; i < btnAddCarrito.length; i++) {
		btnAddCarrito[i].addEventListener("click", function () {
			let idProducto = btnAddCarrito[i].getAttribute("prod");
			agregarCarrito(idProducto, 1);
		});
	}
    
  cantidadDeseo();
  cantidadCarrito();

verCarrito.addEventListener('click', function(){
		getListaCarrito();
		myModal.show();
	})
});

//agregar productos  ala lista de deseos
function agregarDeseo(idProducto) {
	if (localStorage.getItem("listaDeseo") == null) {
		listaDeseo = [];
	} else {
		let listaExiste = JSON.parse(localStorage.getItem("listaDeseo"));
		for (let i = 0; i < listaExiste.length; i++) {
			if (listaExiste[i]["idProducto"] == idProducto) {
				Swal.fire(
					"Avizo?",
					" EL PRODUCTO YA ESTA A LA LISTA DE DESEO",
					"warning"
				);
				return;
			}
		}
		listaDeseo.concat(localStorage.getItem("listaDeseo"));
	}

	//mensaje del swetalert2
	listaDeseo.push({
		idProducto: idProducto,
		cantidad: 1,
	});
	localStorage.setItem("listaDeseo", JSON.stringify(listaDeseo));
	//codigo para la alerta swetalert2
	Swal.fire("Avizo?", "PRODUCTO AGREGADO A LA LISTA DE DESEOS ", "success");

	cantidadDeseo();
}

//recupera los click en el boton deseo
function cantidadDeseo() {
	let listas = JSON.parse(localStorage.getItem("listaDeseo"));
	if (listas != null) {
		btnDeseo.textContent = listas.length;
	} else {
		btnDeseo.textContent = textContent = 0;
	}
}

//agregar productos al carrito de compras
function agregarCarrito(idProducto, cantidad, accion = false) {
	if (localStorage.getItem("listaCarrito") == null) {
		listaCarrito = [];
	} else {
		let listaExiste = JSON.parse(localStorage.getItem("listaCarrito"));
		for (let i = 0; i < listaExiste.length; i++) {
			if (accion) {
				eliminarListaDeseo(idProducto);
			}

			if (listaExiste[i]["idProducto"] == idProducto) {
				Swal.fire("Avizo?", " EL PRODUCTO YA ESTA AGREGADO", "warning");
				return;
			}
		}
		listaCarrito.concat(localStorage.getItem("listaCarrito"));
	}

	//mensaje del swetalert2
	listaCarrito.push({
		idProducto: idProducto,
		cantidad: cantidad,
	});
	localStorage.setItem("listaCarrito", JSON.stringify(listaCarrito));
	//codigo para la alerta swetalert2
	Swal.fire("Avizo?", "PRODUCTO AGREGADO AL CARRITO ", "success");

	cantidadCarrito();
}

//recupera los click en el boton del carrito
function cantidadCarrito() {
	let listas = JSON.parse(localStorage.getItem("listaCarrito"));
	if (listas != null) {
		btnCarrito.textContent = listas.length;
	} else {
		btnCarrito.textContent = textContent = 0;
	}
}

//ver el carrito
function getListaCarrito() {
  const url = base_url + "principal/listaProductos";
  const http = new XMLHttpRequest();
  http.open("POST", url, true);
  http.send(JSON.stringify(listaCarrito));
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      let html = "";
      res.productos.forEach((producto) => {
        html += `<tr>
                <td>
                <img class="img-thumbnail rounded-circle" src="${producto.imagen}" alt="" width="60">
                </td>
                <td>${producto.nombre}</td>
                <td><span class="badge bg-warning">${res.moneda + ' '+ producto.precio}</span></td>
                <td><span class="badge bg-primary">${producto.cantidad}</span></td>
                <td>${producto.subTotal}</td>
								<td>
								<button class="btn btn-danger btnDeletecart" type="button" prod="${producto.id}"><i class="fas fa-times-circle"></i></button>
								</td>
            </tr>`;
      });
      tableListaCarrito.innerHTML = html;
			document.querySelector('#totalGeneral').textContent = res.total;
      btnEliminarCarrito();
    }
  };

  function btnEliminarCarrito() {
    let listaEliminar = document.querySelectorAll(".btnDeletecart");
    for (let i = 0; i < listaEliminar.length; i++) {
      listaEliminar[i].addEventListener("click", function () {
        let idProducto = listaEliminar[i].getAttribute("prod");
        eliminarListaCarrito(idProducto);
      });
    }
  }
}

function eliminarListaCarrito(idProducto) {
for (let i = 0; i < listaCarrito.length; i++) {
	if (listaCarrito[i]["idProducto"] == idProducto) {
		listaCarrito.splice(i, 1);
	}
}
localStorage.setItem("listaCarrito", JSON.stringify(listaCarrito));
getListaCarrito();
cantidadCarrito();
Swal.fire("Avizo?", "PRODUCTO ELIMINADO DEL CARRITO", "success");
}



