<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function index()
	{
		redirect('siteman/index','refresh');
	}

	public function getHistory()
	{
		$this->load->model('model_ajax');
		if( $this->input->is_ajax_request()  )  {
			$datatables  = $_POST;
			$datatables['table']    = 't_histori';
			$datatables['id-table'] = 'id_histori';
			$datatables['col-display'] = array(
			                "id_histori",
			                "id_users",
			                "kegiatan",
			                "data",
			                "ip",
			                "browser",
			             );
			$this->model_ajax->get_Datatables($datatables);
		}
		return;
    }

    function filterp($str){
		$str 	= filter_input(INPUT_POST, $str, FILTER_SANITIZE_STRING);
		return $str;
	}
	function filterg($str){
		$str 	= filter_input(INPUT_GET, $str, FILTER_SANITIZE_STRING);
		return $str;
	}
	function nes_menu_save()
	{

		$label = $this->input->get('label');
		$level = $this->input->get('level');

		if ($this->input->get('link')!='') {
			$link = $this->input->get('link');
		}elseif ($this->input->get('page')!='') {
			// $link = 'hal/detil/'.$this->input->get('page');
			$link = 'hal/'.$this->input->get('page');
		}elseif ($this->input->get('kategori')) {
			$link = 'kategori/list/'.$this->input->get('kategori');
		}
		
		$aktif = $this->input->get('aktif');
		$id = $this->input->get('id');

		if($id != ''){

			$this->db->query("UPDATE t_front_menu SET nama_menu = '".$label."', link  = '".$link."', level_akses = '".$level."' WHERE id_menu = '".$id."' ");

			$arr['type']  = 'edit';
			$arr['label'] = $label;
			$arr['link']  = $link;
			$arr['id']    = $id;
			$arr['level'] = $level;
		} else {
			$sql = $this->db->query("SELECT max(urutan)+1 as urutan FROM t_front_menu");
			$row = $sql->row_array();
			$this->db->query("INSERT INTO t_front_menu (nama_menu,link,aktif,urutan,level_akses) values ('".$label."', '".$link."', 'Ya', '".$row['urutan']."','".$level."')");
			$lastid = $this->db->insert_id();
			$arr['menu'] = '<li class="dd-item dd3-item" data-id="'.$lastid.'" >
			                    <div class="dd-handle dd3-handle"></div>
			                    <div class="dd3-content"><span id="label_show'.$lastid.'">'.$label.'</span>
			                        <span class="float-right">/<span id="link_show'.$lastid.'">'.$link.'</span> &nbsp;&nbsp; 
			                        	<a class="edit-button" id="'.$lastid.'" label="'.$label.'" link="'.$link.'" ><i class="fa fa-pencil"></i></a>
		                           		<a class="del-button" id="'.$lastid.'"><i class="fa fa-trash"></i></a>
			                        </span> 
			                    </div>';
			$arr['type'] = 'add';

		}
		echo json_encode($arr);
	}

	function recursiveDelete($id) {
	    $query = $this->db->query("SELECT * FROM t_front_menu where id_parent = '".$id."' ");
	    if ($query->num_rows() > 0) {
	       foreach ($query->result_array() as $current) {
	            $this->recursiveDelete($current['id_menu']);
	       }
	    }
	    $this->db->query("DELETE FROM t_front_menu where id_menu = '".$id."' ");
	   
	}

	function nes_menu_delete()
	{
		$getid = $this->input->get('id');
		$this->recursiveDelete($getid);
	}

	function nes_menu_update()
	{
		$data = json_decode($_GET['data']);
		function parseJsonArray($jsonArray, $parentID = 0) {
		  $return = array();
		  foreach ($jsonArray as $subArray) {
		    $returnSubSubArray = array();
		    if (isset($subArray->children)) {
		 		$returnSubSubArray = parseJsonArray($subArray->children, $subArray->id);
		    }
		    $return[] = array('id' => $subArray->id, 'parentID' => $parentID);
		    $return = array_merge($return, $returnSubSubArray);
		  }
		  return $return;
		}

		$readbleArray = parseJsonArray($data);

		$i=0;
		foreach($readbleArray as $row){
			$qry = $this->db->query("UPDATE t_front_menu SET id_parent= '".$row['parentID']."', urutan='$i' WHERE id_menu = '".$row['id']."' ");
		  $i++;
		}

		if($qry){
			echo 1;
		}else{
			echo 2;
		}
	}

	function getProduct()
	{
		error_reporting(0);
		$search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
		$limit = $_POST['length']; // Ambil data limit per page
		$start = $_POST['start']; // Ambil data start

		$sql = $this->model_app->view_join_once('t_product','t_kategori','id_kategori','id_product','DESC');
		$sql_count = $sql->num_rows(); // Hitung data yg ada pada query $sql

		$query = "SELECT a.*, b.* FROM t_product a 
				  LEFT JOIN t_kategori b ON a.id_kategori=b.id_kategori
				  WHERE (a.nama_product LIKE '%".$search."%' OR
					   a.asal_product LIKE '%".$search."%' OR
					   a.harga_product LIKE '%".$search."%' OR
					   a.berat_product LIKE '%".$search."%' OR
					   b.nama_kategori LIKE '%".$search."%')";

		$order_index = $_POST['order'][0]['column']; // Untuk mengambil index yg menjadi acuan untuk sorting
		$order_field = $_POST['columns'][$order_index]['data']; // Untuk mengambil nama field yg menjadi acuan untuk sorting
		$order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"

		$order = " ORDER BY ".$order_field." ".$order_ascdesc;

		$sql_data = $this->db->query($query.$order." LIMIT ".$limit." OFFSET ".$start); 

		$sql_filter = $this->db->query($query); 
		$sql_filter_count = $sql_filter->num_rows(); 
		$data = $sql_data->result_array(); 
		$data_detil =array();
		foreach ($data as $keys) {

			$data_detil[] = array(
				'id_product'   => $keys['id_product'],
				'nama_product' => $keys['nama_product'],
				'asal_product' => $keys['asal_product'],
				'harga_product'=> $keys['harga_product'],
				'kg_product'   => $keys['berat_product'],
				'kat_product'  => getNamaKat($keys['id_kategori']),
			);
		}

		$callback = array(
			'csrf_test_name'=>$this->security->get_csrf_hash(),
		    'draw'=>$_POST['draw'], // Ini dari datatablenya
		    'recordsTotal'=>$sql_count,
		    'recordsFiltered'=>$sql_filter_count,
		    'data'=>$data_detil
		);
		header('Content-Type: application/json');
		echo json_encode($callback);
	}


	function delImages($id,$doc)
	{
		$idDoc    = $doc;
		$indexArr = $id;
		$getVal = $this->model_app->edit('t_product',['id_product'=>$indexArr])->row_array();
		$arr = explode('|', $getVal['foto_product']);
		$cek = count($arr);
		if ($cek>1) {
			$newData = '';
			foreach ($arr as $key => $value) {
				if ($key !== $indexArr) {
					$newData .= $value.'|';
				}
			}
			$q = $this->model_app->update('t_product',['foto_product'=>substr($newData,0,-1)],['id_product'=>$idDoc]);
			if ($q) {
				echo 1;
			}else{
				echo 0;
			}
		}
	}

	function tes()
	{
		$idDoc    = 1;
		$indexArr = 1;
		$getVal = $this->model_app->edit('t_product',['id_product'=>$indexArr])->row_array();
		$arr = explode('|', $getVal['foto_product']);
		$cek = count($arr);
		if ($cek>1) {
			$newData = '';
			foreach ($arr as $key => $value) {
				if ($key !== $indexArr) {
					$newData .= $value.'|';
				}
			}
			echo $newData;
		}else{
			echo "0";
		}
	}

}

/* End of file Ajax.php */
/* Location: ./application/controllers/Ajax.php */