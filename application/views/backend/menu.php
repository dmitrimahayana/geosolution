<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="#">Admin Geosolution</a>
            <div class="nav-collapse collapse">
                <ul class="nav pull-right">
                    <li class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> <?= $this->session->userdata('USERNAME'); ?> <i class="caret"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a tabindex="-1" href="<?= base_url().'backoffice/profile/edit/'.$this->session->userdata('ID_USER'); ?>">Profile</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a tabindex="-1" href="<?= base_url().'member/log_out' ?>">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav">
                    <li <?php if ($this->uri->segment(1) == "backoffice" and  $this->uri->segment(2) == "index"): ?>class="active"<?php endif; ?>>
                        <a href="<?= base_url().'backoffice/index' ?>">Dashboard</a>
                    </li>
                    <?php foreach($menu as $key): ?>
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle"><?= $key->DISPLAY_NAME ?> <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu" id="">
                                <?php $subMenu2=$this->backend_page_model->sub_menu($this->session->userdata('ID_GROUP'), $key->ID_BACKEND_PAGE);
                                foreach($subMenu2 as $key2):?>
                                    <li>
                                        <a href="<?= base_url().'backoffice/'.$key2->LINK_BACKEND ?>"><?= $key2->DISPLAY_NAME ?></a>
                                    </li>
                                    <!--                                    <li class="divider"></li>-->
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>