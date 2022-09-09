<?php include_once 'Views/template-principal/header.php';?>

    <!-- Start Content Page -->
    <div class="container-fluid bg-light py-5">
        <div class="col-md-6 m-auto text-center">
            <h1 class="h1">Contactanos</h1>
            <p>
                Contacta con nosotros, estamos para atenderte a la brebedad
            </p>
        </div>
    </div>

    <!-- Start Contact -->
    <div class="container py-5">
        <div class="row py-5">
            <form class="col-md-9 m-auto" role="form" id="frmContactos" >
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control mt-1" id="nombre" name="name" placeholder="Nombre" required>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control mt-1" id="email" name="email" placeholder="Email" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="mensaje">Mensaje</label>
                    <textarea class="form-control mt-1" id="message" placeholder="Mensaje"
                        rows="8"></textarea>
                </div>
                <div class="row">
                    <div class="col text-end mt-2">
                        <button type="submit" class="btn btn-success btn-lg px-3" id="btnContactos">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Contact -->


    <?php include_once 'Views/template-principal/footer.php'; ?>
     <!-- estos archivos para ´poder editar el mensaje en la seccion contactos -->
    <script src="<?php echo BASE_URL . 'assets/js/ckeditor.js'; ?>"></script>
    <script src="<?php echo BASE_URL . 'assets/js/modulos/contactos.js'; ?>"></script>
</body>

</html>