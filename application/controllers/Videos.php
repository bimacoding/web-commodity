<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Videos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

	function index()
	{
		cek_session_user();
		$data['title'] = 'Semua data videos';
		$data['record'] = $this->model_app->view_ordering('t_videos','id_videos','DESC');
		$this->template->load('backend/template','backend/mod_master_videos/view',$data);
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

	function tambah_videos()
	{
		cek_session_user();
		if (isset($_POST['submit'])) 
		{
			$data = array(
						'id_kategori' 	=> $this->db->escape_str($this->input->post('id_kategori')),
						'seo_videos'    	=> seo_title($this->input->post('judul_videos')),
						'judul_videos'  	=> cetak($this->input->post('judul_videos')),
						'isi_videos'    	=> cetak($this->input->post('isi_videos')),
						'link_videos'=>  $this->input->post('link_videos') ,
						'created_on'    => date('Y-m-d H:i:s'),
						'created_by'    => $this->session->userdata('nama'),
						'publish'    	=> $this->db->escape_str($this->input->post('publish'))
					);
			$q = $this->model_app->insert('t_videos',$data);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Tambah videos',$this->input->post('judul_videos'));
				redirect('videos','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('videos','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data videos';
			$data['kategori'] = $this->model_app->view_where('t_kategori',array('aktif'=>'Y','jenis'=>'video'))->result_array();
			$this->template->load('backend/template','backend/mod_master_videos/add',$data);
		}
	}

	function ubah_videos()
	{
		cek_session_user();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) 
		{
			$data = array(
						'id_kategori' 	=> $this->db->escape_str($this->input->post('id_kategori')),
						'seo_videos'    	=> seo_title($this->input->post('judul_videos')),
						'judul_videos'  	=> cetak($this->input->post('judul_videos')),
						'isi_videos'    	=> cetak($this->input->post('isi_videos')),
						'link_videos'=>  $this->input->post('link_videos') ,
						'publish'    	=> $this->db->escape_str($this->input->post('publish'))
					);
			$where = array('id_videos'=>$this->input->post('id'));
			$q = $this->model_app->update('t_videos',$data,$where);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Ubah videos',$this->input->post('judul_videos'));
				redirect('videos','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('videos','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data videos';
			$data['kategori'] = $this->model_app->view_where('t_kategori',array('aktif'=>'Y','jenis'=>'video'))->result_array();
			$data['row'] = $this->model_app->edit('t_videos',array('id_videos'=>$id))->row_array();
			$this->template->load('backend/template','backend/mod_master_videos/edit',$data);
		}
	}


	function hapus_videos()
	{
		cek_session_user();
		$id = $this->uri->segment(3);
		$data = array('id_videos'=>$id);
		$q = $this->model_app->delete('t_videos',$data);
		if ($q) {
			$this->session->set_flashdata('success', 'Data berhasil diproses!');
			redirect('videos','refresh');
		}else{
			$this->session->set_flashdata('error', 'Data gagal diproses!');
			redirect('videos','refresh');
		}
		$dt = $this->model_app->view_where('t_videos',$data)->row_array();
		logAct($this->session->userdata('id'),'Hapus videos',$dt['judul_videos']);
	}

	function indeks(){

		$jumlah= $this->model_utama->view('t_videos')->num_rows();
		$config['base_url'] = base_url().'videos/indeks/';
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
				$data['videos'] = $this->model_utama->cari_videos(cetak($this->input->post('kata')));
			}else{
				$data['title'] = "Semua videosingan";
				$data['description'] = description();
				$data['keywords'] = keywords();
				$data['videos'] = $this->model_utama->view_join_one_not('t_videos','t_kategori','id_kategori','t_kategori.nama_kategori',array('hightlight','Remaja','Anak Anak','Orang Tua'),'id_videos','DESC',$dari,$config['per_page']);
				$this->pagination->initialize($config);
			}
		}else{
			redirect('main');
		}
		$this->template->load('frontend/template','frontend/videos',$data);

	}


	function detil()
	{
		$seo   	= $this->uri->segment(3);
		$where 	= array('seo_videos'=>$seo,'publish'=>'Y');
		$query  = $this->model_utama->view_join_where('t_videos','t_kategori','id_kategori',$where);
		if ($query->num_rows()<=0){
			redirect('main');
		}else{
			$row = $query->row_array();
			$data['title'] = $row['judul_videos'];
			$data['description'] = cetak($row['judul_videos']);
			$data['keywords'] = cetak_meta($row['judul_videos'],0,150);
			$data['row'] = $row;
			$this->template->load('frontend/template','frontend/videos_detil',$data);
		}
	}



}

/* End of file videos.php */
/* Location: ./application/controllers/videos.php */