<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {

	function index()
	{
		cek_session_user();
		$data['title'] = 'Data banner';
		$data['record'] = $this->model_app->view_ordering('t_banner','id_banner','DESC');
		$this->template->load('backend/template','backend/mod_master_banner/view',$data);
	}

	function _create_thumbs($file_name){
        // Image resizing config
        $config = array(
            // Image Large
            array(
                'image_library' => 'GD2',
                'source_image'  => 'assets/uploads/images/'.$file_name,
                'maintain_ratio'=> FALSE,
                'width'         => 700,
                'height'        => 467,
                'new_image'     => 'assets/thumbnail/large/'.$file_name
                ),
            // image Medium
            array(
                'image_library' => 'GD2',
                'source_image'  => 'assets/uploads/images/'.$file_name,
                'maintain_ratio'=> FALSE,
                'width'         => 600,
                'height'        => 400,
                'new_image'     => 'assets/thumbnail/medium/'.$file_name
                ),
            // Image Small
            array(
                'image_library' => 'GD2',
                'source_image'  => 'assets/uploads/images/'.$file_name,
                'maintain_ratio'=> FALSE,
                'width'         => 100,
                'height'        => 67,
                'new_image'     => 'assets/thumbnail/small/'.$file_name
            )
        );
 
        $this->load->library('image_lib', $config[0]);
        foreach ($config as $item){
            $this->image_lib->initialize($item);
            if(!$this->image_lib->resize()){
                return false;
            }
            $this->image_lib->clear();
        }
    }

	function tambah_banner()
	{
		cek_session_user();
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'assets/uploads/banner/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '2000'; //Kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('gambar_banner');
			$hasil = $this->upload->data();
			if ($hasil['file_name']!=='') {
				$data = array(
							'nama_banner' => $this->db->escape_str($this->input->post('nama_banner')),
							'gambar_banner' => $hasil['file_name'],
							'posisi_banner'=> 'home',
							'link_banner' => $this->input->post('link_banner'),
							'aktif' => $this->db->escape_str($this->input->post('aktif')),
						); 
			}else{
				$data = array(
							'nama_banner' => $this->db->escape_str($this->input->post('nama_banner')),
							'gambar_banner' => 'no-images.jpg',
							'posisi_banner'=> 'home',
							'link_banner' => $this->input->post('link_banner'),
							'aktif' => $this->db->escape_str($this->input->post('aktif')),
						);
			}
			$q = $this->model_app->insert('t_banner',$data);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Tambah banner',$this->input->post('nama_banner'));
				redirect('banner','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('banner','refresh');
			}
		}else{
			$data['title'] = 'Data banner';
			$this->template->load('backend/template','backend/mod_master_banner/add',$data);
		}
	}

	function ubah_banner()
	{
		cek_session_user();
		$id =$this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'assets/uploads/banner/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '2000'; //Kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('gambar_banner');
			$hasil = $this->upload->data();
			if ($hasil['file_name']!=='') {
				$data = array(
							'nama_banner' => $this->db->escape_str($this->input->post('nama_banner')),
							'gambar_banner' => $hasil['file_name'],
							'posisi_banner'=> 'home',
							'link_banner' => $this->input->post('link_banner'),
							'aktif' => $this->db->escape_str($this->input->post('aktif')),
						); 
			}else{
				$data = array(
							'nama_banner' => $this->db->escape_str($this->input->post('nama_banner')),
							'gambar_banner' => 'no-images.jpg',
							'posisi_banner'=> 'home',
							'link_banner' => $this->input->post('link_banner'),
							'aktif' => $this->db->escape_str($this->input->post('aktif')),
						);
			}
			$where = array('id_banner'=>$this->input->post('id'));
			$q = $this->model_app->update('t_banner',$data,$where);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Tambah banner',$this->input->post('nama_banner'));
				redirect('banner','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('banner','refresh');
			}
		}else{
			$data['title'] = 'Data banner';
			$data['row'] = $this->model_app->edit('t_banner',array('id_banner'=>$id))->row_array();
			$this->template->load('backend/template','backend/mod_master_banner/edit',$data);
		}
	}

	function hapus_banner()
	{
		cek_session_user();
		$id = $this->uri->segment(3);
		$data = array('id_banner'=>$id);
		$q = $this->model_app->delete('t_banner',$data);
		if ($q) {
			$this->session->set_flashdata('success', 'Data berhasil diproses!');
			$this->model_app->update('t_post',array('id_banner'=>0),array('id_banner'=>$id));
			redirect('banner','refresh');
		}else{
			$this->session->set_flashdata('error', 'Data gagal diproses!');
			redirect('banner','refresh');
		}
		$dt = $this->model_app->view_where('t_banner',$data)->row_array();
		logAct($this->session->userdata('id'),'Hapus banner',$dt['nama_banner']);
	}

	function aktif_banner()
	{
		cek_session_user();
		$id = $this->uri->segment(3);
		$data = array('aktif'=>'Y');
		$where = array('id_banner'=>$id);
		$q = $this->model_app->update('t_banner',$data,$where);
		if ($q) {
			$this->session->set_flashdata('success', 'banner berhasil di aktifkan!');
			$this->model_app->update('t_post',array('publish'=>'Y'),array('id_banner'=>$id));
			redirect('banner','refresh');
		}else{
			$this->session->set_flashdata('error', 'banner gagal di aktifkan!');
			redirect('banner','refresh');
		}
		$dt = $this->model_app->view_where('t_banner',$data)->row_array();
		logAct($this->session->userdata('id'),'Aktifan banner',$dt['nama_banner']);
	}


	function nonaktif_banner()
	{
		cek_session_user();
		$id = $this->uri->segment(3);
		$data = array('aktif'=>'N');
		$where = array('id_banner'=>$id);
		$q = $this->model_app->update('t_banner',$data,$where);
		if ($q) {
			$this->session->set_flashdata('success', 'banner berhasil di non-aktifkan!');
			$this->model_app->update('t_post',array('publish'=>'N'),array('id_banner'=>$id));
			redirect('banner','refresh');
		}else{
			$this->session->set_flashdata('error', 'banner gagal di non-aktifkan!');
			redirect('banner','refresh');
		}
		$dt = $this->model_app->view_where('t_banner',$data)->row_array();
		logAct($this->session->userdata('id'),'Aktifan banner',$dt['nama_banner']);
	}

}

/* End of file Banner.php */
/* Location: ./application/controllers/Banner.php */