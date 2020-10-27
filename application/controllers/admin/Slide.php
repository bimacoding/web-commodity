<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Slide extends CI_Controller {

	function index()
	{
		$data['title'] = 'Data Slide';
		$data['record'] = $this->model_app->view_where_ordering('t_slide',array('posisi'=>'Utama'),'id_slide','DESC');
		$this->template->load('backend/template','backend/mod_master_slide/view',$data);
	}

	function tambah_slide()
	{

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
							'posisi'=> 'Utama',
							'aktif_slide' => $this->db->escape_str($this->input->post('aktif_slide')),
						); 
			}else{
				$data = array(
							'nama_slide' => $this->db->escape_str($this->input->post('nama_slide')),
							'gambar_slide' => '',
							'ket_slide' => $this->db->escape_str($this->input->post('ket_slide')),
							'sub_judul' => $this->db->escape_str($this->input->post('sub_judul')),
							'link' => $this->input->post('link'),
							'posisi'=> 'Utama',
							'aktif_slide' => $this->db->escape_str($this->input->post('aktif_slide')),
						);
			}
			$q = $this->model_app->insert('t_slide',$data);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Tambah slide',$this->input->post('nama_slide'));
				redirect('siteman/slide','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('siteman/slide','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Slide';
			$this->template->load('backend/template','backend/mod_master_slide/add',$data);
		}
	}

	function ubah_slide()
	{

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
							'posisi'=> 'Utama',
							'aktif_slide' => $this->db->escape_str($this->input->post('aktif_slide')),
						); 
			}else{
				$data = array(
							'nama_slide' => $this->db->escape_str($this->input->post('nama_slide')),
							'gambar_slide' => '',
							'ket_slide' => $this->db->escape_str($this->input->post('ket_slide')),
							'sub_judul' => $this->db->escape_str($this->input->post('sub_judul')),
							'link' => $this->input->post('link'),
							'posisi'=> 'Utama',
							'aktif_slide' => $this->db->escape_str($this->input->post('aktif_slide')),
						);
			}
			$where = array('id_slide'=>$this->input->post('id'));
			$q = $this->model_app->update('t_slide',$data,$where);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Tambah slide',$this->input->post('nama_slide'));
				redirect('siteman/slide','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('siteman/slide','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Slide';
			$data['row'] = $this->model_app->edit('t_slide',array('id_slide'=>$id))->row_array();
			$this->template->load('backend/template','backend/mod_master_slide/edit',$data);
		}
	}

	function hapus_slide()
	{
		
		$id = $this->uri->segment(3);
		$data = array('id_slide'=>$id);
		$q = $this->model_app->delete('t_slide',$data);
		if ($q) {
			$this->session->set_flashdata('success', 'Data berhasil diproses!');
			redirect('siteman/slide','refresh');
		}else{
			$this->session->set_flashdata('error', 'Data gagal diproses!');
			redirect('siteman/slide','refresh');
		}
		$dt = $this->model_app->view_where('t_slide',$data)->row_array();
		logAct($this->session->userdata('id'),'Hapus slide',$dt['nama_slide']);
	}

}

/* End of file Slide.php */
/* Location: ./application/controllers/admin/Slide.php */