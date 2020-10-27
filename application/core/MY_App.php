<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_App extends MY_Controller
{
    public function __construct(){
        parent::__construct();

        $this->set_language();
    }

    public function set_language(){
    $set_language = $this->session->userdata('language');
    if ($set_language) {
        $this->lang->load('rest_controller_lang',$set_language);
    } else {
        $this->lang->load('rest_controller_lang','indonesia');
    }
}

}
