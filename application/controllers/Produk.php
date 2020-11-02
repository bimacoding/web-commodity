<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function index()
	{
		$jumlah= $this->model_utama->view_where('t_product',array('publish_product'=>'Y'))->num_rows();
		$config['base_url'] = base_url().'produk/index/';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 12;

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
				$data['produk'] = $this->model_utama->cari_product(cetak($this->input->post('kata')));
			}else{
				$data['title'] = "Semua Produk";
				$data['description'] = description();
				$data['keywords'] = keywords();
				$data['produk'] = $this->model_utama->view_where_ordering_limit('t_product',array('publish_product'=>'Y'),'id_product','DESC',$dari,$config['per_page']);
				$this->pagination->initialize($config);
			}
		}else{
			redirect('main');
		}
		$this->template->load('frontend/template','frontend/produk',$data);
	}

	function detil()
	{
		$seo   	= $this->uri->segment(3);
		$where 	= array('seo_product'=>$seo,'publish_product'=>'Y','t_kategori.jenis'=>'produk');
		$query  = $this->model_utama->view_join_where('t_product','t_kategori','id_kategori',$where);
		if ($query->num_rows()<=0){
			redirect('main');
		}else{
			$row = $query->row_array();
			$data['title'] = $row['nama_product'];
			$data['description'] = cetak($row['nama_product']);
			$data['keywords'] = cetak_meta($row['ket_product'],0,250);
			$data['row'] = $row;
			$data['terkait'] = $this->model_utama->view_join_one('t_product','t_kategori','id_kategori',array('t_product.id_kategori'=>$row['id_kategori'],'publish_product'=>'Y'),'t_product.id_kategori','DESC',0,6);
			$this->template->load('frontend/template','frontend/produk_detil',$data);
		}
	}

}

/* End of file Produk.php */
/* Location: ./application/controllers/Produk.php */