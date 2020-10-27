<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

	function index()
	{
		cek_session_user();
		$data['title'] = 'Semua data Page';
		$data['record'] = $this->model_app->view_ordering('t_page','id_page','DESC');
		$this->template->load('backend/template','backend/mod_master_page/view',$data);
	}

	function tambah_page()
	{
		cek_session_user();
		if (isset($_POST['submit'])) 
		{
			$config['upload_path'] = 'assets/uploads/images/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '2000'; //Kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('thumbnail_post');
			$hasil = $this->upload->data();
			if ($hasil['file_name']=='') {
				$data = array(
						'seo_page'    	=> seo_title($this->input->post('judul_page')),
						'judul_page'  	=> cetak($this->input->post('judul_page')),
						'isi_page'    	=> cetak($this->input->post('isi_page')),
						'created_on'    => date('Y-m-d H:i:s'),
						'created_by'    => $this->session->userdata('nama'),
						'aktif'    	=> $this->db->escape_str($this->input->post('aktif'))
					); 
			}else{
				$this->_create_thumbs($hasil['file_name']);
				$data = array(
						'seo_page'    	=> seo_title($this->input->post('judul_page')),
						'judul_page'  	=> cetak($this->input->post('judul_page')),
						'isi_page'    	=> cetak($this->input->post('isi_page')),
						'thumbnail_page'=> $hasil['file_name'],
						'created_on'    => date('Y-m-d H:i:s'),
						'created_by'    => $this->session->userdata('nama'),
						'aktif'    	=> $this->db->escape_str($this->input->post('aktif'))
					);
			}
			$q = $this->model_app->insert('t_page',$data);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Tambah Page',$this->input->post('judul_page'));
				redirect('page','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('page','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Page';
			$this->template->load('backend/template','backend/mod_master_page/add',$data);
		}
	}

	function ubah_page()
	{
		cek_session_user();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) 
		{
			$config['upload_path'] = 'assets/uploads/images/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '2000'; //Kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('thumbnail_post');
			$hasil = $this->upload->data();
			if ($hasil['file_name']=='') {
				$data = array(
						'seo_page'    	=> seo_title($this->input->post('judul_page')),
						'judul_page'  	=> cetak($this->input->post('judul_page')),
						'isi_page'    	=> cetak($this->input->post('isi_page')),
						'created_on'    => date('Y-m-d H:i:s'),
						'created_by'    => $this->session->userdata('nama'),
						'aktif'    	=> $this->db->escape_str($this->input->post('aktif'))
					); 
			}else{
				$this->_create_thumbs($hasil['file_name']);
				$data = array(
						'seo_page'    	=> seo_title($this->input->post('judul_page')),
						'judul_page'  	=> cetak($this->input->post('judul_page')),
						'isi_page'    	=> cetak($this->input->post('isi_page')),
						'thumbnail_page'=> $hasil['file_name'],
						'created_on'    => date('Y-m-d H:i:s'),
						'created_by'    => $this->session->userdata('nama'),
						'aktif'    	=> $this->db->escape_str($this->input->post('aktif'))
					);
			}
			$where = array('id_page'=>$this->input->post('id'));
			$q = $this->model_app->update('t_page',$data,$where);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Ubah post',$this->input->post('judul_page'));
				redirect('page','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('page','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Page';
			$data['row'] = $this->model_app->edit('t_page',array('id_page'=>$id))->row_array();
			$this->template->load('backend/template','backend/mod_master_page/edit',$data);
		}
	}


	function hapus_page()
	{	
		cek_session_user();	
		$id = $this->uri->segment(3); 
		$data = array('id_page'=>$id);
		$q = $this->model_app->delete('t_page',$data);
		if ($q) {
			$this->session->set_flashdata('success', 'Data berhasil diproses!');
			redirect('page','refresh');
		}else{
			$this->session->set_flashdata('error', 'Data gagal diproses!');
			redirect('page','refresh');
		}
		$dt = $this->model_app->view_where('t_page',$data)->row_array();
		logAct($this->session->userdata('id'),'Hapus Page',$dt['judul_page']);
	}

	function detil()
	{
		$seo   	= $this->uri->segment(3);
		$where 	= array('seo_page'=>$seo,'aktif'=>'Y');
		$query  = $this->model_app->view_where('t_page',$where);
		if ($query->num_rows()<=0){
			redirect('main');
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

/* End of file Page.php */
/* Location: ./application/controllers/Page.php */