<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedagang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cek_session_penjual();
	}

	public function index()
	{
		$data['title'] = title();
		$data['description'] = description();
		$data['keywords'] = keywords();
		$this->template->load('frontend/template','frontend/penjual/dashboard',$data);	
	}

}

/* End of file Pedagang.php */
/* Location: ./application/controllers/Pedagang.php */