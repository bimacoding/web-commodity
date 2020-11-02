<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	function index()
	{
		cek_session_user();
		$data['title'] = 'Data kategori';
		$data['record'] = $this->model_app->view_ordering('t_kategori','id_kategori','DESC');
		$this->template->load('backend/template','backend/mod_master_kategori/view',$data);
	}

	function tambah_kategori()
	{
		cek_session_user();
		if (isset($_POST['submit'])) {
			$data = array(
						'seo_kategori' => seo_title($this->input->post('nama_kategori')),
						'nama_kategori'=> cetak($this->input->post('nama_kategori')),
						'jenis'=> cetak($this->input->post('jenis')),
						'aktif' => $this->input->post('aktif') 
					);
			$q = $this->model_app->insert('t_kategori',$data);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Tambah kategori',$this->input->post('nama_kategori'));
				redirect('kategori','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('kategori','refresh');
			}
		}else{
			$data['title'] = 'Data kategori';
			$this->template->load('backend/template','backend/mod_master_kategori/add',$data);
		}
	}

	function ubah_kategori()
	{
		cek_session_user();
		$id =$this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
						'seo_kategori' => seo_title($this->input->post('nama_kategori')),
						'nama_kategori'=> cetak($this->input->post('nama_kategori')),
						'jenis'=> cetak($this->input->post('jenis')),
						'aktif' => $this->input->post('aktif') 
					);
			$where = array('id_kategori'=>$this->input->post('id'));
			$q = $this->model_app->update('t_kategori',$data,$where);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Tambah kategori',$this->input->post('nama_kategori'));
				redirect('kategori','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('kategori','refresh');
			}
		}else{
			$data['title'] = 'Data kategori';
			$data['row'] = $this->model_app->edit('t_kategori',array('id_kategori'=>$id))->row_array();
			$this->template->load('backend/template','backend/mod_master_kategori/edit',$data);
		}
	}

	function hapus_kategori()
	{
		cek_session_user();
		$id = $this->uri->segment(3);
		$data = array('id_kategori'=>$id);
		$q = $this->model_app->delete('t_kategori',$data);
		if ($q) {
			$this->session->set_flashdata('success', 'Data berhasil diproses!');
			$this->model_app->update('t_post',array('id_kategori'=>0),array('id_kategori'=>$id));
			redirect('kategori','refresh');
		}else{
			$this->session->set_flashdata('error', 'Data gagal diproses!');
			redirect('kategori','refresh');
		}
		$dt = $this->model_app->view_where('t_kategori',$data)->row_array();
		logAct($this->session->userdata('id'),'Hapus kategori',$dt['nama_kategori']);
	}

	function aktif_kategori()
	{
		cek_session_user();
		$id = $this->uri->segment(3);
		$data = array('aktif'=>'Y');
		$where = array('id_kategori'=>$id);
		$q = $this->model_app->update('t_kategori',$data,$where);
		if ($q) {
			$this->session->set_flashdata('success', 'Kategori berhasil di aktifkan!');
			$this->model_app->update('t_post',array('publish'=>'Y'),array('id_kategori'=>$id));
			redirect('kategori','refresh');
		}else{
			$this->session->set_flashdata('error', 'Kategori gagal di aktifkan!');
			redirect('kategori','refresh');
		}
		$dt = $this->model_app->view_where('t_kategori',$data)->row_array();
		logAct($this->session->userdata('id'),'Aktifan kategori',$dt['nama_kategori']);
	}


	function nonaktif_kategori()
	{
		cek_session_user();
		$id = $this->uri->segment(3);
		$data = array('aktif'=>'N');
		$where = array('id_kategori'=>$id);
		$q = $this->model_app->update('t_kategori',$data,$where);
		if ($q) {
			$this->session->set_flashdata('success', 'Kategori berhasil di non-aktifkan!');
			$this->model_app->update('t_post',array('publish'=>'N'),array('id_kategori'=>$id));
			redirect('kategori','refresh');
		}else{
			$this->session->set_flashdata('error', 'Kategori gagal di non-aktifkan!');
			redirect('kategori','refresh');
		}
		$dt = $this->model_app->view_where('t_kategori',$data)->row_array();
		logAct($this->session->userdata('id'),'Aktifan kategori',$dt['nama_kategori']);
	}

	

}

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */