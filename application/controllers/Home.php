<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data['title'] = title();
		$data['description'] = description();
		$data['keywords'] = keywords();
		$data['slide'] = $this->model_app->view_where_ordering('t_slide',array('posisi'=>'Utama','aktif_slide'=>'Y'),'id_slide','ASC');
		$data['produk'] = $this->model_utama->view_where_ordering_limit('t_product',array('publish_product'=>'Y'),'id_product','DESC',0,8)->result_array();
		$data['banner'] = $this->model_utama->view_where_ordering_limit('t_banner',array('aktif'=>'Y'),'id_banner','DESC',0,3)->result_array();
		$this->template->load('frontend/template','frontend/main',$data);
	}


}

/* End of file Home.php */
/* Location: ./application/controllers/Main.php */ 