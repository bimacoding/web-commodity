<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cek_session_admin();
	}

	function index()
	{
		$data['title'] = 'Data menu Frontend';
		$data['record'] = $this->model_app->view_ordering('t_front_menu','id_menu','DESC');
		$this->template->load('backend/template','backend/mod_master_menu_front/nes_menu',$data);
	}

	function tambah_menu()
	{
		if (isset($_POST['submit'])) {
			
			$data = array(
						'id_parent'   => $this->db->escape_str($this->input->post('id_parent')),
						'nama_menu'   => $this->db->escape_str($this->input->post('nama_menu')),
						'type_menu'   => $this->db->escape_str($this->input->post('type_menu')),
						'link'        => $this->input->post('link'),
						'icon'        => $this->db->escape_str($this->input->post('icon')),
						'aktif'       => $this->db->escape_str($this->input->post('aktif')),
						'position'    => $this->db->escape_str($this->input->post('position')),
						'urutan'      => $this->db->escape_str($this->input->post('urutan')),
						'level_akses' => $this->db->escape_str($this->input->post('level_akses'))

					);
			$q = $this->model_app->insert('t_front_menu',$data);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Tambah menu',$this->input->post('nama_menu'));
				redirect('frontend','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('frontend','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data menu';
			$data['menus'] = $this->model_app->view_where_order('t_front_menu',array('id_parent'=>0,'position'=>'Top','aktif'=>'Ya'),'id_menu','DESC');
			$this->template->load('backend/template','backend/mod_master_menu_front/add',$data);
		}
		

	}

	function ubah_menu()
	{
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
						'id_parent'   => $this->db->escape_str($this->input->post('id_parent')),
						'nama_menu'   => $this->db->escape_str($this->input->post('nama_menu')),
						'type_menu'   => $this->db->escape_str($this->input->post('type_menu')),
						'link'        => $this->input->post('link'),
						'icon'        => $this->db->escape_str($this->input->post('icon')),
						'aktif'       => $this->db->escape_str($this->input->post('aktif')),
						'position'    => $this->db->escape_str($this->input->post('position')),
						'urutan'      => $this->db->escape_str($this->input->post('urutan')),
						'level_akses' => $this->db->escape_str($this->input->post('level_akses'))
						
					);
			$where = array('id_menu'=>$this->input->post('id'));
			$q = $this->model_app->update('t_front_menu',$data,$where);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Ubah menu',$this->input->post('nama_menu'));
				redirect('frontend','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('frontend','refresh');
			}
		}else{
			$data['title'] = 'Ubah Data menu';
			$data['row'] = $this->model_app->edit('t_front_menu',array('id_menu'=>$id))->row_array();
			$data['menus'] = $this->model_app->view_where_order('t_front_menu',array('id_parent'=>0,'position'=>'Top','aktif'=>'Ya'),'id_menu','DESC');
			$this->template->load('backend/template','backend/mod_master_menu_front/edit',$data);
		}
		

	}

	function hapus_menu()
	{
		$id = $this->uri->segment(3);
		$data = array('id_menu'=>$id);
		$q = $this->model_app->delete('t_front_menu',$data);
		if ($q) {
			$this->session->set_flashdata('success', 'Data berhasil diproses!');
			redirect('frontend','refresh');
		}else{
			$this->session->set_flashdata('error', 'Data gagal diproses!');
			redirect('frontend','refresh');
		}
		$dt = $this->model_app->view_where('t_front_menu',$data)->row_array();
		logAct($this->session->userdata('id'),'Hapus menu',$dt['nama_menu']);
	}

}

/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */