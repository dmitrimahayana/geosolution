<?php
$this->load->view("backend/template/header");
$this->load->view("backend/menu");
?>

<div class="container-fluid">
    <div class="row-fluid">

        <?php $this->load->view("backend/left_panel"); ?>

        <!--/span-->
        <div class="span9" id="content">
        <div class="row-fluid">
        <!-- block -->
        <div class="block">

            <?php if($this->session->flashdata('success')): ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4>Success</h4>
                    <?= $this->session->flashdata('success'); ?>
                </div>
            <?php endif ?>
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
                <button class="btn btn-success" onclick="window.location='<?= base_url().'backoffice/'.$this->uri->segment(2).'/add' ?>';">Tambah Baru</button><hr/>
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Menu</th>
                            <th>Kategori</th>
                            <th>Parent Menu</th>
                            <th>Link</th>
                            <th>Urutan ke</th>
                            <th>Metadata</th>
                            <th>Status Online</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($get_all as $key=>$val): ?>
                        <tr class="">
                            <?php $key++; ?>
                            <td><?= $key ?></td>
                            <td><?= $val->NAME_MENU ?></td>
                            <td><?= $val->NAME_CATEGORY ?></td>
                            <td><?= $val->parent_menu ?></td>
                            <td><?= $val->LINK_MENU ?></td>
                            <td><?= $val->ORDERING_MENU ?></td>
                            <td> <?= $val->METADATA ?></td>
                            <td class="center">
                                <?php if($val->ONLINE_MENU){ ?>
                                    <span class="label label-success">
                                    <i class="icon-ok icon-white"></i>
                                    </span>
                                <?php } else {?>
                                    <span class="label label-important">
                                    <i class="icon-remove icon-white"></i>
                                    </span>
                                <?php } ?>
                            </td>
                            <td>
                                <button class="btn btn-primary" onclick="window.location='<?= base_url().'backoffice/'.$this->uri->segment(2).'/edit/'.$val->ID_MENU ?>';">
                                    <i class="icon-pencil icon-white"></i>
                                    Edit
                                </button>
                                <a href="#deletePopUp" onclick="javascript:setNameDelete('<?= $val->NAME_MENU ?>','<?= $val->ID_MENU ?>')" data-toggle="modal" class="btn btn-danger"><i class="icon-remove icon-white"></i>Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div id="deletePopUp" class="modal hide">
                <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button">&times;</button>
                    <h3>Hapus item <a id=name_delete_item></a></h3>
                </div>
                <div class="modal-body">
                    <p>Apa anda yakin ingin menghapus item ini?</p>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" id="confirm_delete" class="btn btn-primary" onclick="">Confirm</button>
                    <a data-dismiss="modal" class="btn" href="#">Cancel</a>
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
