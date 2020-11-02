<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjual extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cek_session_user();
	}

	function index()
	{
		$data['title'] = 'Data penjual';
		$data['record'] = $this->model_app->view_ordering('t_penjual','id_penjual','DESC');
		$this->template->load('backend/template','backend/mod_master_penjual/view',$data);
	}

	function tambah_penjual()
	{
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'assets/uploads/penjual';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '2000'; //Kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('foto');
			$hasil = $this->upload->data();

			$this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
	        $config['cacheable']    = true; //boolean, the default is true
	        $config['cachedir']     = 'assets/'; //string, the default is application/cache/
	        $config['errorlog']     = 'assets/'; //string, the default is application/logs/
	        $config['imagedir']     = 'assets/uploads/qrpenjual/'; //direktori penyimpanan qr code
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
						'organisasi' => $this->input->post('organisasi'),
						'kta'=> $this->input->post('kta'),
						'qrcode' => $image_name,
						'blokir'=>$this->db->escape_str($this->input->post('blokir'))
					);
			}

			$q = $this->model_app->insert('t_penjual',$data);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Tambah penjual',$this->input->post('nama'));
				redirect('penjual','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('penjual','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data penjual';
			$this->template->load('backend/template','backend/mod_master_penjual/add',$data);
		}
		

	}

	function ubah_penjual()
	{
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'assets/uploads/penjual';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '2000'; //Kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('foto');
			$hasil = $this->upload->data();
			$this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
	        $config['cacheable']    = true; //boolean, the default is true
	        $config['cachedir']     = 'assets/'; //string, the default is application/cache/
	        $config['errorlog']     = 'assets/'; //string, the default is application/logs/
	        $config['imagedir']     = 'assets/uploads/qrpenjual/'; //direktori penyimpanan qr code
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
						'organisasi' => $this->input->post('organisasi'),
						'kta'=> $this->input->post('kta'),
						'qrcode' => $image_name,
						'blokir'=>$this->db->escape_str($this->input->post('blokir'))
					);
			}
			$where = array('id_penjual'=>$this->input->post('id'));
			$q = $this->model_app->update('t_penjual',$data,$where);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Ubah penjual',$this->input->post('nama'));
				redirect('penjual','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('penjual','refresh');
			}
		}else{
			$data['title'] = 'Ubah Data penjual';
			$data['row'] = $this->model_app->edit('t_penjual',array('id_penjual'=>$id))->row_array();
			$data['penjuals'] = $this->model_app->view_where_order('t_penjual',array('blokir'=>'N'),'id_penjual','DESC');
			$this->template->load('backend/template','backend/mod_master_penjual/edit',$data);
		}
		

	}

	function hapus_penjual()
	{
		$id = $this->uri->segment(3);
		$data = array('id_penjual'=>$id);
		$q = $this->model_app->delete('t_penjual',$data);
		if ($q) {
			$this->session->set_flashdata('success', 'Data berhasil diproses!');
			redirect('penjual','refresh');
		}else{
			$this->session->set_flashdata('error', 'Data gagal diproses!');
			redirect('penjual','refresh');
		}
		$dt = $this->model_app->view_where('t_penjual',$data)->row_array();
		logAct($this->session->userdata('id'),'Hapus penjual',$dt['nama']);
	}


	function profile()
	{
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'assets/uploads/penjual';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '2000'; //Kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('foto');
			$hasil = $this->upload->data();
			$this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
	        $config['cacheable']    = true; //boolean, the default is true
	        $config['cachedir']     = 'assets/'; //string, the default is application/cache/
	        $config['errorlog']     = 'assets/'; //string, the default is application/logs/
	        $config['imagedir']     = 'assets/uploads/qrpenjual/'; //direktori penyimpanan qr code
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
						'organisasi' => $this->input->post('organisasi'),
						'kta'=> $this->input->post('kta'),
						'qrcode' => $image_name
					);
			}
			$where = array('id_penjual'=>$this->input->post('id'));
			$q = $this->model_app->update('t_penjual',$data,$where);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Ubah penjual',$this->input->post('nama'));
				redirect('penjual','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('penjual','refresh');
			}
		}else{
			$data['title'] = 'Profile Saya';
			$data['row'] = $this->model_app->view_where_order('t_penjual',array('blokir'=>'N'),'id_penjual','DESC')->row_array();
			$this->template->load('backend/template','backend/mod_master_penjual/profile',$data);
		}
		

	}

}

/* End of file Penjual.php */
/* Location: ./application/controllers/admin/Penjual.php */