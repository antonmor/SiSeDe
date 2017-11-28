<?php
 
class Principal extends Controller {
 
  function Principal()
  {
    parent::Controller();
    $this->load->helper(array('url', 'form'));
    $this->load->library('form_validation');
  }
 
  // Función index. Comprueba si existe la sesión de usuario
  function index()
  {
    // si no existe la sesión con la variable 'usuario_id'
    if (!$this->session->userdata('usuario_id')){
      // redirigimos a la función login
      redirect('principal/login', 'refresh');
    } else {
      // en caso contrario cargamos la vista principal
      $this->load->view('coficial');
  }
 
  // Función login. Verifica el usuario/contraseña
  function login()
  {
    // si se ha enviado el formulario
    if ($this->input->post('usuario')){
      // recogemos las variables 'usuario' y 'contrasena'
      $usuario = $this->input->post('usuario');
      $contrasena = sha1($this->input->post('contrasena'));
      // cargamos el modelo para verificar el usuario/contraseña
      $this->load->model('Autenticacion_Model');
      // si el usuario y contraseña son correctos
      if ($this->Admin_Model->verificaUsuario($usuario, $contrasena)){
        // creamos un array con las variables de sesión 'usuario_id' y 'login_ok'
        $datasession = array(
          'usuario_id'  => '$usuario',
          'login_ok' => TRUE
        );
        // creamos la sesión con dichas variables
        $this->session->set_userdata($datasession);
        // y redirigimos al controlador principal
        redirect('principal', 'refresh');
      } else {
        // si el usuario y contraseña son incorrectos
        $this->session->set_flashdata('error', 'El usuario o contraseña son incorrectos.');
      }
    } else {
      // cargamos el formulario de login
      $this->load->view('');
    }
  }
 
  // Función logout. Elimina las variables de sesión y redirige al controlador principal
  function logout()
  {
    // creamos un array con las variables de sesión en blanco
    $datasession = array('usuario_id' => '', 'logged_in' => '');
    // y eliminamos la sesión
    $this->session->unset_userdata($datasession);
    // redirigimos al controlador principal
    redirect('principal', 'refresh');
  }
 
}