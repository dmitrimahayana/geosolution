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
                                        <legend>Merubah Data dan Hak Akses Grup Pengguna</legend>
                                        <?php foreach($get_some as $key): ?>
                                            <div class="control-group">
                                                <label class="control-label" for="typeahead">Nama Grup</label>
                                                <div class="controls">
                                                    <input type="hidden" name="ID_GROUP" value="<?= $key->ID_GROUP ?>"><!-- input -->
                                                    <input class="input-xlarge focused" id="focusedInput" type="text" name="GROUP_NAME" value="<?= $key->GROUP_NAME ?>"><!-- input -->
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="typeahead">Level</label>
                                                <div class="controls">
                                                    <input class="input-xlarge focused" id="focusedInput" type="text" name="LEVEL" value="<?= $key->LEVEL ?>"><!-- input -->
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="typeahead">Hak Akses</label>
                                                <div class="controls">
                                                    <div class="row-fluid">
                                                        <div class="span4">
                                                            <!-- block -->
                                                            <div class="block">
                                                                <div class="navbar navbar-inner block-header">
                                                                    <div class="muted pull-left">Pilihan Pada Sistem</div>
                                                                </div>
                                                                <div class="block-content collapse in">
                                                                    <center>
                                                                        <select id="get_access_page_remain" multiple="multiple" size="10" onchange="optionCheck1()"><!-- input -->
                                                                            <?php foreach($get_access_page_remain as $key2): ?>
                                                                            <option id="<?= $key2->ID_BACKEND_PAGE ?>" value="<?= $key2->ID_BACKEND_PAGE ?>"><?= $key2->NAME_BACKEND ?></option>
                                                                            <?php endforeach ?>
                                                                        </select>
                                                                    </center>
                                                                </div>
                                                                <p>
                                                                    <center>
                                                                        <input disabled="disabled" id="opt1" type="button" class="btn btn-inverse" onclick="update_privilege('update','1','<?= $key->ID_GROUP ?>')" value="Tambah" />
                                                                        <input type="button" class="btn btn-inverse" onclick="update_privilege('update','2','<?= $key->ID_GROUP ?>')" value="Tambah Semua" />
                                                                    </center>
                                                                </p>
                                                            </div>
                                                            <!-- /block -->
                                                        </div>
                                                        <div class="span4">
                                                            <!-- block -->
                                                            <div class="block">
                                                                <div class="navbar navbar-inner block-header">
                                                                    <div class="muted pull-left">Pilihan Pada <?= $this->session->userdata("USERNAME"); ?></div>
                                                                </div>
                                                                <div class="block-content collapse in">
                                                                    <center>
                                                                        <select name="ID_BACKEND_PAGE" id="get_access_page" multiple="multiple" size="10" onchange="optionCheck2()"><!-- input -->
                                                                            <?php foreach($get_access_page as $key2): ?>
                                                                                <option id="<?= $key2->ID_BACKEND_PAGE ?>" value="<?= $key2->ID_BACKEND_PAGE ?>"><?= $key2->NAME_BACKEND ?></option>
                                                                            <?php endforeach?>
                                                                        </select>
                                                                    </center>
                                                                </div>
                                                                <p>
                                                                    <center>
                                                                        <input disabled="disabled" id="opt2" type="button" class="btn btn-danger" onclick="update_privilege('delete','1','<?= $key->ID_GROUP ?>')" value="Hapus" />
                                                                        <input type="button" class="btn btn-danger" onclick="update_privilege('delete','2','<?= $key->ID_GROUP ?>')" value="Hapus Semua" />
                                                                    </center>
                                                                </p>
                                                            </div>
                                                            <!-- /block -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="typeahead">Deskripsi</label>
                                                <div class="controls">
                                                    <?php //$text = str_replace('src="', 'src="'.base_url(), $key->DESCRIPTION); ?>
                                                    <textarea class="editor" name="DESCRIPTION"><?= $key->DESCRIPTION ?></textarea><!-- input -->
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="typeahead"></label>
                                                <div class="controls">
                                                    <input type="hidden" name="name_page" value="<?= $this->uri->segment(2); ?>">
                                                    <input type="submit" class="btn btn-primary" value="Simpan" />
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
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
    function optionCheck1(){
        $('#opt1').removeAttr('disabled');
    }

    function optionCheck2(){
        $('#opt2').removeAttr('disabled');
    }

    function update_privilege(action, type, id_group){
        if(action=="update"){
            if(type==2){
                $('#get_access_page_remain option').each(function () {
                    $(this).attr('selected', true);
                });
            }
            $.ajax({
                type: "POST",
                url: "<?= base_url() ?>backoffice/check_privilege",
                data: { action: action, type: type, value: $( "#get_access_page_remain" ).val(), id_group :id_group },
                dataType: "json",
                success: function(data){
//                    alert("success "+data.action+" "+data.type);
                    var str= $( "#get_access_page_remain" ).val() || [];
                    if(type==1){
                        for(var i=0;i<str.length;i++){
                            var text=$("#get_access_page_remain option[value='"+str[i]+"']").text()
                            var option="<option id='"+str[i]+"' value='"+str[i]+"'>"+text+"</option>";
                            $( "#get_access_page").append(option);
                            $("#get_access_page_remain option[value='"+str[i]+"']").remove();
                        }
                    }
                    else {
                        $("#get_access_page_remain option").each(function()
                        {
                            var text=$("#get_access_page_remain option[value='"+$(this).val()+"']").text()
                            var option="<option id='"+$(this).val()+"' value='"+$(this).val()+"'>"+text+"</option>";
                            $( "#get_access_page").append(option);
                            $("#get_access_page_remain option[value='"+$(this).val()+"']").remove();
                        });
                    }
                    $('#opt1').attr('disabled','disabled');
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.responseText);
                }
            });
        }
        else {
            if(type==2){
                $('#get_access_page option').each(function () {
                    $(this).attr('selected', true);
                });
            }
            $.ajax({
                type: "POST",
                url: "<?= base_url() ?>backoffice/check_privilege",
                data: { action: action, type: type, value: $( "#get_access_page" ).val(), id_group :id_group },
                dataType: "json",
                success: function(data){
//                    alert("success "+data.action+" "+data.type+" "+data.value);
                    var str= $( "#get_access_page" ).val() || [];
                    if(type==1){
                        for(var i=0;i<str.length;i++){
                            var text=$("#get_access_page option[value='"+str[i]+"']").text()
                            var option="<option id='"+str[i]+"' value='"+str[i]+"'>"+text+"</option>";
                            $( "#get_access_page_remain").append(option);
                            $("#get_access_page option[value='"+str[i]+"']").remove();
                        }
                    }
                    else {
                        $("#get_access_page option").each(function()
                        {
                            var text=$("#get_access_page option[value='"+$(this).val()+"']").text()
                            var option="<option id='"+$(this).val()+"' value='"+$(this).val()+"'>"+text+"</option>";
                            $( "#get_access_page_remain").append(option);
                            $("#get_access_page option[value='"+$(this).val()+"']").remove();
                        });
                    }
                    $('#opt2').attr('disabled','disabled');
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.responseText);
                }
            });
        }
    }
</script>