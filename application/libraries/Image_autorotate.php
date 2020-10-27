<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
* @file application/libraries/Image_autorotate.php
*/
class Image_autorotate
{
	function __construct($params = NULL) {
        
		if (!is_array($params) || empty($params)) return FALSE;
		
		$filepath = $params['filepath'];
		$target_path ='assets/uploads/thumbnail/';
		$exif = @exif_read_data($filepath);
		
		if (empty($exif['Orientation'])) return FALSE;
		
		$CI =& get_instance();
		$CI->load->library('image_lib');
		
// 		$config['image_library'] = 'gd2';
// 		$config['source_image']	= $filepath;
// 		$config = array(
//           'image_library' => 'gd2',
//           'source_image' => $filepath,
//           'new_image' => $target_path,
//           'maintain_ratio' => TRUE,
//           'create_thumb' => TRUE,
//           'thumb_marker' => '_thumb',
//           'width' => 150,
//           'height' => 150
//         );
        
        $config['image_library'] = 'gd2';
        $config['source_image']  = $filepath;
        
		
		$oris = array();
		
		switch($exif['Orientation'])
		{
		        case 1: // no need to perform any changes
		        break;
		
		        case 2: // horizontal flip
				$oris[] = 'hor';
		        break;
		                                
		        case 3: // 180 rotate left
		        	$oris[] = '180';
		        break;
		                    
		        case 4: // vertical flip
		        	$oris[] = 'ver';
		        break;
		                
		        case 5: // vertical flip + 90 rotate right
		        	$oris[] = 'ver';
				$oris[] = '270';
		        break;
		                
		        case 6: // 90 rotate right
		        	$oris[] = '270';
		        break;
		                
		        case 7: // horizontal flip + 90 rotate right
		        	$oris[] = 'hor';
				$oris[] = '270';
		        break;
		                
		        case 8: // 90 rotate left
		        	$oris[] = '90';
		        break;
				
			default: break;
		}
		
		foreach ($oris as $ori) {
			$config['rotation_angle'] = $ori;
			$CI->image_lib->initialize($config); 
			$CI->image_lib->rotate();
		}
		$CI->image_lib->clear();
	}
}

// END class Image_autorotate

/* End of file Image_autorotate.php */
/* Location: ./application/libraries/Image_autorotate.php */