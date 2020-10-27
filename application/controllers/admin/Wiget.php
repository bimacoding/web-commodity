<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wiget extends CI_Controller {

	function index()
	{
		cek_session_user();
		$data['title'] = 'Data wiget';
		$data['record'] = $this->model_app->view_ordering('t_wiget','id_wiget','DESC');
		$this->template->load('backend/template','backend/mod_master_wiget/view',$data);
	}

	function tambah_wiget()
	{
		cek_session_user();
		if (isset($_POST['submit'])) {
			$data = array(
						'nama_wiget' => cetak($this->input->post('nama_wiget')),
						'isi_wiget'=> cetak($this->input->post('isi_wiget')),
						'aktif' => $this->input->post('aktif') 
					);
			$q = $this->model_app->insert('t_wiget',$data);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Tambah wiget',$this->input->post('nama_wiget'));
				redirect('wiget','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('wiget','refresh');
			}
		}else{
			$data['title'] = 'Data wiget';
			$this->template->load('backend/template','backend/mod_master_wiget/add',$data);
		}
	}

	function ubah_wiget()
	{
		cek_session_user();
		$id =$this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
						'nama_wiget' => cetak($this->input->post('nama_wiget')),
						'isi_wiget'=> cetak($this->input->post('isi_wiget')),
						'aktif' => $this->input->post('aktif')  
					);
			$where = array('id_wiget'=>$this->input->post('id'));
			$q = $this->model_app->update('t_wiget',$data,$where);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Tambah wiget',$this->input->post('nama_wiget'));
				redirect('wiget','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('wiget','refresh');
			}
		}else{
			$data['title'] = 'Data wiget';
			$data['row'] = $this->model_app->edit('t_wiget',array('id_wiget'=>$id))->row_array();
			$this->template->load('backend/template','backend/mod_master_wiget/edit',$data);
		}
	}

	function hapus_wiget()
	{
		cek_session_user();
		$id = $this->uri->segment(3);
		$data = array('id_wiget'=>$id);
		$q = $this->model_app->delete('t_wiget',$data);
		if ($q) {
			$this->session->set_flashdata('success', 'Data berhasil diproses!');
			$this->model_app->update('t_post',array('id_wiget'=>0),array('id_wiget'=>$id));
			redirect('wiget','refresh');
		}else{
			$this->session->set_flashdata('error', 'Data gagal diproses!');
			redirect('wiget','refresh');
		}
		$dt = $this->model_app->view_where('t_wiget',$data)->row_array();
		logAct($this->session->userdata('id'),'Hapus wiget',$dt['nama_wiget']);
	}

	function aktif_wiget()
	{
		cek_session_user();
		$id = $this->uri->segment(3);
		$data = array('aktif'=>'Y');
		$where = array('id_wiget'=>$id);
		$q = $this->model_app->update('t_wiget',$data,$where);
		if ($q) {
			$this->session->set_flashdata('success', 'wiget berhasil di aktifkan!');
			$this->model_app->update('t_post',array('publish'=>'Y'),array('id_wiget'=>$id));
			redirect('wiget','refresh');
		}else{
			$this->session->set_flashdata('error', 'wiget gagal di aktifkan!');
			redirect('wiget','refresh');
		}
		$dt = $this->model_app->view_where('t_wiget',$data)->row_array();
		logAct($this->session->userdata('id'),'Aktifan wiget',$dt['nama_wiget']);
	}


	function nonaktif_wiget()
	{
		cek_session_user();
		$id = $this->uri->segment(3);
		$data = array('aktif'=>'N');
		$where = array('id_wiget'=>$id);
		$q = $this->model_app->update('t_wiget',$data,$where);
		if ($q) {
			$this->session->set_flashdata('success', 'wiget berhasil di non-aktifkan!');
			$this->model_app->update('t_post',array('publish'=>'N'),array('id_wiget'=>$id));
			redirect('wiget','refresh');
		}else{
			$this->session->set_flashdata('error', 'wiget gagal di non-aktifkan!');
			redirect('wiget','refresh');
		}
		$dt = $this->model_app->view_where('t_wiget',$data)->row_array();
		logAct($this->session->userdata('id'),'Aktifan wiget',$dt['nama_wiget']);
	}

}

/* End of file Wiget.php */
/* Location: ./application/controllers/Wiget.php */