<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function index()
	{
		echo "string";
	}

	public function tambah_produk()
	{
		if (isset($_POST['submit'])) {
			$img_produk  = count($this->input->post('fileFoto'));
			$list_img = array();
			foreach ($img_produk as $keys) {
				$img_produk[] = implode(',', $key);
			}

			$kode_produk = kdauto('t_produk', 'id_produk', 'PRODUK')
			$this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
	        $config['cacheable']    = true; //boolean, the default is true
	        $config['cachedir']     = 'assets/'; //string, the default is application/cache/
	        $config['errorlog']     = 'assets/'; //string, the default is application/logs/
	        $config['imagedir']     = 'assets/uploads/qrproduk/'; //direktori penyimpanan qr code
	        $config['quality']      = true; //boolean, the default is true
	        $config['size']         = '5000'; //interger, the default is 1024
	        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
	        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
	        $this->ciqrcode->initialize($config);
	 
	        $image_name = md5($kode_produk).'.png'; //buat name dari qr code sesuai dengan nim
	 
	        $params['data'] = base_url().'produk/scan_produk/'.$kode_produk; //data yang akan di jadikan QR CODE
	        $params['level'] = 'H'; //H=High
	        $params['size'] = 10;
	        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
	        $this->ciqrcode->generate($params);

	        $data = array(
	        	'qrcode_produk' => $image_name,
				'kode_produk' => $kode_produk,
				'nama_produk' => $this->input->post('name'),
				'seo_produk' => $this->input->post('name'),
				'desc_produk' => $this->input->post('name'),
				'jenis_produk' => $this->input->post('name'),
				'varian_produk' => $this->input->post('name'),
				'stok_produk' => $this->input->post('name'),
				'berat_produk' => $this->input->post('name'),
				'panjang_produk' => $this->input->post('name'),
				'lebar_produk' => $this->input->post('name'),
				'tinggi_produk' => $this->input->post('name'),
				'harga_retail_produk' => $this->input->post('name'),
				'harga_member_produk' => $this->input->post('name'),
				'gambar_produk' => $this->input->post('name'),
				'publish_produk' => $this->input->post('name'),
				'hits_produk' => 0,
				'created_on' => date('Y-m-d'),
				'created_by' =>$this->input->post('name')	
	        );
			
		}else{

		}
		
	}

}

/* End of file Produk.php */
/* Location: ./application/controllers/Produk.php */