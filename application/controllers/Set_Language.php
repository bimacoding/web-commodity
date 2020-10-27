<?php  
defined('BASEPATH') OR exit('no direct script access allowed');

class Set_Language extends MY_App
{
 
    function switch($language = "indonesia") {
        
        $this->session->set_userdata('language', $language);
        
        redirect($_SERVER['HTTP_REFERER']);
        
    }
}