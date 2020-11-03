<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

	public function index()
	{
		$data['title'] = "Daftar Menjadi Penjual atau Pembeli sekarang";
		$data['description'] = description();
		$data['keywords'] = 'registrasi penjual, registrasi pembeli';
		$this->template->load('frontend/template','frontend/register',$data);
	}

}

/* End of file Daftar.php */
/* Location: ./application/controllers/admin/Daftar.php */