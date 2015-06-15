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
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-hover" id="example">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Subjek</th>
                                    <th>Teks Pesan</th>
                                    <th>Pengirim</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($get_all as $key=>$val): ?>
                                    <?php if($val->IS_READ){ ?>
                                    <tr class="">
                                        <td><?= $key+=1 ?></td>
                                        <td><?= date('Y-m-d H:i:s', $val->TIME_MESSAGE) ?></td>
                                        <td><?= $val->SUBJECT ?></td>
                                        <td>
                                            <?= $val->TEXT_MESSAGE;//substr_replace($text, '...', 10); ?>
                                        </td>
                                        <td><?= $val->USERNAME ?></td>
                                        <?php
                                        $id_="";
                                        if($val->ID_PARENT==0)
                                            $id_=$val->ID_MESSAGE;
                                        else
                                            $id_=$val->ID_PARENT; ?>
                                        <td>
                                            <button class="btn btn-primary" onclick="window.location='<?= base_url().'backoffice/'.$this->uri->segment(2).'/edit/'.$id_ ?>';">
                                                <i class="icon-pencil icon-white"></i>
                                                Baca
                                            </button>
                                            <a href="#deletePopUp" onclick="javascript:setNameDelete('<?= $val->SUBJECT ?>','<?= $id_ ?>')" data-toggle="modal" class="btn btn-danger"><i class="icon-remove icon-white"></i>Delete</a>
                                        </td>
                                    </tr>
                                <?php } else { ?>
                                    <tr class="info">
                                        <td><?= $key+=1 ?></td>
                                        <td><?= date('Y-m-d H:i:s', $val->TIME_MESSAGE) ?></td>
                                        <td><?= $val->SUBJECT ?></td>
                                        <td>
                                            <?= $val->TEXT_MESSAGE;//substr_replace($val->TEXT_MESSAGE, '...', 10, -1); ?>
                                        </td>
                                        <td><?= $val->USERNAME ?></td>
                                        <?php
                                        $id_="";
                                            if($val->ID_PARENT==0)
                                                $id_=$val->ID_MESSAGE;
                                            else
                                                $id_=$val->ID_PARENT; ?>
                                        <td>
                                            <button class="btn btn-primary" onclick="window.location='<?= base_url().'backoffice/'.$this->uri->segment(2).'/edit/'.$id_ ?>';">
                                                <i class="icon-pencil icon-white"></i>
                                                Baca
                                            </button>
                                            <a href="#deletePopUp" onclick="javascript:setNameDelete('<?= $val->SUBJECT ?>','<?= $id_ ?>')" data-toggle="modal" class="btn btn-danger"><i class="icon-remove icon-white"></i>Delete</a>
                                        </td>
                                    </tr>
                                <?php }  ?>
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
