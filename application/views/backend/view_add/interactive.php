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
                                        <legend>Menambah Interaktif</legend>
                                        <div class="control-group">
                                            <label class="control-label" for="typeahead">Link</label>
                                            <div class="controls">
                                                <select size=2 id="select01" class="chzn-select" name="LINK">
                                                    <option>Pilih Halaman</option>
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
                                                <input class="input-xlarge focused" id="focusedInput" type="text" name="NAMA" value=""><!-- input -->
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="select01">Gambar</label>
                                            <div class="controls">
                                                <div class="input-append">
                                                    <input id="IMAGES" type="text" name="IMAGES" value="" />
                                                    <a href="#imageSelect" type="button" data-toggle="modal" class="btn" >Select</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="control-group img-div">
                                            <label class="control-label" for="typeahead"></label>
                                            <div class="controls">
                                                <img class="img_active" src="" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="typeahead">Status Online</label>
                                            <div class="controls">
                                                <select name="IS_ONLINE" id="IS_ONLINE"><!-- input -->
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br/><br/><br/><br/><br/>
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
                                                    <?php foreach($all_lang as $key=>$val): $key++?>
                                                        <li><a href="#tab<?= $key ?>" data-toggle="tab"><?= $val->LANG ?></a></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="bar" class="progress progress-striped active">
                                        <div class="bar"></div>
                                    </div>
                                    <div class="tab-content">
                                        <?php foreach($all_lang as $key=>$val): $key++?>
                                            <div class="tab-pane" id="tab<?= $key ?>">
                                                <div class="form-horizontal">
                                                    <fieldset>
                                                        <div class="control-group">
                                                            <label class="control-label" for="focusedInput">Title</label>
                                                            <div class="controls">
                                                                <input type="hidden" name="ID_LANG[]" value="<?= $val->ID_LANG ?>">
                                                                <input class="input-xlarge focused" id="focusedInput" type="text" name="TITLE[]" >
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label" for="focusedInput">Content</label>
                                                            <div class="controls">
                                                                <textarea style="width: 90%; height: 150px;" class="" name="DESCRIPTION[]" ></textarea>
                                                            </div>
                                                        </div
                                                    </fieldset>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
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
                    <div class="block-content collapse in">
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
    $(".img-div").hide();
    $(".thumbnail_select img").click(function(){
//        alert( $(this).attr("name") );
//        $("#imageSelect").attr('class', 'modal hide');
//        $("#imageSelect").attr('style', 'display: none;');
//        $("#imageSelect").attr('aria-hidden', 'true');
        $("#IMAGES").val($(this).attr("name"));
        $(".img_active").attr('src',"<?= base_url().'upload/_thumbs/Images/' ?>"+$(this).attr("name"));
        $(".modal-backdrop").hide();
        $(".modal").hide();
        $(".img-div").show();
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