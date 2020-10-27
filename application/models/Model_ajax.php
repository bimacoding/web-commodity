<?php 

class Model_ajax extends CI_Model {

	public function get_Datatables($datatables)
    {
        $columns = implode(', ', $datatables['col-display']) . ', ' . $datatables['id-table'];

        $sql  = "SELECT {$columns} FROM {$datatables['table']} ";
        $data = $this->db->query($sql);
        $rowCount = $data->num_rows();
        $data->free_result();
        // pengkondisian aksi seperti next, search dan limit
        $columnd = $datatables['col-display'];
        $count_c = count($columnd);
        // search
        $search = $datatables['search']['value'];

        $where = '';
        if ($search != '') {   
            for ($i=0; $i < $count_c ; $i++) {
                $where .= $columnd[$i] .' LIKE "%'. $search .'%"';
                if ($i < $count_c - 1) {
                    $where .= ' OR ';
                }
            }
        }

        for ($i=0; $i < $count_c; $i++) { 
            $searchCol = $datatables['columns'][$i]['search']['value'];
            if ($searchCol != '') {
                $where = $columnd[$i] . ' LIKE "%' . $searchCol . '%" ';
                break;
            }
        }

        if ($where != '') {
            $sql .= " WHERE " . $where;
        }
        // sorting
        $sql .= " ORDER BY {$columnd[$datatables['order'][0]['column']]} {$datatables['order'][0]['dir']}";
        // limit
        $start  = $datatables['start'];
        $length = $datatables['length'];
        $sql .= " LIMIT {$start}, {$length}";
        $list = $this->db->query($sql);

        $no = 1; // untuk no urut
        $option['draw']            = $datatables['draw'];
        $option['recordsTotal']    = $rowCount;
        $option['recordsFiltered'] = $rowCount;
        $option['data']            = array();
        foreach ($list->result() as $row) {
            $option['data'][] = array(
                                        $row->id_histori,
                                        get_users($row->id_users),
                                        $row->kegiatan,
                                        $row->data,
                                        $row->ip,
                                        $row->browser,
                                      );
        }
        // eksekusi json
        echo json_encode($option);
    }

    public function get_DatatablesAcara($datatables)
    {
        $columns = implode(', ', $datatables['col-display']) . ', ' . $datatables['id-table'];

        $sql  = "SELECT {$columns} FROM {$datatables['table']} ";
        $data = $this->db->query($sql);
        $rowCount = $data->num_rows();
        $data->free_result();
        // pengkondisian aksi seperti next, search dan limit
        $columnd = $datatables['col-display'];
        $count_c = count($columnd);
        // search
        $search = $datatables['search']['value'];

        $where = '';
        if ($search != '') {   
            for ($i=0; $i < $count_c ; $i++) {
                $where .= $columnd[$i] .' LIKE "%'. $search .'%"';
                if ($i < $count_c - 1) {
                    $where .= ' OR ';
                }
            }
        }

        for ($i=0; $i < $count_c; $i++) { 
            $searchCol = $datatables['columns'][$i]['search']['value'];
            if ($searchCol != '') {
                $where = $columnd[$i] . ' LIKE "%' . $searchCol . '%" ';
                break;
            }
        }

        if ($where != '') {
            $sql .= " WHERE " . $where;
        }
        // sorting
        $sql .= " ORDER BY {$columnd[$datatables['order'][0]['column']]} {$datatables['order'][0]['dir']}";
        // limit
        $start  = $datatables['start'];
        $length = $datatables['length'];
        $sql .= " LIMIT {$start}, {$length}";
        $list = $this->db->query($sql);

        $no = 1; // untuk no urut
        $option['draw']            = $datatables['draw'];
        $option['recordsTotal']    = $rowCount;
        $option['recordsFiltered'] = $rowCount;
        $option['data']            = array();
        foreach ($list->result() as $row) {
            $imgs = "<img src='".base_url()."assets/uploads/foto_user/".$row->foto_peserta."' class='img-circle img-responsive' alt='".$row->nama_peserta."' width='150'>";
            $option['data'][] = array(
                                    $row->id_acara,
                                    $imgs,
                                    $row->nama_peserta,
                                    $row->nohp_peserta,
                                    $row->email_peserta,
                                    $row->nama_acara,
                                    $row->tgl_acara,
                                    $row->jam_acara,
                                );
        }
        // eksekusi json
        echo json_encode($option);
    }

}

/* End of file Model_ajax.php */
/* Location: ./application/models/Model_ajax.php */