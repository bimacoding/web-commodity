<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Warta extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Semua Data File';
		$data['record'] = $this->model_app->view_join_one('t_warta','t_kategori','id_kategori','id_warta','DESC');
		$this->template->load('backend/template','backend/mod_master_warta/view',$data);

	}

	function tambah_warta()
	{
		if (isset($_POST['submit'])) {
			$data = array(
				'id_kategori' => $this->db->escape_str($this->input->post('id_kategori')), 
				'seo_warta' => seo_title($this->input->post('seo_warta')), 
				'judul_warta' => cetak($this->input->post('judul_warta')),
				'file_warta' =>$this->input->post('file_warta'), 
				'tgl_warta' => date($this->input->post('tgl_warta')), 
				'created_on' => date('Y-m-d'), 
				'created_by' => $this->session->userdata('nama'), 
				'aktif' => $this->input->post('aktif'), 
			);
			$q = $this->model_app->insert('t_warta',$data);
			if ($q) {
				redirect('warta','refresh');
			}else{
				redirect('warta','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data File';
			$data['kategori'] = $this->model_app->view_where('t_kategori',array('aktif'=>'Y','jenis'=>'warta'))->result_array();
			$this->template->load('backend/template','backend/mod_master_warta/add',$data);
		}
		
	}

	function ubah_warta()
	{
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
				'id_kategori' => $this->db->escape_str($this->input->post('id_kategori')), 
				'seo_warta' => seo_title($this->input->post('seo_warta')), 
				'judul_warta' => cetak($this->input->post('judul_warta')),
				'file_warta' =>$this->input->post('file_warta'), 
				'tgl_warta' => date($this->input->post('tgl_warta')), 
				'aktif' => $this->input->post('aktif'), 
			);
			$where = array('id_warta'=>$this->input->post('id'));
			$q = $this->model_app->update('t_warta',$data);
			if ($q) {
				redirect('warta','refresh');
			}else{
				redirect('warta','refresh');
			}
		}else{
			$data['title'] = 'Ubah Data File';
			$data['row'] = $this->model_app->edit('t_warta',array('id_warta'=>$id))->row_array();
			$data['kategori'] = $this->model_app->view_where('t_kategori',array('aktif'=>'Y','jenis'=>'warta'))->result_array();
			$this->template->load('backend/template','backend/mod_master_warta/edit',$data);
		}
		
	}

	function hapus_warta()
	{
		cek_session_user();
		$id = $this->uri->segment(3);
		$data = array('id_warta'=>$id);
		$q = $this->model_app->delete('t_warta',$data);
		if ($q) {
			$this->session->set_flashdata('success', 'Data berhasil diproses!');
			redirect('warta','refresh');
		}else{
			$this->session->set_flashdata('error', 'Data gagal diproses!');
			redirect('warta','refresh');
		}
		$dt = $this->model_app->view_where('t_warta',$data)->row_array();
		logAct($this->session->userdata('id'),'Hapus warta',$dt['judul_warta']);
	}

	function upload_file()
	{
		error_reporting(0);
		ini_set('memory_limit', '1024M');
		ini_set('max_execution_time', 3600);
		$ret = array();
		$config['upload_path']   = 'assets/uploads/';
		$config['allowed_types'] = '*';
		$config['max_size']  	 = '5000';
		$config['remove_spaces'] = TRUE;
		$config['overwrite']     = TRUE;
		$this->load->library('upload', $config);
		$error = $this->upload->display_errors('<p>', '</p>');
		if ($this->upload->do_upload('upload_kalibrasi')) {
			$data = array('xyz'=>$this->upload->data());
			$file = $data['xyz']['file_name'];
			$ret[] = htmlspecialchars(htmlentities(preg_replace('/[^A-Za-z0-9\-]/', '_', $file)));
			echo json_encode(str_replace(['_pdf','_doc','_docx','_ppt','_pptx'], ['.pdf','.doc','.docx','.ppt','.pptx'], $ret));
		}
	}

	function delete()
	{
		$filenames = $this->input->post('name');
		$output_dir = 'assets/uploads/';
		$filePath = $output_dir. $filenames;
		if (file_exists($filePath)) 
		{
	        unlink($filePath);
	    }
		redirect('restore/index/berhasil','refresh');
	}

	function detil()
	{
		$seo   	= $this->uri->segment(3);
		$where 	= array('seo_kategori'=>$seo,'t_warta.aktif'=>'Y');
		$query  = $this->model_utama->view_join_where('t_warta','t_kategori','id_kategori',$where);

		$data['cek'] = $query->num_rows();
		$row = $query->row_array();
		$data['title'] = str_replace('-', ' ', $seo);
		$data['description'] = cetak($row['judul_warta']);
		$data['keywords'] = cetak_meta($row['judul_warta'],0,150);
		$data['row'] = $query;
		$this->template->load('frontend/template','frontend/warta',$data);

	}

	// function generate_pdf()
	// {
	// 	$filenm = $this->uri->segment(3);
	// 	$doc = new Docx_reader();
	//     $doc->setFile($filenm);

	//     $plain_text = $doc->to_plain_text();
	//     $html = $doc->to_html();

	//     $pdf = pdf_create($html, 'readDocPdf', false);
	//     $len = strlen($pdf);
	//     header("Content-type: application/pdf");
	//     header("Content-Length:" . $len);
	//     header("Content-Disposition: inline; filename=Resume.pdf");
	//     print $pdf;
	// }

	// function read_file()
	// {
		
	// }

}

/* End of file Warta.php */
/* Location: ./application/controllers/Warta.php */