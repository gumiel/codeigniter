<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rol extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->helper('form_ci');
		$this->load->library('form_validation');
		$this->load->library('utils');
		$this->load->model('rol_model');
		$this->load->model('rol_ruta_model');
		$this->load->model('ruta_model');
	}

	public function index()
	{		
		$this->load->view('rol/index', null, FALSE);
	}

	public function listAjax()
	{
		$rols = $this->rol_model->getAll();
		$data['rols'] = $rols;
		$data['result'] = 1;
		$this->utils->json($data);
	}

	public function getAjax()
	{
		$data = array();
		
		$rol     = $this->input->post('rol');
		$rolFind = $this->rol_model->getId( $rol['id_rol'] );
		$data['rol']    = $rolFind;
		$data['result'] = 1;
		$this->utils->json($data);	
	}

	public function createAjax()
	{
		$data = array();

		$rol = $this->input->post('rol');
		
		$this->form_validation->set_rules('rol[denominacion]', 'denominacion', 'trim|required|callback__verify_repeat_denominacion_rol');

		if ( $this->form_validation->run()==true ) 
		{
			$this->rol_model->insert($rol);
			$data['result']  = 1;
			$data['message'] = "Se creo el usuario";
		} else
		{
			$data['result']  = 0;
			$data['message'] = validation_errors();
		}

		$this->utils->json($data);	
	}

	public function editAjax()
	{
		$data = array();

		$rol = $this->input->post('rol');
		
		$this->form_validation->set_rules('rol[denominacion]', 'denominacion', 'trim|required|callback__verify_repeat_denominacion_rol_edit['.$rol['id_rol'].']');

		if ( $this->form_validation->run()==true ) 
		{			
			$this->rol_model->update( $rol, $rol['id_rol'] );
			$data['result'] = 1;
			$data['message'] = "Se edito el registro";
		} else
		{
			$data['result'] = 0;
			$data['message'] = validation_errors();
		}

		$this->utils->json($data);	
	}

	public function deleteAjax()
	{
		$data = array();

		$rol = $this->input->post('rol');

		$this->form_validation->set_rules('rol[id_rol]', 'Identificador', 'trim|required');

		if ( $this->form_validation->run()==true ) 
		{			
			$this->rol_model->delete( $rol['id_rol'] );
			$data['result'] = 1;
			$data['message'] = "Se elimino el registro";
		} else
		{
			$data['result'] = 0;
			$data['message'] = validation_errors();
		}

		$this->utils->json($data);
	}

	public function getRelationWithRutasAjax()
	{
		$data  = array();
		$rol   = $this->input->post('rol');
		$rutas = $this->rutas_model->getRutasByRol( $rol['id_rol'] );
		$data['rutas']  = $rutas;
		$data['result'] = 1;
		$this->utils->json($data);	
	}

	public function AssignRutasAjax()
	{
		$data = array();		

		$rutas = $this->input->post('ruta');
		$rol   = $this->input->post('rol');

		if ( $rol['id_rol']>0 )
		{			
			$this->rol_ruta_model->deleteAllByRol( $rol['id_rol'] );
			foreach ($rutas as $ruta) 
			{
				$this->rol_ruta_model->insert( [ 'id_rol'=>$rol['id_rol'], 'id_ruta'=>$ruta['id_ruta'] ] );
			}
			$data['result'] = 1;
		} else
		{
			$data['result'] = 0;
		}

		$this->utils->json($data);	
	}
	

	public function _verify_repeat_denominacion_rol($denominacion)
	{
		$this->form_validation->set_message(__FUNCTION__, 'Existe la {field}');
		$numberOfResult = $this->rol_model->count( [ 'denominacion'=>$denominacion ] );
		return ( $numberOfResult==0 );
	}

	public function _verify_repeat_denominacion_rol_edit($denominacion, $idRol)
	{
		$this->form_validation->set_message(__FUNCTION__, 'Existe la {field}');
		$numberOfResult = $this->rol_model->count( [ 'denominacion'=>$denominacion, 'id_rol!='=>$idRol ] );
		return ( $numberOfResult==0 );
	}

}

/* End of file Rol.php */
/* Location: ./application/controllers/Rol.php */