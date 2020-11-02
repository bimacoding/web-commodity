<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pembeli extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cek_session_user();
	}

	function index()
	{
		$data['title'] = 'Data pembeli';
		$data['record'] = $this->model_app->view_ordering('t_pembeli','id_pembeli','DESC');
		$this->template->load('backend/template','backend/mod_master_pembeli/view',$data);
	}

	function tambah_pembeli()
	{
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'assets/uploads/pembeli';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '2000'; //Kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('foto');
			$hasil = $this->upload->data();

			$this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
	        $config['cacheable']    = true; //boolean, the default is true
	        $config['cachedir']     = 'assets/'; //string, the default is application/cache/
	        $config['errorlog']     = 'assets/'; //string, the default is application/logs/
	        $config['imagedir']     = 'assets/uploads/qrpembeli/'; //direktori penyimpanan qr code
	        $config['quality']      = true; //boolean, the default is true
	        $config['size']         = '5000'; //interger, the default is 1024
	        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
	        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
	        $this->ciqrcode->initialize($config);
	 
	        $image_name = md5($this->input->post('nik')).'.png'; //buat name dari qr code sesuai dengan nim
	 
	        $params['data'] = base_url().'siteman/qr_login_verify/'.$this->input->post('nik'); //data yang akan di jadikan QR CODE
	        $params['level'] = 'H'; //H=High
	        $params['size'] = 10;
	        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
	        $this->ciqrcode->generate($params);

			if ($hasil['file_name']=='') {
				$data = array(
						'nik' => $this->db->escape_str($this->input->post('nik')),
						'nama' => $this->db->escape_str($this->input->post('nama')),
						'email' => $this->db->escape_str($this->input->post('email')),
						'password' => md5($this->input->post('password')),
						'nohp' => $this->db->escape_str($this->input->post('nohp')),
						'alamat' => $this->db->escape_str($this->input->post('alamat')),
						'foto' => 'no-image.png',
						'qrcode' => $image_name,
						'blokir'=>$this->db->escape_str($this->input->post('blokir'))
					); 
			}else{
				$data = array(
						'nik' => $this->db->escape_str($this->input->post('nik')),
						'nama' => $this->db->escape_str($this->input->post('nama')),
						'email' => $this->db->escape_str($this->input->post('email')),
						'password' => md5($this->input->post('password')),
						'nohp' => $this->db->escape_str($this->input->post('nohp')),
						'alamat' => $this->db->escape_str($this->input->post('alamat')),
						'foto' => $hasil['file_name'],
						'nib' => $this->input->post('nib'),
						'kta'=> $this->input->post('kta'),
						'qrcode' => $image_name,
						'blokir'=>$this->db->escape_str($this->input->post('blokir'))
					);
			}

			$q = $this->model_app->insert('t_pembeli',$data);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Tambah pembeli',$this->input->post('nama'));
				redirect('pembeli','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('pembeli','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data pembeli';
			$this->template->load('backend/template','backend/mod_master_pembeli/add',$data);
		}
		

	}

	function ubah_pembeli()
	{
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'assets/uploads/pembeli';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '2000'; //Kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('foto');
			$hasil = $this->upload->data();
			$this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
	        $config['cacheable']    = true; //boolean, the default is true
	        $config['cachedir']     = 'assets/'; //string, the default is application/cache/
	        $config['errorlog']     = 'assets/'; //string, the default is application/logs/
	        $config['imagedir']     = 'assets/uploads/qrpembeli/'; //direktori penyimpanan qr code
	        $config['quality']      = true; //boolean, the default is true
	        $config['size']         = '5000'; //interger, the default is 1024
	        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
	        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
	        $this->ciqrcode->initialize($config);
	 
	        $image_name = md5($this->input->post('nik')).'.png'; //buat name dari qr code sesuai dengan nim
	 
	        $params['data'] = base_url().'siteman/qr_login_verify/'.$this->input->post('nik'); //data yang akan di jadikan QR CODE
	        $params['level'] = 'H'; //H=High
	        $params['size'] = 10;
	        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
	        $this->ciqrcode->generate($params);

			if ($hasil['file_name']=='') {
				$data = array(
						'nik' => $this->db->escape_str($this->input->post('nik')),
						'nama' => $this->db->escape_str($this->input->post('nama')),
						'email' => $this->db->escape_str($this->input->post('email')),
						'password' => md5($this->input->post('password')),
						'nohp' => $this->db->escape_str($this->input->post('nohp')),
						'alamat' => $this->db->escape_str($this->input->post('alamat')),
						'qrcode' => $image_name,
						'blokir'=>$this->db->escape_str($this->input->post('blokir'))
					); 
			}else{
				$data = array(
						'nik' => $this->db->escape_str($this->input->post('nik')),
						'nama' => $this->db->escape_str($this->input->post('nama')),
						'email' => $this->db->escape_str($this->input->post('email')),
						'password' => md5($this->input->post('password')),
						'nohp' => $this->db->escape_str($this->input->post('nohp')),
						'alamat' => $this->db->escape_str($this->input->post('alamat')),
						'foto' => $hasil['file_name'],
						'nib' => $this->input->post('nib'),
						'kta'=> $this->input->post('kta'),
						'qrcode' => $image_name,
						'blokir'=>$this->db->escape_str($this->input->post('blokir'))
					);
			}
			$where = array('id_pembeli'=>$this->input->post('id'));
			$q = $this->model_app->update('t_pembeli',$data,$where);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Ubah pembeli',$this->input->post('nama'));
				redirect('pembeli','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('pembeli','refresh');
			}
		}else{
			$data['title'] = 'Ubah Data pembeli';
			$data['row'] = $this->model_app->edit('t_pembeli',array('id_pembeli'=>$id))->row_array();
			$data['pembelis'] = $this->model_app->view_where_order('t_pembeli',array('blokir'=>'N'),'id_pembeli','DESC');
			$this->template->load('backend/template','backend/mod_master_pembeli/edit',$data);
		}
		

	}

	function hapus_pembeli()
	{
		$id = $this->uri->segment(3);
		$data = array('id_pembeli'=>$id);
		$q = $this->model_app->delete('t_pembeli',$data);
		if ($q) {
			$this->session->set_flashdata('success', 'Data berhasil diproses!');
			redirect('pembeli','refresh');
		}else{
			$this->session->set_flashdata('error', 'Data gagal diproses!');
			redirect('pembeli','refresh');
		}
		$dt = $this->model_app->view_where('t_pembeli',$data)->row_array();
		logAct($this->session->userdata('id'),'Hapus pembeli',$dt['nama']);
	}


	function profile()
	{
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'assets/uploads/pembeli';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '2000'; //Kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('foto');
			$hasil = $this->upload->data();
			$this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
	        $config['cacheable']    = true; //boolean, the default is true
	        $config['cachedir']     = 'assets/'; //string, the default is application/cache/
	        $config['errorlog']     = 'assets/'; //string, the default is application/logs/
	        $config['imagedir']     = 'assets/uploads/qrpembeli/'; //direktori penyimpanan qr code
	        $config['quality']      = true; //boolean, the default is true
	        $config['size']         = '5000'; //interger, the default is 1024
	        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
	        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
	        $this->ciqrcode->initialize($config);
	 
	        $image_name = md5($this->input->post('nik')).'.png'; //buat name dari qr code sesuai dengan nim
	 
	        $params['data'] = base_url().'siteman/qr_login_verify/'.$this->input->post('nik'); //data yang akan di jadikan QR CODE
	        $params['level'] = 'H'; //H=High
	        $params['size'] = 10;
	        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
	        $this->ciqrcode->generate($params);
			if ($hasil['file_name']=='') {
				$data = array(
						'nik' => $this->db->escape_str($this->input->post('nik')),
						'nama' => $this->db->escape_str($this->input->post('nama')),
						'email' => $this->db->escape_str($this->input->post('email')),
						'password' => md5($this->input->post('password')),
						'nohp' => $this->db->escape_str($this->input->post('nohp')),
						'alamat' => $this->db->escape_str($this->input->post('alamat')),
						'qrcode' => $image_name
					); 
			}else{
				$data = array(
						'nik' => $this->db->escape_str($this->input->post('nik')),
						'nama' => $this->db->escape_str($this->input->post('nama')),
						'email' => $this->db->escape_str($this->input->post('email')),
						'password' => md5($this->input->post('password')),
						'nohp' => $this->db->escape_str($this->input->post('nohp')),
						'alamat' => $this->db->escape_str($this->input->post('alamat')),
						'foto' => $hasil['file_name'],
						'nib' => $this->input->post('nib'),
						'kta'=> $this->input->post('kta'),
						'qrcode' => $image_name
					);
			}
			$where = array('id_pembeli'=>$this->input->post('id'));
			$q = $this->model_app->update('t_pembeli',$data,$where);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Ubah pembeli',$this->input->post('nama'));
				redirect('pembeli','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('pembeli','refresh');
			}
		}else{
			$data['title'] = 'Profile Saya';
			$data['row'] = $this->model_app->view_where_order('t_pembeli',array('blokir'=>'N'),'id_pembeli','DESC')->row_array();
			$this->template->load('backend/template','backend/mod_master_pembeli/profile',$data);
		}
		

	}

}

/* End of file pembeli.php */
/* Location: ./application/controllers/admin/pembeli.php */