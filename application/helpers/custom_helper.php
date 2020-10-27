<?php 
    function cetak($str){
        return strip_tags(htmlentities(str_replace(array(',','(',')'), array('&comma;','&lpar;','&rpar;'), $str), ENT_QUOTES, 'UTF-8'));
    }

    function cetak_meta($str,$mulai,$selesai){
        return strip_tags(html_entity_decode(substr(str_replace('"','',$str),$mulai,$selesai), ENT_COMPAT, 'UTF-8'));
    } 

    function getSearchTermToBold($text, $words){
        preg_match_all('~[A-Za-z0-9_äöüÄÖÜ]+~', $words, $m);
        if (!$m)
            return $text;
        $re = '~(' . implode('|', $m[0]) . ')~i';
        return preg_replace($re, '<b style="color:red">$0</b>', $text);
    }

    function tgl_indo($tgl){
            $tanggal = substr($tgl,8,2);
            $bulan = getBulan(substr($tgl,5,2));
            $tahun = substr($tgl,0,4);
            return $tanggal.' '.$bulan.' '.$tahun;       
    } 

    function menu_admin()
    {
        
        $ci = & get_instance();
        // $result = array();
        $induk = $ci->model_app->view_where_order('t_menu',array('id_parent'=>0,'position'=>'Side','aktif'=>'Ya','level_akses'=>'admin'),'urutan','ASC');
        $cek_menu = $induk->num_rows();
        if ($cek_menu > 0) {
            foreach ($induk->result() as $menu) {
                $sub_induk = $ci->model_app->view_where_order('t_menu',array('id_parent'=>$menu->id_menu,'position'=>'Side','aktif'=>'Ya','level_akses'=>'admin'),'urutan','ASC');
                $cek_submenu = $sub_induk->num_rows();
                if ($cek_submenu > 0 ) {
                    foreach ($sub_induk->result() as $submenu) {
                        $results[$menu->nama_menu][] = array(
                            'submenu'  => $submenu->nama_menu,
                            'sublink'  => $submenu->link,
                            'subicon'  => $submenu->icon       
                        );
                    }
                }else{
                    $results[$menu->nama_menu] = null;
                }
                
                $result[] = array(
                    'menu'  => $menu->nama_menu,
                    'link'  => $menu->link,
                    'icon'  => $menu->icon,
                    'submenu' => $results[$menu->nama_menu]        
                );
            }
        }else{
           $result = null; 
        }
        $r = json_encode($result);
        return $r;
    }

    function menu_user()
    {
        
        $ci = & get_instance();
        // $result = array();
        $induk = $ci->model_app->view_where_order('t_menu',array('id_parent'=>0,'position'=>'Side','aktif'=>'Ya','level_akses'=>'user'),'urutan','ASC');
        $cek_menu = $induk->num_rows();
        if ($cek_menu > 0) {
            foreach ($induk->result() as $menu) {
                $sub_induk = $ci->model_app->view_where_order('t_menu',array('id_parent'=>$menu->id_menu,'position'=>'Side','aktif'=>'Ya','level_akses'=>'user'),'urutan','ASC');
                $cek_submenu = $sub_induk->num_rows();
                if ($cek_submenu > 0 ) {
                    foreach ($sub_induk->result() as $submenu) {
                        $results[$menu->nama_menu][] = array(
                            'submenu'  => $submenu->nama_menu,
                            'sublink'  => $submenu->link,
                            'subicon'  => $submenu->icon       
                        );
                    }
                }else{
                    $results[$menu->nama_menu] = null;
                }
                
                $result[] = array(
                    'menu'  => $menu->nama_menu,
                    'link'  => $menu->link,
                    'icon'  => $menu->icon,
                    'submenu' => $results[$menu->nama_menu]        
                );
            }
        }else{
           $result = null; 
        }
        $r = json_encode($result);
        return $r;
    }

    function menu_manager_frontend($level)
    {
        $ci = & get_instance();
        $induk = $ci->model_app->view_where_order('t_front_menu',array('id_parent'=>0,'position'=>'Top','aktif'=>'Ya','level_akses'=>$level),'urutan','ASC');
        $cek_menu = $induk->num_rows();
        if ($cek_menu > 0) {
            foreach ($induk->result() as $menu) {
                $sub_induk = $ci->model_app->view_where_order('t_front_menu',array('id_parent'=>$menu->id_menu,'position'=>'Top','aktif'=>'Ya','level_akses'=>$level),'urutan','ASC');
                $cek_submenu = $sub_induk->num_rows();
                if ($cek_submenu > 0 ) {
                    foreach ($sub_induk->result() as $submenu) {
                        $results[$menu->nama_menu][] = array(
                            'submenu'  => $submenu->nama_menu,
                            'sublink'  => $submenu->link      
                        );
                    }
                }else{
                    $results[$menu->nama_menu] = null;
                }
                
                $result[] = array(
                    'menu'  => $menu->nama_menu,
                    'link'  => $menu->link,
                    'submenu' => $results[$menu->nama_menu]        
                );
            }
        }else{
           $result = null; 
        }
        $r = json_encode($result);
        return $r;
    }

    function menu_manager($level)
    {
        $ci = & get_instance();
        $induk = $ci->model_app->view_where_order('t_menu',array('id_parent'=>0,'position'=>'Side','aktif'=>'Ya','level_akses'=>$level),'urutan','ASC');
        $cek_menu = $induk->num_rows();
        if ($cek_menu > 0) {
            foreach ($induk->result() as $menu) {
                $sub_induk = $ci->model_app->view_where_order('t_menu',array('id_parent'=>$menu->id_menu,'position'=>'Side','aktif'=>'Ya','level_akses'=>$level),'urutan','ASC');
                $cek_submenu = $sub_induk->num_rows();
                if ($cek_submenu > 0 ) {
                    foreach ($sub_induk->result() as $submenu) {
                        $results[$menu->nama_menu][] = array(
                            'submenu'  => $submenu->nama_menu,
                            'sublink'  => $submenu->link,
                            'subicon'  => $submenu->icon      
                        );
                    }
                }else{
                    $results[$menu->nama_menu] = null;
                }
                
                $result[] = array(
                    'menu'  => $menu->nama_menu,
                    'link'  => $menu->link,
                    'icon'  => $menu->icon,
                    'submenu' => $results[$menu->nama_menu]        
                );
            }
        }else{
           $result = null; 
        }
        $r = json_encode($result);
        return $r;
    }

    function tgl_simpan($tgl){
            $tanggal = substr($tgl,0,2);
            $bulan = substr($tgl,3,2);
            $tahun = substr($tgl,6,4);
            return $tahun.'-'.$bulan.'-'.$tanggal;       
    }

    function noduduk($q)
    {
        $ci = & get_instance();
        $data = $ci->db->query("SELECT baris, kapasitas FROM t_duduk")->result();
        $datas = '';
        foreach ($data as $row) {
            $d = $row->kapasitas;
            for ($i=1; $i <= $d ; $i++) { 
                $datas .= "'".$row->baris.$i."',";
            }
        }
        $ar = substr($datas,0,-1);
        $cek = explode(',', $ar);
        $g = array_combine(range(1, count($cek)), $cek);
        return $g[$q];
    }
    
    function noduduks($q)
    {
        $ci = & get_instance();
        $data = $ci->db->query("SELECT id_duduk, baris, kapasitas FROM t_duduk")->result();
        $datas = '';
        foreach ($data as $row) {
            if ($row->id_duduk % 2 == 0){
                
                $d = $row->kapasitas;
                for ($i=$d; $i >=  1; $i--) { 
                    $datas .= "'".$row->baris.$i."',";
                }
            }else{
                $d = $row->kapasitas;
                for ($i=1; $i <= $d ; $i++) { 
                    $datas .= "'".$row->baris.$i."',";
                }
            }
        }
        $ar = substr($datas,0,-1);
        $cek = explode(',', $ar);
        $g = array_combine(range(1, count($cek)), $cek);
        return $g[$q];
    }

    function nodudukx($q,$kat)
    {
        $ci = & get_instance();
        $data = $ci->db->query("SELECT no_urut, kategori, baris, awal, kapasitas FROM t_duduk WHERE kategori = '".$kat."' AND aktif = 'Y' ")->result();
        $datas = '';
        foreach ($data as $row) {
            if ($row->no_urut % 2 == 0){
                $f = $row->awal;
                $d = $row->kapasitas;
                for ($i=$d; $i >=  $f; $i--) { 
                    $datas .= "'".$row->baris.$i."',";
                }
            }else{
                $f = $row->awal;
                $d = $row->kapasitas;
                for ($i=$f; $i <= $d ; $i++) { 
                    $datas .= "'".$row->baris.$i."',";
                }
            }
        }
        $ar = substr($datas,0,-1);
        $cek = explode(',', $ar);
        $g = array_combine(range(1, count($cek)), $cek);
        return $g[$q];
    }

    function tgl_view($tgl){
            $tanggal = substr($tgl,8,2);
            $bulan = substr($tgl,5,2);
            $tahun = substr($tgl,0,4);
            return $tanggal.'-'.$bulan.'-'.$tahun;       
    }

    function enskrip($str)
    {
        $ci = & get_instance();
        $ci->load->library('encryption');
        return str_replace(array('=','+','/'), array('-','_','~'), $ci->encryption->encrypt($str));
    }

    function deskrip($str)
    {
        $ci = & get_instance();
        $ci->load->library('encryption');
        return str_replace(array('-','_','~'), array('=','+','/'), $ci->encryption->decrypt($str));
    }

    function tgl_grafik($tgl){
            $tanggal = substr($tgl,8,2);
            $bulan = getBulan(substr($tgl,5,2));
            $tahun = substr($tgl,0,4);
            return $tanggal.'_'.$bulan;       
    }   

    function generateRandomString($length = 10) {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    } 

    function logAct($user,$act,$dt){
        $ci = & get_instance();
        $data = array(
                    'id_users' => $user,
                    'kegiatan' => $act,
                    'data' => $dt,
                    'tgl' => date('Y-m-d'),
                    'jam' => date('H:i:s'),
                    'ip' => $ci->input->ip_address(),
                    'browser' => $ci->agent->browser() 
                );
        $ci->model_app->insert('t_histori',$data);
        return true;
    }

    function seo_title($s) {
        $c = array (' ');
        $d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+','–');
        $s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d
        $s = strtolower(str_replace($c, '-', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
        return $s;
    }

    function hari_ini($w){
        $seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
        $hari_ini = $seminggu[$w];
        return $hari_ini;
    }

    function token($key)
    {
        $keys = 'VitechAsiaAlwaysNumberOne';
        if ($key!=$keys) {
           redirect('api/response/400'); 
        }
    }

    function getBulan($bln){
                switch ($bln){
                    case 1: 
                        return "Jan";
                        break;
                    case 2:
                        return "Feb";
                        break;
                    case 3:
                        return "Mar";
                        break;
                    case 4:
                        return "Apr";
                        break;
                    case 5:
                        return "Mei";
                        break;
                    case 6:
                        return "Jun";
                        break;
                    case 7:
                        return "Jul";
                        break;
                    case 8:
                        return "Agu";
                        break;
                    case 9:
                        return "Sep";
                        break;
                    case 10:
                        return "Okt";
                        break;
                    case 11:
                        return "Nov";
                        break;
                    case 12:
                        return "Des";
                        break;
                }
            } 

function cek_terakhir($datetime, $full = false) {
	 $today = time();    
     $createdday= strtotime($datetime); 
     $datediff = abs($today - $createdday);  
     $difftext="";  
     $years = floor($datediff / (365*60*60*24));  
     $months = floor(($datediff - $years * 365*60*60*24) / (30*60*60*24));  
     $days = floor(($datediff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));  
     $hours= floor($datediff/3600);  
     $minutes= floor($datediff/60);  
     $seconds= floor($datediff);  
     //year checker  
     if($difftext=="")  
     {  
       if($years>1)  
        $difftext=$years." Tahun";  
       elseif($years==1)  
        $difftext=$years." Tahun";  
     }  
     //month checker  
     if($difftext=="")  
     {  
        if($months>1)  
        $difftext=$months." Bulan";  
        elseif($months==1)  
        $difftext=$months." Bulan";  
     }  
     //month checker  
     if($difftext=="")  
     {  
        if($days>1)  
        $difftext=$days." Hari";  
        elseif($days==1)  
        $difftext=$days." Hari";  
     }  
     //hour checker  
     if($difftext=="")  
     {  
        if($hours>1)  
        $difftext=$hours." Jam";  
        elseif($hours==1)  
        $difftext=$hours." Jam";  
     }  
     //minutes checker  
     if($difftext=="")  
     {  
        if($minutes>1)  
        $difftext=$minutes." Menit";  
        elseif($minutes==1)  
        $difftext=$minutes." Menit";  
     }  
     //seconds checker  
     if($difftext=="")  
     {  
        if($seconds>1)  
        $difftext=$seconds." Detik";  
        elseif($seconds==1)  
        $difftext=$seconds." Detik";  
     }  
     return $difftext;  
	}