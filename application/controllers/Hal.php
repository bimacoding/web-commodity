<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hal extends CI_Controller {

	function detil()
	{
		$seo   	= $this->uri->segment(2);
		$where 	= array('seo_page'=>$seo,'aktif'=>'Y');
		$query  = $this->model_app->view_where('t_page',$where);
		if ($query->num_rows()<=0){
			redirect('home');
		}else{
			$row = $query->row_array();
			$data['title'] = $row['judul_page'];
			$data['description'] = cetak($row['judul_page']);
			$data['keywords'] = cetak_meta($row['judul_page'],0,150);
			$data['row'] = $row;
			$this->template->load('frontend/template','frontend/page_detil',$data);
		}
	}

}

/* End of file Hal.php */
/* Location: ./application/controllers/Hal.php */