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

                    <form method="post" name="add_form" id="add_form" action="<?= base_url().'backoffice/editData/' ?>"><!-- form edit -->
                        <div class="block-content collapse in">
                            <div class="span12">
                                <div class="form-horizontal">
                                    <fieldset>
                                        <legend>Merubah Interaktif</legend>
                                        <?php foreach($get_some as $key): ?>
                                            <div class="control-group">
                                                <label class="control-label" for="typeahead">Link</label>
                                                <div class="controls">
                                                    <select id="select01" class="chzn-select" name="LINK">
                                                        <?php $query_page=$this->interactive_model->get_page_by_id($key->LINK);
                                                        foreach($query_page as $val2){ ?>
                                                            <option selected="selected" value=<?= $val2->ID_PAGE ?>><?= $val2->NAME_PAGE ?></option>
                                                        <?php } ?>
                                                        <?php foreach($get_for_images as $page): ?>
                                                            <option value="<?= $page->ID_PAGE ?>"><?= $page->NAME_PAGE ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                    <p class="help-block">
                                                        link harus sama dengan nama halaman yang tersedia
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="typeahead">Nama Interaktif</label>
                                                <div class="controls">
                                                    <input type="hidden" name="ID_INTERACTIVE" value="<?= $key->ID_INTERACTIVE ?>">
                                                    <input class="input-xlarge focused" id="focusedInput" type="text" name="NAMA" value="<?= $key->NAMA ?>"><!-- input -->
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="typeahead">Gambar</label>
                                                <div class="controls">
                                                    <div class="input-append">
                                                        <input id="IMAGES" type="text" name="IMAGES" value="<?= $key->IMAGES ?>" />
                                                        <a href="#imageSelect" type="button" data-toggle="modal" class="btn" >Select</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="typeahead"></label>
                                                <div class="controls">
                                                    <img class="img_active" src="<?= base_url().'upload/_thumbs/Images/'.$key->IMAGES ?>" />
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="typeahead">Status Online</label>
                                                <div class="controls">
                                                    <select name="IS_ONLINE" id="IS_ONLINE"><!-- input -->
                                                        <option selected="selected" value=<?= $key->IS_ONLINE ?>><?= ($key->IS_ONLINE=="1")?"Yes":"No" ?></option>
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
                                                    </select>
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
                                                                <input type="hidden" name="ID_INTERACTIVE_LANG[]" value="<?= $val->ID_INTERACTIVE_LANG ?>">
                                                                <input class="input-xlarge focused" id="focusedInput" type="text" name="TITLE[]" value="<?= $val->TITLE ?>">
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label" for="focusedInput">Content</label>
                                                            <div class="controls">
                                                                <textarea style="width: 90%; height: 150px;" class="" name="DESCRIPTION[]" ><?= $val->DESCRIPTION ?></textarea>
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
                                                                    <textarea class="editor" name="DESCRIPTION_NEW<?= $temp ?>"></textarea>
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
                                                <!--                                            <a href="#" onclick="document.getElementById('add_form').submit();">Finish</a>-->
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

            <div id="imageSelect" class="modal hide">
                <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button">&times;</button>
                    <h3>Pilihan Gambar Interaktif <a id=name_delete_item></a></h3>
                </div>
                <div class="modal-body">
                    <div class="block-content collapse in" >
                        <div class="row-fluid padd-bottom">
                            <?php $count=0;
                            foreach($get_all_images as $file): $count+=1;?>
                            <?php if($count<5){ ?>
                                <div class="span3">
                                    <a href="#" class="thumbnail_select">
                                        <img width="150" name="<?= $file ?>" height="80" src="<?= base_url().'upload/images/'.$file ?>">
                                    </a>
                                </div>
                            <?php } else { $count=1 ?>
                        </div><div class="row-fluid padd-bottom">
                            <div class="span3">
                                <a href="#" class="thumbnail_select">
                                    <img width="150" name="<?= $file ?>" height="80" src="<?= base_url().'upload/images/'.$file ?>">
                                </a>
                            </div>
                            <?php } ?>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a data-dismiss="modal" class="btn" href="#">Close</a>
                </div>
            </div>

        </div>
    </div>
    <hr>
</div>

<?php $this->load->view("backend/template/footer"); ?>
<script type="text/javascript">
    $(".thumbnail_select img").click(function(){
        $("#IMAGES").val($(this).attr("name"));
        $(".img_active").attr('src',"<?= base_url().'upload/_thumbs/Images/' ?>"+$(this).attr("name"));
        $(".modal-backdrop").hide();
        $(".modal").hide();
    });
    $(function() {
        $(".datepicker").datepicker();
        $(".uniform_on").uniform();
        $(".chzn-select").chosen();

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