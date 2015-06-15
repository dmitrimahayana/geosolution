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

                    <form method="post" name="add_form" id="add_form" action="<?= base_url().'backoffice/addData/' ?>"><!-- form add -->
                        <div class="block-content collapse in">
                            <div class="span12">
                                <div class="form-horizontal">
                                    <fieldset>
                                        <legend>Menambah Data Pengguna</legend>
                                        <div class="control-group">
                                            <label class="control-label" for="typeahead">Nama Pengguna</label>
                                            <div class="controls">
                                                <input class="input-xlarge focused" id="focusedInput" type="text" name="USERNAME" value=""><!-- input -->
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="typeahead">Password</label>
                                            <div class="controls">
                                                <input class="input-xlarge focused" id="focusedInput" type="password" name="PASSWORD" value=""><!-- input -->
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="typeahead">Grup Pengguna</label>
                                            <div class="controls">
                                                <select name="ID_GROUP" id="ID_GROUP"><!-- input -->
                                                    <?php foreach($get_all_group as $key2): ?>
                                                        <option value="<?= $key2->ID_GROUP ?>"><?= $key2->GROUP_NAME ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="typeahead">Email</label>
                                            <div class="controls">
                                                <input class="input-xlarge focused" id="focusedInput" type="text" name="EMAIL" value=""><!-- input -->
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="typeahead">Status Aktif</label>
                                            <div class="controls">
                                                <select name="ACTIVE" id="ACTIVE"><!-- input -->
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
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