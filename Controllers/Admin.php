<?php
class Admin extends Controller
{
    public function __construct() {
        parent::__construct();
        session_start();
    }

    public function index()
    {
        $data['title'] = 'Acceso al sistema';
        $this->views->getView('admin', "login", $data); 
    }

    public function validar()
    {
        if(isset($_POST['email']) && isset($_POST['clave'])){
            if(empty($_POST['email']) || empty($_POST['clave'])){
                $respuesta = array('msg' => 'Todos los campos son requeridos', 'icono' => 'warning');
            }else{
                $data = $this->model->getUsuario($_POST['email']);
                if(empty($data)){
                    $respuesta = array('msg' => 'El correo no existe', 'icono' => 'warning');
                }else{
                    if(password_verify($_POST['clave'], $data['clave'])){
                        $_SESSION['email'] =  $data['correo'];
                        $respuesta = array('msg' => 'Datos correctos', 'icono' => 'success'); 
                    }else{
                        $respuesta = array('msg' => 'Contraseña incorrecta', 'icono' => 'warnibg'); 
                    }
                }
            }
        }else{
            $respuesta = array('msg' => 'Error desconocido', 'icono' => 'error');
        }
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function home()
    {
        $data['title'] = 'Panel Administrativo';
        $this->views->getView('admin/administracion', "index", $data); 
    }   
}