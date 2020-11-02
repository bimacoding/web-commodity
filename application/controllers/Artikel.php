<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

	function index(){

		$jumlah= $this->model_utama->view('t_post')->num_rows();
		$config['base_url'] = base_url().'artikel/index/';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 10;

		if ($this->uri->segment('3')==''){
			$dari = 0;
		}else{
			$dari = $this->uri->segment('3');
		}
		
		if (is_numeric($dari)) { 
			if ($this->input->post('kata')!=''){
				$data['title'] = "Hasil Pencarian keyword : ".cetak($this->input->post('kata'));
				$data['description'] = description();
				$data['keywords'] = keywords();
				$data['post'] = $this->model_utama->cari_post(cetak($this->input->post('kata')));
			}else{
				$data['title'] = "Semua postingan";
				$data['description'] = description();
				$data['keywords'] = keywords();
				$data['post'] = $this->model_utama->view_join_one_not('t_post','t_kategori','id_kategori','t_kategori.nama_kategori',array('hightlight','Remaja','Anak Anak','Orang Tua'),'id_post','DESC',$dari,$config['per_page']);
				$this->pagination->initialize($config);
			}
		}else{
			redirect('main');
		}
		$this->template->load('frontend/template','frontend/post',$data);

	}


	function detil()
	{
		$seo   	= $this->uri->segment(3);
		$where 	= array('seo_post'=>$seo,'publish'=>'Y');
		$query  = $this->model_utama->view_join_where('t_post','t_kategori','id_kategori',$where);
		if ($query->num_rows()<=0){
			redirect('main');
		}else{
			$row = $query->row_array();
			$data['title'] = $row['judul_post'];
			$data['description'] = cetak($row['judul_post']);
			$data['keywords'] = cetak_meta($row['judul_post'],0,150);
			$data['row'] = $row;
			$this->template->load('frontend/template','frontend/post_detil',$data);
		}
	}

}

/* End of file Artikel.php */
/* Location: ./application/controllers/Artikel.php */