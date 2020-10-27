<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website_manager extends CI_Controller {

	function slide()
	{
		
		cek_session_user();
		$data['title'] = 'Data Slide';
		$data['record'] = $this->model_app->view_where_ordering('t_slide',array('posisi'=>'Banner'),'id_slide','DESC');
		$this->template->load('backend/template','backend/mod_master_slides/view',$data);
	}

	function tambah_slide()
	{
		
		cek_session_user();
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'assets/uploads/slide/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '2000'; //Kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('gambar_slide');
			$hasil = $this->upload->data();
			if ($hasil['file_name']!=='') {
				$data = array(
							'nama_slide' => $this->db->escape_str($this->input->post('nama_slide')),
							'gambar_slide' => $hasil['file_name'],
							'ket_slide' => $this->db->escape_str($this->input->post('ket_slide')),
							'sub_judul' => $this->db->escape_str($this->input->post('sub_judul')),
							'link' => $this->input->post('link'),
							'posisi'=>'Banner',
							'aktif_slide' => $this->db->escape_str($this->input->post('aktif_slide')),
						); 
			}else{
				$data = array(
							'nama_slide' => $this->db->escape_str($this->input->post('nama_slide')),
							'gambar_slide' => '',
							'ket_slide' => $this->db->escape_str($this->input->post('ket_slide')),
							'sub_judul' => $this->db->escape_str($this->input->post('sub_judul')),
							'link' => $this->input->post('link'),
							'posisi'=>'Banner',
							'aktif_slide' => $this->db->escape_str($this->input->post('aktif_slide')),
						);
			}
			$q = $this->model_app->insert('t_slide',$data);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Tambah slide',$this->input->post('nama_slide'));
				redirect('website_manager/slide','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('website_manager/slide','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Slide';
			$this->template->load('backend/template','backend/mod_master_slides/add',$data);
		}
	}

	function ubah_slide()
	{
		
		cek_session_user();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'assets/uploads/slide/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '2000'; //Kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('gambar_slide');
			$hasil = $this->upload->data();
			if ($hasil['file_name']!=='') {
				$data = array(
							'nama_slide' => $this->db->escape_str($this->input->post('nama_slide')),
							'gambar_slide' => $hasil['file_name'],
							'ket_slide' => $this->db->escape_str($this->input->post('ket_slide')),
							'sub_judul' => $this->db->escape_str($this->input->post('sub_judul')),
							'link' => $this->input->post('link'),
							'posisi'=>'Banner',
							'aktif_slide' => $this->db->escape_str($this->input->post('aktif_slide')),
						); 
			}else{
				$data = array(
							'nama_slide' => $this->db->escape_str($this->input->post('nama_slide')),
							'gambar_slide' => '',
							'ket_slide' => $this->db->escape_str($this->input->post('ket_slide')),
							'sub_judul' => $this->db->escape_str($this->input->post('sub_judul')),
							'link' => $this->input->post('link'),
							'posisi'=>'Banner',
							'aktif_slide' => $this->db->escape_str($this->input->post('aktif_slide')),
						);
			}
			$where = array('id_slide'=>$this->input->post('id'));
			$q = $this->model_app->update('t_slide',$data,$where);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Tambah slide',$this->input->post('nama_slide'));
				redirect('website_manager/slide','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('website_manager/slide','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Slide';
			$data['row'] = $this->model_app->edit('t_slide',array('id_slide'=>$id))->row_array();
			$this->template->load('backend/template','backend/mod_master_slides/edit',$data);
		}
	}

	function hapus_slide()
	{
		
		cek_session_user();
		$id = $this->uri->segment(3);
		$data = array('id_slide'=>$id);
		$q = $this->model_app->delete('t_slide',$data);
		if ($q) {
			$this->session->set_flashdata('success', 'Data berhasil diproses!');
			redirect('website_manager/slide','refresh');
		}else{
			$this->session->set_flashdata('error', 'Data gagal diproses!');
			redirect('website_manager/slide','refresh');
		}
		$dt = $this->model_app->view_where('t_slide',$data)->row_array();
		logAct($this->session->userdata('id'),'Hapus slide',$dt['nama_slide']);
	}

	function video()
	{
		cek_session_user();
		$data['title'] = 'Data video';
		$data['record'] = $this->model_app->view_ordering('t_video','id_video','DESC');
		$this->template->load('backend/template','backend/mod_master_video/view',$data);
	}

	function tambah_video()
	{
		cek_session_user();
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'assets/uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '3000'; //Kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('gambar_video');
			$hasil = $this->upload->data();
			$data = array(
						'link_video'=> $this->input->post('link_video'),
						'gambar_video'=> $hasil['file_name'],
						'posisi'=> $this->input->post('posisi'),
						'aktif' => $this->input->post('aktif') 
					);
			$q = $this->model_app->insert('t_video',$data);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Tambah video',$this->input->post('nama_video'));
				redirect('website_manager/video','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('website_manager/video','refresh');
			}
		}else{
			$data['title'] = 'Data video';
			$this->template->load('backend/template','backend/mod_master_video/add',$data);
		}
	}

	function ubah_video()
	{
		cek_session_user();
		$id =$this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'assets/uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '3000'; //Kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('gambar_video');
			$hasil = $this->upload->data();
			if ($hasil['file_name']!=='') {
				$data = array(
						'link_video'=> $this->input->post('link_video'),
						'gambar_video'=> $hasil['file_name'],
						'posisi'=> $this->input->post('posisi'),
						'aktif' => $this->input->post('aktif') 
					);
			}else{
				$data = array(
						'link_video'=> $this->input->post('link_video'),
						'posisi'=> $this->input->post('posisi'),
						'aktif' => $this->input->post('aktif') 
					);
			}
			
			$where = array('id_video'=>$this->input->post('id'));
			$q = $this->model_app->update('t_video',$data,$where);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Tambah video',$this->input->post('nama_video'));
				redirect('website_manager/video','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('website_manager/video','refresh');
			}
		}else{
			$data['title'] = 'Data video';
			$data['row'] = $this->model_app->edit('t_video',array('id_video'=>$id))->row_array();
			$this->template->load('backend/template','backend/mod_master_video/edit',$data);
		}
	}

	function hapus_video()
	{
		cek_session_user();
		$id = $this->uri->segment(3);
		$data = array('id_video'=>$id);
		$q = $this->model_app->delete('t_video',$data);
		if ($q) {
			$this->session->set_flashdata('success', 'Data berhasil diproses!');
			$this->model_app->update('t_video',array('id_video'=>0),array('id_video'=>$id));
			redirect('website_manager/video','refresh');
		}else{
			$this->session->set_flashdata('error', 'Data gagal diproses!');
			redirect('website_manager/video','refresh');
		}
		$dt = $this->model_app->view_where('t_video',$data)->row_array();
		logAct($this->session->userdata('id'),'Hapus video',$dt['nama_video']);
	}

	function aktif_video()
	{
		cek_session_user();
		$id = $this->uri->segment(3);
		$data = array('aktif'=>'Y');
		$where = array('id_video'=>$id);
		$q = $this->model_app->update('t_video',$data,$where);
		if ($q) {
			$this->session->set_flashdata('success', 'video berhasil di aktifkan!');
			$this->model_app->update('t_video',array('aktif'=>'Y'),array('id_video'=>$id));
			redirect('website_manager/video','refresh');
		}else{
			$this->session->set_flashdata('error', 'video gagal di aktifkan!');
			redirect('website_manager/video','refresh');
		}
		$dt = $this->model_app->view_where('t_video',$data)->row_array();
		logAct($this->session->userdata('id'),'Aktifan video',$dt['nama_video']);
	}


	function nonaktif_video()
	{
		cek_session_user();
		$id = $this->uri->segment(3);
		$data = array('aktif'=>'N');
		$where = array('id_video'=>$id);
		$q = $this->model_app->update('t_video',$data,$where);
		if ($q) {
			$this->session->set_flashdata('success', 'video berhasil di non-aktifkan!');
			$this->model_app->update('t_video',array('aktif'=>'N'),array('id_video'=>$id));
			redirect('website_manager/video','refresh');
		}else{
			$this->session->set_flashdata('error', 'video gagal di non-aktifkan!');
			redirect('website_manager/video','refresh');
		}
		$dt = $this->model_app->view_where('t_video',$data)->row_array();
		logAct($this->session->userdata('id'),'Aktifan video',$dt['nama_video']);
	}

}

/* End of file Website_manager.php */
/* Location: ./application/controllers/Website_manager.php */