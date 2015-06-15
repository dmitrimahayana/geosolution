<?php
$this->load->view("backend/template/header");
$this->load->view("backend/menu");
?>
<script src="<?= base_url() ?>bootstrap/vendors/jquery-1.9.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>bootstrap/vendors/fancybox/source/jquery.fancybox.css" media="screen" />
<script type="text/javascript" src="<?= base_url() ?>bootstrap/vendors/fancybox/source/jquery.fancybox.pack.js"></script>
<script>
    $('.iframe-btn').fancybox({
        'width'		: 900,
        'height'	: 600,
        'type'		: 'iframe',
        'autoScale'    	: false
    });
</script>

<div class="container-fluid">
    <div class="row-fluid">

        <?php $this->load->view("backend/left_panel"); ?>

        <!--/span-->
        <div class="span9" id="content">
            <div class="row-fluid">
                <!-- block -->
                <div class="block">
                    <div class="navbar">
                        <div class="navbar-inner">
                            <ul class="breadcrumb">
                                <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
                                <i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
                                <li>
                                    <a href="#"><?= ucwords(strtolower($this->uri->segment(2))) ?></a> <span class="divider">/</span>
                                </li>
                                <li class="active"><?= ucwords(strtolower($this->uri->segment(3))) ?></li>
                            </ul>
                        </div>
                    </div>

                    <div class="block-content collapse in">
                        <div class="span12">
                            <div class="form-horizontal" style="overflow-y:scroll;">
                                <fieldset>
                                    <legend>Kelola File</legend>
                                    <div class="block-content collapse in">
                                        <div class="span12">
                                            <button class="btn iframe-btn btn-success" href="<?= base_url() ?>filemanager/dialog.php?type=0">Tambah Baru</button><hr/>
                                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                                <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama File</th>
                                                    <th>Gambar</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $key=0;
                                                foreach($get_all as $file): ?>
                                                    <tr class="">
                                                        <?php $key++; ?>
                                                        <td><?= $key ?></td>
                                                        <td><?= $file ?></td>
                                                        <td>
                                                            <img name="<?= $file ?>"  src="<?= base_url().'upload/_thumbs/Images/'.$file ?>">
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /block -->
            </div>
        </div>

    </div>
    <hr>
</div>

<script>
    function setNameDelete(val1, val2){
        $( "#name_delete_item" ).text( val1 );
        $("#confirm_delete").attr({
            "onclick" : "window.location='<?= base_url().'backoffice/'.$this->uri->segment(2).'/delete/' ?>"+val2+"';"
        });
    }
</script>
<?php $this->load->view("backend/template/footer"); ?>
