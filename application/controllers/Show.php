<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Show extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Master Kata dasar';
		$this->template->load('backend/template','backend/engine/mod_kategori/view',$data);
	}

	function video_list()
	{
		$data['title'] = title();
		$data['description'] = description();
		$data['keywords'] = keywords();
		$data['remaja'] = $this->model_utama->view_join_one('t_videos','t_kategori','id_kategori',array('t_kategori.seo_kategori'=>'teruna','t_kategori.jenis'=>'video'),'id_videos','ASC',0,5);
		$data['ortu'] = $this->model_utama->view_join_one('t_videos','t_kategori','id_kategori',array('t_kategori.seo_kategori'=>'umum','t_kategori.jenis'=>'video'),'id_videos','ASC',0,1);
		$data['anak'] = $this->model_utama->view_join_one('t_videos','t_kategori','id_kategori',array('t_kategori.seo_kategori'=>'anak','t_kategori.jenis'=>'video'),'id_videos','ASC',0,5);
		$this->template->load('frontend/template','frontend/video',$data);
	}

}

/* End of file Show.php */
/* Location: ./application/controllers/engine/Show.php */