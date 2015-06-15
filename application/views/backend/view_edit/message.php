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

                    <div class="block-content collapse in">
                        <div class="span12">
                            <div class="form-horizontal">
                                <fieldset>
                                    <legend>Merubah Halaman Depan</legend>
                                    <?php $ID_PARENT=""; $SUBJECT=""; ?>
                                    <?php foreach($get_parent as $key): ?>
                                        <div class="control-group">
                                            <label class="control-label" for="typeahead"><?= $key->USERNAME ?></label>
                                            <div class="controls">
                                                <?php $ID_PARENT=$key->ID_MESSAGE; $SUBJECT=$key->SUBJECT; ?>
                                                <?php //$text = str_replace('src="', 'src="'.base_url(), $key->TEXT_MESSAGE); ?>
                                                <?= $key->TEXT_MESSAGE ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                    <?php foreach($get_some as $key): ?>
                                        <div class="control-group">
                                            <label class="control-label" for="typeahead"><?= $key->USERNAME ?></label>
                                            <div class="controls">
                                                <?php $ID_PARENT=$key->ID_PARENT; $SUBJECT=$key->SUBJECT; ?>
                                                <?php //$text = str_replace('src="', 'src="'.base_url(), $key->TEXT_MESSAGE); ?>
                                                <?= $key->TEXT_MESSAGE ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <form method="post" name="add_form" id="add_form" action="<?= base_url().'backoffice/addData/' ?>">
                        <div class="block-content collapse in">
                            <div class="span12">
                                <div class="form-horizontal">
                                    <fieldset>
                                        <legend>Balas</legend>
                                        <div class="control-group">
                                            <label class="control-label" for="typeahead">Teks Pesan</label>
                                            <div class="controls">
                                                <input type="hidden" name="ID_PARENT" value="<?= $ID_PARENT ?>"><!-- input -->
                                                <input type="hidden" name="SUBJECT" value="<?= $SUBJECT ?>"><!-- input -->
                                                <textarea class="editor" name="TEXT_MESSAGE"></textarea>
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
    $(function() {
        $(".datepicker").datepicker();
        $(".uniform_on").uniform();
        $(".chzn-select").chosen();
        $('.textarea').wysihtml5();

        $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index+1;
            var $percent = ($current/$total) * 100;
            $('#rootwizard').find('.bar').css({width:$percent+'%'});
            // If it's the last tab then hide the last button and show the finish instead
            if($current >= $total) {
                $('#rootwizard').find('.pager .next').hide();
                $('#rootwizard').find('.pager .finish').show();
                $('#rootwizard').find('.pager .finish').removeClass('disabled');
            } else {
                $('#rootwizard').find('.pager .next').show();
                $('#rootwizard').find('.pager .finish').hide();
            }
        }});
        $('#rootwizard .finish').click(function() {
            //alert('Finished!, Starting over!');
//            $('#rootwizard').find("a[href*='tab1']").trigger('click');
        });
    });

</script>