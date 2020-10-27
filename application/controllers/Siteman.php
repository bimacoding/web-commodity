<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siteman extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

	function index()
	{
		
		if (isset($_POST['submit'])) {
			$username = $this->input->post('a');
			$password = md5($this->input->post('b'));
			$cek = $this->model_app->cek_login($username, $password,'t_users');
			$row = $cek->row_array();
			$total = $cek->num_rows();
			if ($total > 0) {
				$array = array(
					'email'   => $row['email'],
					'level'   => $row['level'],
					'id' 	  => $row['id_users'],
					'nama' 	  => $row['nama'],
					'nik' 	  => $row['nopeg'],
					'foto' 	  => $row['foto']
				);
				
				$this->session->set_userdata( $array );
				redirect('siteman/home');
			}else{
				$data['title'] = 'Username atau Password salah!';
				$this->load->view('backend/login',$data);
			}
		}else{
			if ($this->session->userdata('level')!='') {
				 redirect('siteman/home','refresh');
			}else{
				$this->load->view('backend/login');
			}
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('siteman');
	}

	function home()
	{
		cek_session_user();
		$data['title'] = "Dashboard admin";
		$this->template->load('backend/template','backend/main',$data);
	}

	function add_logo()
	{
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'assets/images/';
			$config['allowed_types'] = 'png';
			$config['max_size']  = '20000'; //Kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('logo');
			$hasil = $this->upload->data();
			$data = array('logo'=>$hasil['file_name']);
			$where = array('id_identitas'=>1);
			$q = $this->model_app->update('t_identitas', $data, $where);

			if ($q) {
				redirect('web_setting/berhasil','refresh');
			}else{
				redirect('web_setting/gagal','refresh');

			}
			
		}
	}

	function identitaswebsite()
	{
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'assets/images/';
			$config['allowed_types'] = 'gif|jpg|png|ico';
			$config['max_size']  = '1000'; //Kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('g');
			$hasil = $this->upload->data();
			if ($hasil['file_name']=='') {
				$data = array(
								'nama_website'=>$this->db->escape_str($this->input->post('a')),
								'email'=>$this->db->escape_str($this->input->post('b')),
								'key'=>$this->db->escape_str($this->input->post('key')),
								'url'=>$this->db->escape_str($this->input->post('c')),
								'no_telp'=>$this->db->escape_str($this->input->post('d')),
								'meta_deskripsi'=>$this->db->escape_str($this->input->post('e')),
								'meta_keyword'=>$this->db->escape_str($this->input->post('f')),
								'maps'=>$this->db->escape_str($this->input->post('h')),
								'twitter'=>cetak($this->input->post('twitter')),
								'facebook'=>cetak($this->input->post('facebook')),
								'instagram'=>cetak($this->input->post('instagram')),
								'youtube'=>cetak($this->input->post('youtube'))
							  ); 
			}else{
				$data = array(
								'nama_website'=>$this->db->escape_str($this->input->post('a')),
								'email'=>$this->db->escape_str($this->input->post('b')),
								'key'=>$this->db->escape_str($this->input->post('key')),
								'url'=>$this->db->escape_str($this->input->post('c')),
								'no_telp'=>$this->db->escape_str($this->input->post('d')),
								'meta_deskripsi'=>$this->db->escape_str($this->input->post('e')),
								'meta_keyword'=>$this->db->escape_str($this->input->post('f')),
								'favicon'=>$hasil['file_name'],
								'maps'=>$this->db->escape_str($this->input->post('h')),
								'twitter'=>cetak($this->input->post('twitter')),
								'facebook'=>cetak($this->input->post('facebook')),
								'instagram'=>cetak($this->input->post('instagram')),
								'youtube'=>cetak($this->input->post('youtube'))
							  );
			}
			$where = array('id_identitas'=>$this->input->post('id'));
			$q = $this->model_app->update('t_identitas', $data, $where);
			if ($q) {
				redirect('web_setting/berhasil','refresh');
			}else{
				redirect('web_setting/gagal','refresh');
			}

		}else{
			$data = array(
							'title'=>'Setting Identitas',
							'row'=>$this->model_app->edit('t_identitas',array('id_identitas'=>1))->row_array()
						);
			$this->template->load('backend/template','backend/mod_master_identitas/identitas',$data);
		}
	}


	function download($file)
	{
		$this->load->helper('download');
		force_download('assets/uploads/'.$file , NULL);
	}


	function icon()
	{
		$data['title'] = 'Dokumentasi Icon';
		$this->template->load('backend/template','backend/dokumentasi',$data);
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


	


	
}

/* End of file Siteman.php */
/* Location: ./application/controllers/Siteman.php */