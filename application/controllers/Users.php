<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cek_session_user();
	}

	function index()
	{
		$data['title'] = 'Data users';
		$data['record'] = $this->model_app->view_ordering('t_users','id_users','DESC');
		$this->template->load('backend/template','backend/mod_master_users/view',$data);
	}

	function tambah_users()
	{
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'assets/uploads/users';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '2000'; //Kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('foto');
			$hasil = $this->upload->data();

			$this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
	        $config['cacheable']    = true; //boolean, the default is true
	        $config['cachedir']     = 'assets/'; //string, the default is application/cache/
	        $config['errorlog']     = 'assets/'; //string, the default is application/logs/
	        $config['imagedir']     = 'assets/uploads/qrusers/'; //direktori penyimpanan qr code
	        $config['quality']      = true; //boolean, the default is true
	        $config['size']         = '5000'; //interger, the default is 1024
	        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
	        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
	        $this->ciqrcode->initialize($config);
	 
	        $image_name = md5($this->input->post('nopeg')).'.png'; //buat name dari qr code sesuai dengan nim
	 
	        $params['data'] = base_url().'siteman/qr_login_verify/'.$this->input->post('nopeg'); //data yang akan di jadikan QR CODE
	        $params['level'] = 'H'; //H=High
	        $params['size'] = 10;
	        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
	        $this->ciqrcode->generate($params);

			if ($hasil['file_name']=='') {
				$data = array(
						'nopeg' => $this->db->escape_str($this->input->post('nopeg')),
						'nama' => $this->db->escape_str($this->input->post('nama')),
						'email' => $this->db->escape_str($this->input->post('email')),
						'password' => md5($this->input->post('password')),
						'nohp' => $this->db->escape_str($this->input->post('nohp')),
						'alamat' => $this->db->escape_str($this->input->post('alamat')),
						'foto' => 'no-image.png',
						'qrcode' => $image_name,
						'level'=> $this->db->escape_str($this->input->post('level')),
						'blokir'=>$this->db->escape_str($this->input->post('blokir'))
					); 
			}else{
				$data = array(
						'nopeg' => $this->db->escape_str($this->input->post('nopeg')),
						'nama' => $this->db->escape_str($this->input->post('nama')),
						'email' => $this->db->escape_str($this->input->post('email')),
						'password' => md5($this->input->post('password')),
						'nohp' => $this->db->escape_str($this->input->post('nohp')),
						'alamat' => $this->db->escape_str($this->input->post('alamat')),
						'foto' => $hasil['file_name'],
						'qrcode' => $image_name,
						'level'=> $this->db->escape_str($this->input->post('level')),
						'blokir'=>$this->db->escape_str($this->input->post('blokir'))
					);
			}

			$q = $this->model_app->insert('t_users',$data);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Tambah users',$this->input->post('nama'));
				redirect('users','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('users','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data users';
			$this->template->load('backend/template','backend/mod_master_users/add',$data);
		}
		

	}

	function ubah_users()
	{
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'assets/uploads/users';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '2000'; //Kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('foto');
			$hasil = $this->upload->data();
			$this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
	        $config['cacheable']    = true; //boolean, the default is true
	        $config['cachedir']     = 'assets/'; //string, the default is application/cache/
	        $config['errorlog']     = 'assets/'; //string, the default is application/logs/
	        $config['imagedir']     = 'assets/uploads/qrusers/'; //direktori penyimpanan qr code
	        $config['quality']      = true; //boolean, the default is true
	        $config['size']         = '5000'; //interger, the default is 1024
	        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
	        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
	        $this->ciqrcode->initialize($config);
	 
	        $image_name = md5($this->input->post('nopeg')).'.png'; //buat name dari qr code sesuai dengan nim
	 
	        $params['data'] = base_url().'siteman/qr_login_verify/'.$this->input->post('nopeg'); //data yang akan di jadikan QR CODE
	        $params['level'] = 'H'; //H=High
	        $params['size'] = 10;
	        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
	        $this->ciqrcode->generate($params);

			if ($hasil['file_name']=='') {
				$data = array(
						'nopeg' => $this->db->escape_str($this->input->post('nopeg')),
						'nama' => $this->db->escape_str($this->input->post('nama')),
						'email' => $this->db->escape_str($this->input->post('email')),
						'password' => md5($this->input->post('password')),
						'nohp' => $this->db->escape_str($this->input->post('nohp')),
						'alamat' => $this->db->escape_str($this->input->post('alamat')),
						'qrcode' => $image_name,
						'level'=> $this->db->escape_str($this->input->post('level')),
						'blokir'=>$this->db->escape_str($this->input->post('blokir'))
					); 
			}else{
				$data = array(
						'nopeg' => $this->db->escape_str($this->input->post('nopeg')),
						'nama' => $this->db->escape_str($this->input->post('nama')),
						'email' => $this->db->escape_str($this->input->post('email')),
						'password' => md5($this->input->post('password')),
						'nohp' => $this->db->escape_str($this->input->post('nohp')),
						'alamat' => $this->db->escape_str($this->input->post('alamat')),
						'foto' => $hasil['file_name'],
						'qrcode' => $image_name,
						'level'=> $this->db->escape_str($this->input->post('level')),
						'blokir'=>$this->db->escape_str($this->input->post('blokir'))
					);
			}
			$where = array('id_users'=>$this->input->post('id'));
			$q = $this->model_app->update('t_users',$data,$where);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Ubah users',$this->input->post('nama'));
				redirect('users','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('users','refresh');
			}
		}else{
			$data['title'] = 'Ubah Data users';
			$data['row'] = $this->model_app->edit('t_users',array('id_users'=>$id))->row_array();
			$data['userss'] = $this->model_app->view_where_order('t_users',array('blokir'=>'N'),'id_users','DESC');
			$this->template->load('backend/template','backend/mod_master_users/edit',$data);
		}
		

	}

	function hapus_users()
	{
		$id = $this->uri->segment(3);
		$data = array('id_users'=>$id);
		$q = $this->model_app->delete('t_users',$data);
		if ($q) {
			$this->session->set_flashdata('success', 'Data berhasil diproses!');
			redirect('users','refresh');
		}else{
			$this->session->set_flashdata('error', 'Data gagal diproses!');
			redirect('users','refresh');
		}
		$dt = $this->model_app->view_where('t_users',$data)->row_array();
		logAct($this->session->userdata('id'),'Hapus users',$dt['nama']);
	}


	function profile()
	{
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'assets/uploads/users';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '2000'; //Kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('foto');
			$hasil = $this->upload->data();
			$this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
	        $config['cacheable']    = true; //boolean, the default is true
	        $config['cachedir']     = 'assets/'; //string, the default is application/cache/
	        $config['errorlog']     = 'assets/'; //string, the default is application/logs/
	        $config['imagedir']     = 'assets/uploads/qrusers/'; //direktori penyimpanan qr code
	        $config['quality']      = true; //boolean, the default is true
	        $config['size']         = '5000'; //interger, the default is 1024
	        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
	        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
	        $this->ciqrcode->initialize($config);
	 
	        $image_name = md5($this->input->post('nopeg')).'.png'; //buat name dari qr code sesuai dengan nim
	 
	        $params['data'] = base_url().'siteman/qr_login_verify/'.$this->input->post('nopeg'); //data yang akan di jadikan QR CODE
	        $params['level'] = 'H'; //H=High
	        $params['size'] = 10;
	        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
	        $this->ciqrcode->generate($params);
			if ($hasil['file_name']=='') {
				$data = array(
						'nopeg' => $this->db->escape_str($this->input->post('nopeg')),
						'nama' => $this->db->escape_str($this->input->post('nama')),
						'email' => $this->db->escape_str($this->input->post('email')),
						'password' => md5($this->input->post('password')),
						'nohp' => $this->db->escape_str($this->input->post('nohp')),
						'alamat' => $this->db->escape_str($this->input->post('alamat')),
						'qrcode' => $image_name
					); 
			}else{
				$data = array(
						'nopeg' => $this->db->escape_str($this->input->post('nopeg')),
						'nama' => $this->db->escape_str($this->input->post('nama')),
						'email' => $this->db->escape_str($this->input->post('email')),
						'password' => md5($this->input->post('password')),
						'nohp' => $this->db->escape_str($this->input->post('nohp')),
						'alamat' => $this->db->escape_str($this->input->post('alamat')),
						'foto' => $hasil['file_name'],
						'qrcode' => $image_name
					);
			}
			$where = array('id_users'=>$this->input->post('id'));
			$q = $this->model_app->update('t_users',$data,$where);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Ubah users',$this->input->post('nama'));
				redirect('users','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('users','refresh');
			}
		}else{
			$data['title'] = 'Profile Saya';
			$data['row'] = $this->model_app->edit('t_users',array('nopeg'=>$id))->row_array();
			$data['userss'] = $this->model_app->view_where_order('t_users',array('blokir'=>'N'),'id_users','DESC');
			$this->template->load('backend/template','backend/mod_master_users/profile',$data);
		}
		

	}

}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */