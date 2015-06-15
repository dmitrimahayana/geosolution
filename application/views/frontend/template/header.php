<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>GeoSolution</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- styles -->
    <link href="<?= base_url() ?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/docs.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/js/google-code-prettify/prettify.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/flexslider.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/color/success.css" rel="stylesheet">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="<?= base_url() ?>assets/js/jquery-1.8.2.min.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.easing.1.3.js"></script>
    <script src="<?= base_url() ?>assets/js/google-code-prettify/prettify.js"></script>
    <script src="<?= base_url() ?>assets/js/modernizr.js"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.elastislide.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.flexslider.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.prettyPhoto.js"></script>
    <script src="<?= base_url() ?>assets/js/application.js"></script>

    <!-- Portfolio hover -->
    <script src="<?= base_url() ?>assets/js/hover/jquery-hover-effect.js"></script>
    <script src="<?= base_url() ?>assets/js/hover/setting.js"></script>
    <script src="<?= base_url() ?>assets/js/custom.js"></script>

    <!-- fav and touch icons -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/ico/logo-geosolution.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url() ?>assets/ico/logo-geosolution.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url() ?>assets/ico/logo-geosolution.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url() ?>assets/ico/logo-geosolution.png">
    <link rel="apple-touch-icon-precomposed" href="<?= base_url() ?>assets/ico/logo-geosolution.png">

    <!-- google maps -->
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCYU89lFfXXAlUfj8JWN4kQupURK_8waQI&sensor=false">
    </script>

    <script>
        var myCenter=new google.maps.LatLng(-7.291256,112.803558);
        function initialize()
        {
            var mapProp = {
                center:myCenter,
                zoom:16,
                mapTypeId:google.maps.MapTypeId.ROADMAP
            };
            var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);

            var marker=new google.maps.Marker({
                position:myCenter,
                animation:google.maps.Animation.BOUNCE
            });

            marker.setMap(map);
//            var infowindow = new google.maps.InfoWindow({
//                content:"Hello World!"
//            });
//            infowindow.open(map,marker);
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>

</head>
<body>
<header>
    <!-- Navbar ================================================== -->
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <!-- logo -->
                <a class="brand logo" href="index.php" style="margin-top: 0px;">
                    <img src="<?= base_url() ?>upload/images/logo geosolution.png" style="width: 100px;height: 60px;" alt="" />
                </a>
                <!-- end logo -->
                <!-- top menu -->
                <div>
                    <nav>
                        <ul class="nav topnav">
<!--                            <li class="dropdown danger">-->
<!--                                <a href="--><?//= base_url().'home/'.$lang ?><!--"><i class="icon-home icon-white"></i> Home</a>-->
<!--                            </li>-->
                            <?php
                            $icon[0]="icon-home";
                            $icon[1]="icon-user";
                            $icon[2]="icon-shopping";
                            $icon[3]="icon-briefcase";
                            $icon[4]="icon-envelope";

                            $class[0]="danger";
                            $class[1]="success";
                            $class[2]="primary";
                            $class[3]="warning";
                            $class[4]="inverse";
                            ?>
                            <?php foreach($menu as $key=>$row): ?>
                                <li class="dropdown <?= $class[$key] ?>">
                                    <a href="<?= $row->LINK_MENU.'/'.$lang; ?>"><i class="<?= $icon[$key] ?> icon-white"></i> <?= $row->TEXT_MENU; ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </nav>
                    <div class="brand logo">
                        <div class="span3">
                                <select class="lang" id="lang" name="lang" style="width:140px" >
                                    <?php foreach($all_lang as $key=>$row): ?>
                                        <option value="<?= $row->ID_LANG ?>" <?= ($lang==$row->ID_LANG)?'selected="selected"':''; ?> >
                                            <?= $row->LANG ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            <script>
                                $( "#lang" ).change(function() {
                                    window.location='<?= base_url().$name_page.'/' ?>'+$(this).val();
                                    //alert( "Handler for .change() called."+$(this).val() );
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <!-- end menu -->
            </div>
        </div>
    </div>
</header>