<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('UsuarioModel');


	}

	public function index()
	{
		
		if ($this->session->userdata("login_sistema")) {
			//redirect(base_url()."home");
		}else{
		
		redirect(base_url());
		}

		$resultado= array("usuarios" => $this->UsuarioModel->getUsuarios());
		$header['titulo']='HOME PRINCIPAL';
		$this->load->view("Header/header",$header);
		$this->load->view("Home/layout",$resultado);
		
	}

	public function add(){
		$this->form_validation->set_rules('nombre', 'NOMBRE', 'required|min_length[3]');
		$this->form_validation->set_rules('apellido', 'APELLIDO ', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('usuario', 'USUARIO ', 'required|valid_email');
		$this->form_validation->set_rules('contrasena', 'CONTRASEÑA ', 'trim|required|min_length[8]');
		if($this->form_validation->run()){
			$nombre = $this->input->post("nombre");
			$apellido = $this->input->post("apellido");
			$usuario = $this->input->post("usuario");
			$contrasena = $this->input->post("contrasena");
			$data=array("NOMBRE"=>$nombre,"APELLIDO"=>$apellido,"USUARIO"=>$usuario,"CONTRASENA"=>$contrasena);

			$bol=$this->UsuarioModel->addUsuario($data);
			if ($bol) {
				 $this->session->set_flashdata('success', 'Usuario registrado con éxito');
			}else{

			}
		}


		$header['titulo']='AGREGAR PERSONA';
		$this->load->view("Header/header",$header);
		$this->load->view("Home/add");
	}

	public function edit(){
			$id=$this->uri->segment(3);

			$data=array( 'usuario'=> $this->UsuarioModel->getinfoUsuario($id));

		$this->form_validation->set_rules('nombre', 'NOMBRE', 'required|min_length[3]');
		$this->form_validation->set_rules('apellido', 'APELLIDO ', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('usuario', 'USUARIO ', 'required|valid_email');
		$this->form_validation->set_rules('contrasena', 'CONTRASEÑA ', 'trim|required|min_length[8]');
		if($this->form_validation->run()){
			$nombre = $this->input->post("nombre");
			$apellido = $this->input->post("apellido");
			$usuario = $this->input->post("usuario");
			$contrasena = $this->input->post("contrasena");
			//$contrasena =password_hash($this->input->post("contrasena"), PASSWORD_DEFAULT);
			$data2=array("NOMBRE"=>$nombre,"APELLIDO"=>$apellido,"USUARIO"=>$usuario,"CONTRASENA"=>$contrasena);

			$bol=$this->UsuarioModel->editUsuario($data2,$id);
			if ($bol) {
				 $this->session->set_flashdata('success', 'Usuario modificado  con éxito');
			}else{

			}
		}


		$header['titulo']='EDITAR PERSONA';
		$this->load->view("Header/header",$header);
		$this->load->view("Home/edit",$data);
	}

	public function delete(){
		$id=$this->uri->segment(3);
		$bol = $this->UsuarioModel->deleteUsuario($id);
		redirect(base_url()."home");
	}

}
