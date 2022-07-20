<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('UsuarioModel');
	}

	public function index()
	{
		$this->form_validation->set_rules('usuario', 'USUARIO NO VALIDO', 'required|valid_email');
		$this->form_validation->set_rules('contrasena', 'CONTRASEÑA NO VALIDA', 'trim|required|min_length[8]');
		if ($this->form_validation->run()){
			$usuario = $this->input->post("usuario");
			$contrasena = $this->input->post("contrasena");
			$data=$this->UsuarioModel->get_usuario($usuario, $contrasena);

			if($data->num_rows() == 1){
				//echo "hola";
				 foreach ($data->result() as $res) {
				 	
				 	$array= array(
				 		'id' => $res->id,
				 		'nombre' => $res->nombre,
				 		'apellido' => $res->apellido,
				 		'login_sistema' => TRUE
				 	);
				 	//echo $res->NOMBRE;
				 }
				 $this->session->set_userdata($array);
				redirect(base_url().'home');	
			}
		}else{
			$header['titulo']="LOGIN PRINCIPAL";
			$this->load->view("Header/header",$header);
	    	$this->load->view('Auth/login');
	   }	

		
	}


}
