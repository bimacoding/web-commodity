<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data['title'] = title();
		$data['description'] = description();
		$data['keywords'] = keywords();
		$data['slide'] = $this->model_app->view_where_ordering('t_slide',array('posisi'=>'Utama','aktif_slide'=>'Y'),'id_slide','ASC');
		$data['hightlight'] = $this->model_utama->view_join_one('t_post','t_kategori','id_kategori',array('t_kategori.nama_kategori'=>'hightlight'),'id_post','ASC',0,3);
		$this->template->load('frontend/template','frontend/main',$data);
	}


}

/* End of file Home.php */
/* Location: ./application/controllers/Main.php */ 