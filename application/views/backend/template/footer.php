<!--/.fluid-container-->
<script src="<?= base_url() ?>bootstrap/vendors/jquery-1.9.1.min.js"></script>
<script src="<?= base_url() ?>bootstrap/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>bootstrap/vendors/easypiechart/jquery.easy-pie-chart.js"></script>

<link href="<?= base_url() ?>bootstrap/vendors/datepicker.css" rel="stylesheet" media="screen">
<link href="<?= base_url() ?>bootstrap/vendors/uniform.default.css" rel="stylesheet" media="screen">
<link href="<?= base_url() ?>bootstrap/vendors/chosen.min.css" rel="stylesheet" media="screen">
<link href="<?= base_url() ?>bootstrap/vendors/wysiwyg/bootstrap-wysihtml5.css" rel="stylesheet" media="screen">
<script src="<?= base_url() ?>bootstrap/vendors/jquery.uniform.min.js"></script>
<script src="<?= base_url() ?>bootstrap/vendors/chosen.jquery.min.js"></script>
<script src="<?= base_url() ?>bootstrap/vendors/bootstrap-datepicker.js"></script>
<script src="<?= base_url() ?>bootstrap/vendors/wysiwyg/wysihtml5-0.3.0.js"></script>
<script src="<?= base_url() ?>bootstrap/vendors/wysiwyg/bootstrap-wysihtml5.js"></script>
<script src="<?= base_url() ?>bootstrap/vendors/wizard/jquery.bootstrap.wizard.min.js"></script>

<script src="<?= base_url() ?>bootstrap/vendors/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>bootstrap/assets/DT_bootstrap.js"></script>

<script src="<?= base_url() ?>bootstrap/vendors/ckeditor/ckeditor.js"></script>
<script src="<?= base_url() ?>bootstrap/vendors/ckeditor/adapters/jquery.js"></script>

<script type="text/javascript" src="<?= base_url() ?>bootstrap/vendors/tinymce/js/tinymce/tinymce.min.js"></script>

<script src="<?= base_url() ?>bootstrap/assets/scripts.js"></script>
<script>
    $(function() {
        // Easy pie charts
        $('.chart').easyPieChart({animate: 1000});

        //ckeditor
        //dont forget to chage ckfinder config and ckeditor config
        $( '.editor' ).ckeditor({width:'98%', height: '400px'});
    });

    // Tiny MCE
    //filemanager plugin dont forget to chage baseurl
<!--    tinymce.init({-->
<!--        selector: ".tinymce_basic_editor",-->
<!--        height: "400",-->
<!--        plugins: [-->
<!--            "advlist autolink link image lists charmap print preview hr anchor pagebreak",-->
<!--            "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",-->
<!--            "table contextmenu directionality emoticons paste textcolor responsivefilemanager",-->
<!--            "codemirror"-->
<!--        ],-->
<!--        toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",-->
<!--        toolbar2: "responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",-->
<!--        image_advtab: true ,-->
<!---->
<!--        external_filemanager_path:"--><?//= base_url() ?><!--filemanager/",-->
<!--        filemanager_title:"Responsive Filemanager" ,-->
<!--        external_plugins: { "filemanager" : "--><?//= base_url() ?><!--filemanager/plugin.min.js"}-->
<!--    });-->
</script>

</body>
</html>