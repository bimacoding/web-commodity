<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

	function index()
	{
		cek_session_user();
		$data['title'] = 'Semua data Post';
		$data['record'] = $this->model_app->view_ordering('t_post','id_post','DESC');
		$this->template->load('backend/template','backend/mod_master_post/view',$data);
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

	function tambah_post()
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
						'id_kategori' 	=> $this->db->escape_str($this->input->post('id_kategori')),
						'seo_post'    	=> seo_title($this->input->post('judul_post')),
						'judul_post'  	=> cetak($this->input->post('judul_post')),
						'isi_post'    	=> cetak($this->input->post('isi_post')),
						'created_on'    => date('Y-m-d H:i:s'),
						'created_by'    => $this->session->userdata('nama'),
						'publish'    	=> $this->db->escape_str($this->input->post('publish'))
					); 
			}else{
				$this->_create_thumbs($hasil['file_name']);
				$data = array(
						'id_kategori' 	=> $this->db->escape_str($this->input->post('id_kategori')),
						'seo_post'    	=> seo_title($this->input->post('judul_post')),
						'judul_post'  	=> cetak($this->input->post('judul_post')),
						'isi_post'    	=> cetak($this->input->post('isi_post')),
						'thumbnail_post'=> $hasil['file_name'],
						'created_on'    => date('Y-m-d H:i:s'),
						'created_by'    => $this->session->userdata('nama'),
						'publish'    	=> $this->db->escape_str($this->input->post('publish'))
					);
			}
			$q = $this->model_app->insert('t_post',$data);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Tambah post',$this->input->post('judul_post'));
				redirect('post','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('post','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Post';
			$data['kategori'] = $this->model_app->view_where('t_kategori',array('aktif'=>'Y','jenis'=>'artikel'))->result_array();
			$this->template->load('backend/template','backend/mod_master_post/add',$data);
		}
	}

	function ubah_post()
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
						'id_kategori' 	=> $this->db->escape_str($this->input->post('id_kategori')),
						'seo_post'    	=> seo_title($this->input->post('judul_post')),
						'judul_post'  	=> cetak($this->input->post('judul_post')),
						'isi_post'    	=> cetak($this->input->post('isi_post')),
						'created_on'    => date('Y-m-d H:i:s'),
						'created_by'    => $this->session->userdata('nama'),
						'publish'    	=> $this->db->escape_str($this->input->post('publish'))
					); 
			}else{
				$this->_create_thumbs($hasil['file_name']);
				$data = array(
						'id_kategori' 	=> $this->db->escape_str($this->input->post('id_kategori')),
						'seo_post'    	=> seo_title($this->input->post('judul_post')),
						'judul_post'  	=> cetak($this->input->post('judul_post')),
						'isi_post'    	=> cetak($this->input->post('isi_post')),
						'thumbnail_post'=> $hasil['file_name'],
						'created_on'    => date('Y-m-d H:i:s'),
						'created_by'    => $this->session->userdata('nama'),
						'publish'    	=> $this->db->escape_str($this->input->post('publish'))
					);
			}
			$where = array('id_post'=>$this->input->post('id'));
			$q = $this->model_app->update('t_post',$data,$where);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Ubah post',$this->input->post('judul_post'));
				redirect('post','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('post','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Post';
			$data['kategori'] = $this->model_app->view_where('t_kategori',array('aktif'=>'Y','jenis'=>'artikel'))->result_array();
			$data['row'] = $this->model_app->edit('t_post',array('id_post'=>$id))->row_array();
			$this->template->load('backend/template','backend/mod_master_post/edit',$data);
		}
	}


	function hapus_post()
	{
		cek_session_user();
		$id = $this->uri->segment(3);
		$data = array('id_post'=>$id);
		$q = $this->model_app->delete('t_post',$data);
		if ($q) {
			$this->session->set_flashdata('success', 'Data berhasil diproses!');
			redirect('post','refresh');
		}else{
			$this->session->set_flashdata('error', 'Data gagal diproses!');
			redirect('post','refresh');
		}
		$dt = $this->model_app->view_where('t_post',$data)->row_array();
		logAct($this->session->userdata('id'),'Hapus Post',$dt['judul_post']);
	}

	



}

/* End of file Post.php */
/* Location: ./application/controllers/Post.php */