<!DOCTYPE html>
<html>
<head>
    <title>Admin Back Office</title>
    <link rel="shortcut icon" href="<?= base_url() ?>assets/ico/logo-geosolution.ico">
    <!-- Bootstrap -->
    <link href="<?= base_url() ?>bootstrap/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="<?= base_url() ?>bootstrap/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="<?= base_url() ?>bootstrap/vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
    <link href="<?= base_url() ?>bootstrap/assets/styles.css" rel="stylesheet" media="screen">
    <link href="<?= base_url() ?>bootstrap/assets/DT_bootstrap.css" rel="stylesheet" media="screen">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>-->
    <script src="<?= base_url() ?>bootstrap/html5.js"></script>
    <![endif]-->
    <script src="<?= base_url() ?>bootstrap/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    <!-- google analytic -->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>

    <!-- Advance google analytic -->
    <script type="text/javascript">

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-45952975-1']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
    </script>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-45952975-1', 'geosolution-sby.com');
        ga('send', 'pageview');
    </script>

</head>
<body <?php if ($this->uri->segment(1) == "member" and  $this->uri->segment(2) == "index"): ?>id="login" <?php endif ?>>