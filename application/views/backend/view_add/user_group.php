<?php
$this->load->view("backend/template/header");
$this->load->view("backend/menu");
?>

<div class="container-fluid">
    <div class="row-fluid">

        <?php $this->load->view("backend/left_panel"); ?>

        <!--/span-->
        <div class="span9" id="content">
            <!-- morris stacked chart -->
            <!-- wizard -->
            <div class="row-fluid section">
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
                                    <a href="<?= base_url().'backoffice/'.$this->uri->segment(2).'/manage'; ?>"><?= ucwords(strtolower($this->uri->segment(2))).' Manage' ?></a> <span class="divider">/</span>
                                </li>
                                <li class="active"><?= ucwords(strtolower($this->uri->segment(3))) ?></li>
                            </ul>
                        </div>
                    </div>

                    <form method="post" name="add_form" id="add_form" action="<?= base_url().'backoffice/addData/' ?>"><!-- form edit -->
                        <div class="block-content collapse in">
                            <div class="span12">
                                <div class="form-horizontal">
                                    <fieldset>
                                        <legend>Menambah Data dan Hak Akses Grup Pengguna</legend>
                                            <div class="control-group">
                                                <label class="control-label" for="typeahead">Nama Grup</label>
                                                <div class="controls">
                                                    <input class="input-xlarge focused" id="focusedInput" type="text" name="GROUP_NAME" value=""><!-- input -->
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="typeahead">Level</label>
                                                <div class="controls">
                                                    <input class="input-xlarge focused" id="focusedInput" type="text" name="LEVEL" value=""><!-- input -->
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="typeahead">Deskripsi</label>
                                                <div class="controls">
                                                    <textarea class="editor" name="DESCRIPTION"></textarea><!-- input -->
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="typeahead"></label>
                                                <div class="controls">
                                                    <input type="hidden" name="name_page" value="<?= $this->uri->segment(2); ?>">
                                                    <input type="submit" class="btn btn-primary" value="Simpan" />
                                                </div>
                                            </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /block -->
            </div>
        </div>
    </div>
    <hr>
</div>

<?php $this->load->view("backend/template/footer"); ?>
<script>

</script>