<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		if (isset($_POST['submit'])) {

			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));
			$akses 	  = $this->input->post('akses');
			$cap  = $this->input->post('angka1') + $this->input->post('angka2');
			$jum = $this->input->post('c');
			if ($cap == $jum) {
				if ($akses == 'penjual') {

					$cek = $this->model_utama->cek_login_penjual($email, $password,'t_penjual');
					$row = $cek->row_array();
					$total = $cek->num_rows();
					if ($total > 0) {
						$array = array(
							'email'   => $row['email'],
							'level'   => 'penjual',
							'kode'    => $row['kode'],
							'id' 	  => $row['id_penjual'],
							'nama' 	  => $row['nama'],
							'nik' 	  => $row['nik'],
							'foto' 	  => $row['foto']
						);
						
						$this->session->set_userdata( $array );
						redirect('pedagang');
					}else{
						redirect('auth','refresh');
					}

				}elseif($akses == 'pembeli'){

					$cek = $this->model_utama->cek_login_pembeli($email, $password,'t_pembeli');
					$row = $cek->row_array();
					$total = $cek->num_rows();
					if ($total > 0) {
						$array = array(
							'email'   => $row['email'],
							'level'   => 'pembeli',
							'kode'    => $row['kode'],
							'id' 	  => $row['id_pembeli'],
							'nama' 	  => $row['nama'],
							'nik' 	  => $row['nik'],
							'foto' 	  => $row['foto']
						);
						
						$this->session->set_userdata( $array );
						redirect('konsumen');
					}else{
						redirect('auth','refresh');
					}

				}else{
					redirect('auth');
				}
			}else{
				redirect('auth','refresh');
			}
			
		}else{
			$data['title'] = "Daftar Menjadi Penjual atau Pembeli sekarang";
			$data['description'] = description();
			$data['keywords'] = 'registrasi penjual, registrasi pembeli, login penjual, login pembeli';
			$this->template->load('frontend/template','frontend/register',$data);
		}	
	}

	public function penjual()
	{
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'assets/uploads/penjual';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['encrypt_name'] = TRUE;
			$config['max_size']  = '2000'; //Kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('foto');
			$foto = $this->upload->data();

			// kta
			$config['upload_path'] = 'assets/uploads/kta';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['encrypt_name'] = TRUE;
			$config['max_size']  = '2000'; //Kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('kta');
			$kta = $this->upload->data();

			// organisasi
			$config['upload_path'] = 'assets/uploads/organisasi';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['encrypt_name'] = TRUE;
			$config['max_size']  = '2000'; //Kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('organisasi');
			$organisasi = $this->upload->data();

			

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

			$data = array(
						'kode' => $this->mylibrary->kdauto('t_penjual','id_penjual','PDG'),
						'nik' => $this->db->escape_str($this->input->post('nik')),
						'nama' => $this->db->escape_str($this->input->post('nama')),
						'email' => $this->db->escape_str($this->input->post('email')),
						'password' => md5($this->input->post('password')),
						'nohp' => $this->db->escape_str($this->input->post('nohp')),
						'alamat' => $this->db->escape_str($this->input->post('alamat')),
						'foto' => $foto['file_name'],
						'organisasi' => $organisasi['file_name'],
						'kta' => $kta['file_name'],
						'qrcode' => $image_name,
						'blokir'=>'Y',
						'join' => date('Y-m-d H:i:s')
					);

			$q = $this->model_app->insert('t_penjual',$data);
			if ($q) {
				$this->session->set_flashdata('success', '<b>Terkirim!</b>, permohonan anda sebagai <span class="text-danger">penjual</span> akan di cek terlebih dahulu paling lambat 2 x 24 jam setelah anda mendaftar, dan sistem kami akan mengirim email pemberitahuan kepada anda. pastikan email yg anda daftarakan benar milik anda dan bukan milik orang lain.');
				redirect('auth?page=penjual','refresh');
			}else{
				$this->session->set_flashdata('error', 'Sistem kami gagal memproses data anda!');
				redirect('auth?page=penjual','refresh');
			}
		}else{
			redirect('auth?page=penjual','refresh');
		}
	}

	public function pembeli()
	{
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'assets/uploads/pembeli';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['encrypt_name'] = TRUE;
			$config['max_size']  = '2000'; //Kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('foto');
			$foto = $this->upload->data();

			// kta
			$config['upload_path'] = 'assets/uploads/kta';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['encrypt_name'] = TRUE;
			$config['max_size']  = '2000'; //Kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('kta');
			$kta = $this->upload->data();

			// nib
			$config['upload_path'] = 'assets/uploads/nib';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['encrypt_name'] = TRUE;
			$config['max_size']  = '2000'; //Kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('nib');
			$nib = $this->upload->data();


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

			$data = array(
						'kode' => $this->mylibrary->kdauto('t_pembeli','id_pembeli','CUS'),
						'nik' => $this->db->escape_str($this->input->post('nik')),
						'nama' => $this->db->escape_str($this->input->post('nama')),
						'email' => $this->db->escape_str($this->input->post('email')),
						'password' => md5($this->input->post('password')),
						'nohp' => $this->db->escape_str($this->input->post('nohp')),
						'alamat' => $this->db->escape_str($this->input->post('alamat')),
						'foto' => $foto['file_name'],
						'warganegara' => $this->input->post('warganegara'),
						'nib' => $nib['file_name'],
						'kta' => $kta['file_name'],
						'qrcode' => $image_name,
						'blokir'=>'Y',
						'join' => date('Y-m-d H:i:s')
					);

			$q = $this->model_app->insert('t_pembeli',$data);
			if ($q) {
				$this->session->set_flashdata('success', '<b>Terkirim!</b>, permohonan anda sebagai <span class="text-danger">pembeli</span> akan di cek terlebih dahulu paling lambat 2 x 24 jam setelah anda mendaftar, dan sistem kami akan mengirim email pemberitahuan kepada anda. pastikan email yg anda daftarakan benar milik anda dan bukan milik orang lain.');
				redirect('auth?page=pembeli','refresh');
			}else{
				$this->session->set_flashdata('error', 'Sistem kami gagal memproses data anda!');
				redirect('auth?page=pembeli','refresh');
			}
		}else{
			redirect('auth?page=pembeli','refresh');
		}
	}



}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */