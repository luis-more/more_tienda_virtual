const btnRegister = document.querySelector('#btnRegister');
const btnLogin = document.querySelector('#btnLogin');
const frmRegister = document.querySelector('#frmRegister');
const frmLogin = document.querySelector('#frmLogin');

//capturamos los imputs de regsitro y el boton
const registrarse = document.querySelector('#registrarse');
const login = document.querySelector('#login');
const nombreRegistro = document.querySelector('#nombreRegistro');
const correoRegistro = document.querySelector('#correoRegistro');
const claveRegistro = document.querySelector('#claveRegistro');

const correoLogin = document.querySelector('#correoLogin');
const claveLogin = document.querySelector('#claveLogin');

const modalLogin = new bootstrap.Modal(document.getElementById('modalLogin'));

const inputBusqueda = document.querySelector('#inputModalSearch');

document.addEventListener("DOMContentLoaded", function () {
  btnRegister.addEventListener('click', function(){
    frmLogin.classList.add('d-none');
    frmRegister.classList.remove('d-none');
  });
  btnLogin.addEventListener('click', function(){
    frmRegister.classList.add('d-none');
    frmLogin.classList.remove('d-none');
  });

  //regitro de usuarios
  registrarse.addEventListener('click', function(){
    if(nombreRegistro.value == '' || correoRegistro.value == '' || claveRegistro.value == ''){
      Swal.fire(
        "Avizo?",
        'TODOS LOS CAMPOS SON REQUERIDOS',
        'warning'
      );
      return;
    }else{
      let formData = new FormData();
      formData.append('nombre', nombreRegistro.value);
      formData.append('correo', correoRegistro.value);
      formData.append('clave', claveRegistro.value);
  
   const url = base_url + "clientes/registroDirecto";
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(formData);
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        const res = JSON.parse(this.responseText);
        Swal.fire(
          "Avizo?",
          res.msg,
          res.icono
        );
        if(res.icono == 'success'){
          setTimeout(() => {
            enviarCorreo(correoRegistro.value, res.token);
          }, 2000);
        }
      }
    }
  }
  });

//
//login directo
login.addEventListener('click', function(){
  if(correoLogin.value == '' || claveLogin.value == ''){
    Swal.fire(
      "Avizo?",
      'TODOS LOS CAMPOS SON REQUERIDOS',
      'warning'
    );
    return;
  }else{
    let formData = new FormData();
    formData.append('correoLogin', correoLogin.value);
    formData.append('claveLogin', claveLogin.value);

 const url = base_url + "clientes/loginDirecto";
  const http = new XMLHttpRequest();
  http.open("POST", url, true);
  http.send(formData);
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      Swal.fire(
        "Avizo?",
        res.msg,
        res.icono
      );
      if(res.icono == "success"){
        setTimeout(()=>{
          window.location.reload();
        }, 2000)
      }
     
    }
  }
}
});

//busqueda de productos ..... buscador.........
inputBusqueda.addEventListener('keyup', function(e){
  const url = base_url + "principal/busqueda";
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      //const res = JSON.parse(this.responseText);
    }
  }
})

});

//enviar  correo
function enviarCorreo(correo, token){
  let formData = new FormData();
  formData.append("token", token);
  formData.append("correo", correo);
  const url = base_url + "clientes/enviarCorreo";
  const http = new XMLHttpRequest();
  http.open("POST", url, true);
  http.send(formData);
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      Swal.fire(
        "Avizo?",
        res.msg,
        res.icono
      );
      if(res.icono == 'success'){
        setTimeout(() => {
          window.location.reload();
        }, 2000);
      }
    }
  }
}

//cerrar el modal login 
function abrirModalLogin() {
  myModal.hide();
  modalLogin.show();
}