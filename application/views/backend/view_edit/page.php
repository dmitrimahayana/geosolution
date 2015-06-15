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

                    <form method="post" name="add_form" id="add_form" action="<?= base_url().'backoffice/editData/' ?>">
                        <div class="block-content collapse in">
                            <div class="span12">
                                <div class="form-horizontal">
                                    <fieldset>
                                        <legend>Merubah Halaman Depan</legend>
                                        <?php foreach($get_some as $key): ?>
                                        <div class="control-group">
                                            <label class="control-label" for="typeahead">Nama Page</label>
                                            <div class="controls">
                                                <input type="hidden" name="ID_PAGE" value="<?= $key->ID_PAGE ?>">
                                                <input class="input-xlarge focused" id="focusedInput" type="text" name="NAME_PAGE" value="<?= $key->NAME_PAGE ?>">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="online_page">Status Online</label>
                                            <div class="controls">
                                                <select name="ONLINE_PAGE" id="online_page">
                                                    <option selected="selected" value=<?= $key->ONLINE_PAGE ?>><?= ($key->ONLINE_PAGE=="1")?"Yes":"No" ?></option>
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="typeahead">Metadata</label>
                                            <div class="controls">
                                                <input class="input-xlarge focused" id="focusedInput" type="text" name="METADATA" value="<?= $key->METADATA ?>">
                                                <p class="help-block">dipisah oleh koma</p>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <div id="rootwizard">
                                    <div class="navbar">
                                        <div class="navbar-inner">
                                            <div class="container">
                                                <ul>
                                                    <?php $temp=0;
                                                    foreach($get_some_lang as $key=>$val): $key++; $temp=$key;?>
                                                        <li><a href="#tab<?= $key ?>" data-toggle="tab"><?= $val->LANG ?></a></li>
                                                    <?php endforeach; ?>
                                                    <?php if($new_lang_count>0): ?>
                                                        <?php foreach($new_lang as $val): $temp++?>
                                                            <li><a href="#tab<?= $temp ?>" data-toggle="tab"><?= $val->LANG ?></a></li>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="bar" class="progress progress-striped active">
                                        <div class="bar"></div>
                                    </div>
                                    <div class="tab-content">
                                        <?php $temp=0;
                                        foreach($get_some_lang as $key=>$val): $key++; $temp=$key;?>
                                            <div class="tab-pane" id="tab<?= $key ?>">
                                                <div class="form-horizontal">
                                                    <fieldset>
                                                        <div class="control-group">
                                                            <label class="control-label" for="focusedInput">Title</label>
                                                            <div class="controls">
                                                                <input type="hidden" name="ID_PAGE_LANG[]" value="<?= $val->ID_PAGE_LANG ?>">
                                                                <input class="input-xlarge focused" id="focusedInput" type="text" name="TITLE_[]" value="<?= $val->TITLE_ ?>">
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label" for="focusedInput">Content</label>
                                                            <div class="controls">
<!--                                                                --><?php //$text = str_replace('src="', 'src="'.base_url(), $val->CONTENT); ?>
                                                                <textarea class="editor" name="CONTENT<?= $key ?>" rows="10" cols="80">
                                                                    <?= $val->CONTENT ?>
                                                                </textarea>

                                                            </div>
                                                        </div
                                                    </fieldset>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                        <?php if($new_lang_count>0):
                                            foreach($new_lang as $val): $temp++;?>
                                                <div class="tab-pane" id="tab<?= $temp ?>">
                                                    <div class="form-horizontal">
                                                        <fieldset>
                                                            <div class="control-group">
                                                                <label class="control-label" for="focusedInput">Title</label>
                                                                <div class="controls">
                                                                    <input type="hidden" name="ID_LANG<?= $temp ?>" value="<?= $val->ID_LANG ?>">
                                                                    <input class="input-xlarge focused" id="focusedInput" type="text" name="TITLE_NEW<?= $temp ?>" value="Insert Title">
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label" for="focusedInput">Content</label>
                                                                <div class="controls">
                                                                    <textarea class="editor" name="CONTENT_NEW<?= $temp ?>"></textarea>
                                                                </div>
                                                            </div
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                            <input type="hidden" name="count_new_lang" value="<?= $new_lang_count ?>">
                                        <?php endif; ?>
                                        <input type="hidden" name="count_lang" value="<?= $key ?>">
                                        <input type="hidden" name="name_page" value="<?= $this->uri->segment(2); ?>">
                                        <ul class="pager wizard">
                                            <li class="previous first" style="display:none;"><a href="javascript:void(0);">First</a></li>
                                            <li class="previous"><a href="javascript:void(0);">Previous</a></li>
                                            <li class="next last" style="display:none;"><a href="javascript:void(0);">Last</a></li>
                                            <li class="next"><a href="javascript:void(0);">Next</a></li>
                                            <li class="next finish" style="display:none;">
<!--                                                <a href="#" id="finish" onclick="//document.getElementById('add_form').submit();">Finish</a>-->
                                                <input style="float: right;" class="btn btn-primary" type="submit" name="submit" value="Finish" />
                                            </li>
                                        </ul>
                                    </div>
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