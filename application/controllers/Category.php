<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	function index()
	{
		$kat = $this->uri->segment(3);
		$jumlah= $this->model_utama->view_join_where('t_post','t_kategori','id_kategori',array('t_kategori.seo_kategori'=>$kat))->num_rows();
		$config['base_url'] = base_url().'category/index/'.$kat.'/';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 10;

		if ($this->uri->segment(4)==''){
			$dari = 0;
		}else{
			$dari = $this->uri->segment(4);
		}
		
		if (is_numeric($dari)) { 
			$data['title'] = "Semua kategori : ".$kat;
			$data['description'] = description();
			$data['keywords'] = keywords();
			$data['post'] = $this->model_utama->view_join_one('t_post','t_kategori','id_kategori',array('t_kategori.seo_kategori'=>$kat),'id_post','DESC',$dari,$config['per_page']);
			$this->pagination->initialize($config);
		}else{
			redirect('main');
		}
		$this->template->load('frontend/template','frontend/kategori_list',$data);
	}

}

/* End of file Category.php */
/* Location: ./application/controllers/Category.php */