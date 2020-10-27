<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller 
{
    public function __construct(){
        parent::__construct();


        require_once 'constants/app.php';
        require_once 'constants/database.php';
        require_once 'constants/filemanager.php';        
        require_once 'constants/input.php';                
        require_once 'constants/text.php';                 
        require_once 'constants/think.php';         
    }
}


/**
 * include main class
 */

require_once 'MY_App.php';
require_once 'MY_Site.php';
