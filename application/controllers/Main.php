<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		redirect('main/maintenance','refresh');
	}

	function about()
	{
		$this->load->view('frontend/about');
	}

	function maintenance()
	{
		$this->load->view('frontend/maintenance');
	}

	


}

/* End of file Main.php */
/* Location: ./application/controllers/Main.php */ 