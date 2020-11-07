<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Konsumen extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		cek_session_pembeli();
	}

	public function index()
	{
		echo "akses konsumen";
	}

}

/* End of file Konsumen.php */
/* Location: ./application/controllers/Konsumen.php */