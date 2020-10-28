<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Data Product';
		$this->template->load('backend/template','backend/mod_master_product/view',$data);
	}

	function _create_thumbs($file_name){
        // Image resizing config
        $config = array(
            // Image Large
            array(
                'image_library' => 'GD2',
                'source_image'  => 'assets/uploads/product/'.$file_name,
                'maintain_ratio'=> FALSE,
                'width'         => 700,
                'height'        => 467,
                'new_image'     => 'assets/uploads/product/thumbnail/large/'.$file_name
                ),
            // image Medium
            array(
                'image_library' => 'GD2',
                'source_image'  => 'assets/uploads/product/'.$file_name,
                'maintain_ratio'=> FALSE,
                'width'         => 600,
                'height'        => 400,
                'new_image'     => 'assets/uploads/product/thumbnail/medium/'.$file_name
                ),
            // Image Small
            array(
                'image_library' => 'GD2',
                'source_image'  => 'assets/uploads/product/'.$file_name,
                'maintain_ratio'=> FALSE,
                'width'         => 100,
                'height'        => 67,
                'new_image'     => 'assets/uploads/product/thumbnail/small/'.$file_name
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

	public function tambah_product()
	{
		cek_session_user();
		if (isset($_POST['submit'])) {
			$data = array(
				'id_penjual'       => $this->session->userdata('id'),
				'id_kategori'      => $this->input->post('a'),
				'seo_product'      => seo_title($this->input->post('b')),
				'nama_product'     => $this->input->post('b'),
				'ket_product'      => cetak($this->input->post('c')),
				'harga_product'    => $this->db->escape_str($this->input->post('d')),
				'foto_product'     => substr($this->input->post('foto'),0,-1),
				'berat_product'    => $this->db->escape_str($this->input->post('e')),
				'asal_product'     => $this->input->post('f'),
				'created_on'       => date('Y-m-d H:i:s'),
				'created_by'       => $this->session->userdata('id'),
				'publish_product'  => $this->input->post('g'),
			);
			$q = $this->model_app->insert('t_product',$data);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Tambah Product',$this->input->post('nama_product'));
				redirect('product','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('product','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Product';
			$data['kat']   = $this->model_app->view_where('t_kategori',['jenis'=>'produk','aktif'=>'Y'])->result_array();
			$this->template->load('backend/template','backend/mod_master_product/add',$data);
		}
	}

	public function ubah_product()
	{
		cek_session_user();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$foto = $this->input->post('foto');
			if ($foto=='') {
				$data = array(
					'id_penjual'       => $this->session->userdata('id'),
					'id_kategori'      => $this->input->post('a'),
					'seo_product'      => seo_title($this->input->post('b')),
					'nama_product'     => $this->input->post('b'),
					'ket_product'      => cetak($this->input->post('c')),
					'harga_product'    => $this->db->escape_str($this->input->post('d')),
					'berat_product'    => $this->db->escape_str($this->input->post('e')),
					'asal_product'     => $this->input->post('f'),
					'created_on'       => date('Y-m-d H:i:s'),
					'created_by'       => $this->session->userdata('id'),
					'publish_product'  => $this->input->post('g'),
				);
			}else{
				$data = array(
					'id_penjual'       => $this->session->userdata('id'),
					'id_kategori'      => $this->input->post('a'),
					'seo_product'      => seo_title($this->input->post('b')),
					'nama_product'     => $this->input->post('b'),
					'ket_product'      => cetak($this->input->post('c')),
					'harga_product'    => $this->db->escape_str($this->input->post('d')),
					'foto_product'     => substr($this->input->post('foto'),0,-1),
					'berat_product'    => $this->db->escape_str($this->input->post('e')),
					'asal_product'     => $this->input->post('f'),
					'created_on'       => date('Y-m-d H:i:s'),
					'created_by'       => $this->session->userdata('id'),
					'publish_product'  => $this->input->post('g'),
				);
			}
			
			$where = array('id_product'=>$this->input->post('id'));
			$q = $this->model_app->update('t_product',$data,$where);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Ubah Product',$this->input->post('nama_product'));
				redirect('product','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('product','refresh');
			}
		}else{
			$data['title'] = 'Ubah Data Product';
			$data['kat']   = $this->model_app->view_where('t_kategori',['jenis'=>'produk','aktif'=>'Y'])->result_array();
			$data['row']   = $this->model_app->edit('t_product',array('id_product'=>$id))->row_array();
			$this->template->load('backend/template','backend/mod_master_product/edit',$data);
		}
	}

	public function hapus_product()
	{
		cek_session_user();
		$id = $this->uri->segment(3);
		$data = array('id_product'=>$id);
		$q = $this->model_app->delete('t_product',$data);
		if ($q) {
			$this->session->set_flashdata('success', 'Data berhasil diproses!');
			redirect('product','refresh');
		}else{
			$this->session->set_flashdata('error', 'Data gagal diproses!');
			redirect('product','refresh');
		}
		$dt = $this->model_app->view_where('t_product',$data)->row_array();
		logAct($this->session->userdata('id'),'Hapus product',$dt['judul_post']);
	}


	function upload_foto_product()
	{
		 $ret = array();
		 $config['upload_path'] = 'assets/uploads/product/';
		 $config['allowed_types'] = 'gif|jpg|png|jpeg';
		 $config['encrypt_name'] = TRUE;
		 // $config['encrypt_name']  = true;
		 $this->load->library('upload', $config);

		 $error = $this->upload->display_errors('<p>', '</p>');

		 if ($this->upload->do_upload('uploadFile')) {
		 	$data = array('xyz'=>$this->upload->data());
		 	$file = $data['xyz']['file_name'];
		 	$this->_create_thumbs($data['xyz']['file_name']);
		 	$ret[] = $file;
		 	echo json_encode($ret);
		 }
	}

	function delete_foto_product()
	{
		$output_dir = 'assets/uploads/product/';
		if(isset($_POST["op"]) && $_POST["op"] == "delete" && isset($_POST['name']))
		{
			$fileName =$_POST['name'];
			$filePath = $output_dir. $fileName;
			if (file_exists($filePath)) 
			{
		        unlink($filePath);
		    }
			echo "Deleted File ".$fileName."<br>";
		}
	}

}

/* End of file Product.php */
/* Location: ./application/controllers/admin/Product.php */