<?php include_once 'Views/template/header-principal.php';?>

<!-- Start Banner Hero -->
<div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
  <ol class="carousel-indicators">
    <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
    <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
    <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="container">
        <div class="row p-5">
          <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
            <img class="img-fluid" src="<?php echo BASE_URL; ?>assets/images/carrusel/pc_completa.png" alt="pc_comleta">
          </div>
          <div class="col-lg-6 mb-0 d-flex align-items-center">
            <div class="text-align-left align-self-center">
              <h1 class="h1 text-util"><b>COMPUTADORA + </b>TECLADO Y MOUSE</h1>
              <h3 class="h2">Oferta por timpo limitado</h3>
              <p>
                *Procesador A4 4000k whith Radeon HD GRAPHICS 3.00GHZ
                *MEMORIA RAM 4GB
                *DISCO DURO 500GB
                *PLACA MS - 7721 V2
                *MONITOR HP 20
                *TECLADO
                *MOUSE</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="container">
        <div class="row p-5">
          <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
            <img class="img-fluid" src="<?php echo BASE_URL; ?>assets/images/carrusel/utiles_escolares.png"
              alt="utiles_escolares">
          </div>
          <div class="col-lg-6 mb-0 d-flex align-items-center">
            <div class="text-align-left">
              <h1 class="h1">ÚTILES ESCOLARES Y DE OFICINA</h1>
              <h3 class="h2">Consigue las mejores marcas aqui!/</h3>
              <p>                
                 Aquí podrás encontrar lo último en
                útiles de oficina y colegio con el precio que tanto buscas. Consigue las marcas que quieres entre
                nuestro amplio surtido de productos, como Artesco, Faber Castell, Standford y muchas más Compra folders,
                 tajadores, tijeras, perforadores y muchos más productos Recuerda que puedes complementar tu compra con
                nuestras Mochilas, Loncheras y Cartucheras donde podrás guardar tus útiles.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="container">
        <div class="row p-5">
          <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
            <img class="img-fluid" src="<?php echo BASE_URL; ?>assets/images/carrusel/audifono2.jpg"
              alt="audifono-kotiong4000.jpg">
          </div>
          <div class="col-lg-6 mb-0 d-flex align-items-center">
            <div class="text-align-left">
              <h1 class="h1">AUDIFONO GAMER</h1>
              <h3 class="h2">KOTION EACH G4000 </h3>
              <p>
                CARACTERISTICAS: * Modelo KOTION EACH G4000 * Ideal para PC, Laptop, Smartphone, PS4, Xbox one, Nintendo
                Switch. * Sensibilidad 108dB +/- 3dB * Rango de frecuencia 20-20kHz * Dimensión micrófono 6.0 * 5.0mm *
                Sensibilidad del micrófono -38dB +/- 3dB * Directividad omnidireccional * LED Voltaje de trabajo dc5v
                +/- 5% * Corriente de trabajo por debajo de 100 mA * Tamaño de los auriculares
                aprox.18 * 8.5 * 21cm / 7.1 * 3.3 * Control de volumen en el cable. * Control Encendido y Apagado de
                Micrófono.
                * Conector Usb. iluminación Luz Led. * Adaptador Jack 3.5mm 4pines..
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button"
    data-bs-slide="prev">
    <i class="fa fa-chevron-left"></i>
  </a>
  <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button"
    data-bs-slide="next">
    <i class="fa fa-chevron-right"></i>
  </a>
</div>
<!-- End Banner Hero -->


<!-- Start Categories of The Month -->
<section class="container py-5">
  <div class="row text-center pt-3">
    <div class="col-lg-6 m-auto">
      <h1 class="h1">Categorias</h1>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, voluptatibus!
      </p>
    </div>
  </div>

  <div class="row">
    <?php foreach ($data['categorias'] as $categoria) { ?>
    <div class="col-12 col-md-3 p-5 mt-3">
      <a href="<?php echo BASE_URL . 'principal/categorias/' . $categoria['id']; ?>"><img
          src="<?php echo $categoria['imagen']; ?>" class="rounded-circle img-fluid border"></a>
      <h5 class="text-center mt-3 mb-3"><?php echo $categoria['categoria']; ?></h5>
    </div>
    <?php } ?>
  </div>
</section>
<!-- End Categories of The Month -->


<!-- Start Featured Product -->
<section class="bg-light">
  <div class="container py-5">
    <div class="row text-center py-3">
      <div class="col-lg-6 m-auto">
        <h1 class="h1">Productos</h1>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit, adipisci!
        </p>
      </div>
    </div>
    <div class="row">
      <?php foreach ($data['nuevoProductos'] as $producto) { ?>
      <div class="col-12 col-md-4 mb-4">
        <div class="card h-100">
          <a href="<?php echo BASE_URL .'principal/detail/' . $producto['id']; ?>">
            <img src="<?php echo $producto['imagen']; ?>" class="card-img-top" alt="<?php echo $producto['nombre']; ?>">
          </a>
          <div class="card-body">
            <ul class="list-unstyled d-flex justify-content-between">
              <li>
                <i class="text-warning fa fa-star"></i>
                <i class="text-warning fa fa-star"></i>
                <i class="text-warning fa fa-star"></i>
                <i class="text-muted fa fa-star"></i>
                <i class="text-muted fa fa-star"></i>
              </li>
              <li class="text-muted text-right"><?php echo MONEDA . ' ' .$producto['precio']; ?></li>
            </ul>
            <a href="<?php echo BASE_URL .'principal/detail/' . $producto['id']; ?>"
              class="h2 text-decoration-none text-dark"><?php echo $producto['nombre']; ?></a>
            <p class="card-text">
              <?php echo $producto['descripcion']; ?>
            </p>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</section>
<!-- End Featured Product -->

<?php include_once 'Views/template/footer-principal.php';?>

</body>

</html>