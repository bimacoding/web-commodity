<div class="sidebar-nav navbar-collapse slimscrollsidebar">
    <div class="user-profile">
        <div class="dropdown user-pro-body">
            <div><img src="<?=base_url().'assets/uploads/users/'.$this->session->userdata('foto');?>" alt="user-img" class="img-circle"></div> <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $this->session->userdata('nama'); ?> <span class="caret"></span></a>
            <ul class="dropdown-menu animated flipInY">
                <li><a href="<?=base_url().'siteman/logout'?>"><i class="fa fa-power-off"></i> Logout</a></li>
                <li><a href="<?=base_url('set_language/switch/english')?>"><i class="fa fa-power-off"></i> English</a></li>
                <li><a href="<?=base_url('set_language/switch/indonesia')?>"><i class="fa fa-power-off"></i> Indonesia</a></li>
            </ul>
        </div>
    </div>
    <ul class="nav" id="side-menu">
        <li class="nav-small-cap m-t-10">--- Main Menu</li>
        <?php  
            $session = $this->session->userdata('level');
            // echo $session;
            $cek = menu_manager($session);
            // echo $cek;
            if ($cek !== 'null') {

                $menus = json_decode($cek);
                $html = '';
                foreach ($menus as $key) {
                    if ($key->submenu==null) {
                        $html .="<li> 
                                    <a href='".base_url().$key->link."' class='waves-effect'>
                                        <i class='linea-icon linea-basic fa-fw' data-icon='".$key->icon."'></i> 
                                        <span class='hide-menu'>" .$key->menu. "</span>
                                    </a>
                                </li>";
                    }else{
                        
                           $html .="<li> <a href='javascript:void(0);' class='waves-effect'><i class='linea-icon linea-basic fa-fw' data-icon='7'></i> <span class='hide-menu'>" .$key->menu. "<span class='fa arrow'></span> </span></a>
                                    <ul class='nav nav-second-level'>";
                                    foreach ($key->submenu as $key2) {
                                       $html .=" <li> <a href='".base_url().$key2->sublink."'>" .$key2->submenu. "</a> </li>";
                                    }
                                    $html .="</ul>
                                 </li>";
                        
                        
                    }
                    
                }
                echo $html;

            }else{

                $html = '';
                echo $html;

            }
        ?>
    </ul>
</div>
