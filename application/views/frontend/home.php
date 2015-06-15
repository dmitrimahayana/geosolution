<?php $this->load->view("frontend/template/header"); ?>
<section id="subintro">
    <div class="jumbotron subhead satu" id="overview">
        <div class="container">
            <div class="row">
                <div class="span8">
                    <h3><i class="m-icon-big-swapright m-icon-white"></i> Website Geosolution</h3>
                    <p>
                        Surabaya Geosolution Company
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end tagline -->
<section id="maincontent" class="well">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div id="mainslider" class="flexslider">
                    <ul class="slides">
                        <?php foreach($slider as $key=>$row): ?>
                            <li data-thumb="<?= base_url() ?>upload/thumbs/<?= $row->IMAGES; ?>">
                                <img src="<?= base_url() ?>upload/images/<?= $row->IMAGES; ?>" alt=""/>
                                <div class="flex-caption primary">
                                    <h2><a style="color: #000000" href="<?= base_url().$row->NAME_PAGE.'/'.$lang; ?>"><?= ucwords(strtolower($row->TITLE)); ?></a></h2>
                                    <h4 style="color: #000000"><?php if(strlen ( $row->DESCRIPTION )>160 ){ echo ucfirst ( substr($row->DESCRIPTION, 0, 160) ).'...'; }else { echo ucfirst ( $row->DESCRIPTION ); } ?></h4>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="span3">
                <h3 class="heading-danger"><span class="btn btn-danger"><i class="icon-ok icon-white"></i></span>&nbsp;Keunggulan Utama</h3>
                <p>
                    Kenapa harus GeoSolution. Kami mempunyai 3 Keunggulan yang sangat menunjang pengerjaan proyek kepada client kami.
                </p>
            </div>
            <div class="span3">
                <div class="well well-primary box">
                    <img src="<?= base_url() ?>assets/img/icons/box-1-white.png" alt="" />
                    <h3>Akurasi </h3>
                    <p>
                        Dengan menggunakan alat yang canggih, kami bisa menghasilkan perhitungan
                    </p>
                    <a href="#">Read more</a>
                </div>
            </div>
            <div class="span3">
                <div class="well well-success box">
                    <img src="<?= base_url() ?>assets/img/icons/box-2-white.png" alt="" />
                    <h3>Standar Mutu ISO</h3>
                    <p>
                        GeoSolution bekerja dengan menggunakan standar mutu
                    </p>
                    <a href="#">Read more</a>
                </div>
            </div>
            <div class="span3">
                <div class="well well-warning box">
                    <img src="<?= base_url() ?>assets/img/icons/box-3-white.png" alt="" />
                    <h3>Dokumentasi baik</h3>
                    <p>
                        Dokumentasi yang baik adalah awal dari proses yang baik.
                    </p>
                    <a href="#">Read more</a>
                </div>
            </div>
        </div>
        <!-- divider -->
        <!-- end divider -->
        <div class="row">
            <div class="span6">
                <h3 class="heading-danger"><span class="btn btn-danger"><i class="icon-thumbs-up icon-white"></i></span>&nbsp;&nbsp;Apa Kata Mereka tentang GeoSolution</h3>
                <div id="myCarousel" class="carousel slide testimonials">
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="testimonial">
                                <img src="<?= base_url() ?>assets/img/dummies/testimonial-author-1.png" alt="" />
                                <blockquote>
                                    <p>
                                        Hasil proyek yang dilakukan sungguh luar biasa. Kualitas Paling Oke.
                                    </p>
                                </blockquote>
                                <div class="info">
                                    <span class="author"><strong><a href="#">Kelly Howards</a>,</strong></span>
                                    <span class="company">MMC Design - Director</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial">
                                <img src="<?= base_url() ?>assets/img/dummies/testimonial-author-2.png" alt="" />
                                <blockquote>
                                    <p>
                                        Senang bekerja sama dengan GeoSolution
                                    </p>
                                </blockquote>
                                <div class="info">
                                    <span class="author"><strong><a href="#">Mark Lunch</a>,</strong></span>
                                    <span class="company">Mad Business - Marketing Officer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
                </div>
            </div>
            <div class="span6">
                <h3 class="heading-danger"><span class="btn btn-danger"><i class="icon-briefcase icon-white"></i></span>&nbsp;&nbsp;Apa yang kami kerjakan</h3>

                <div class="accordion" id="accordion2">
                    <div class="accordion-group">
                        <div class="accordion-heading"><a class="accordion-toggle" data-parent="#accordion2" data-toggle="collapse" href="#collapseOne">1. Pemetaan Topografi</a></div>

                        <div class="accordion-body collapse in" id="collapseOne">
                            <div class="accordion-inner"><img alt="" src="http://localhost/geosolution/upload/images/Pemetaan%20Topografi.jpg" style="width: 200px; height: 150px;" class="alignleft"/>
                                <h5>Pemetaan Topografi</h5>

                                <p>Membuat peta topografi/relief muka bumi (menampilkan semua unsur yang ada diatas permukaan bumi baik unsur alam maupun buatan manusia)</p>
                                <a href="http://localhost/geosolution/pemetaan-topografi/1">Selengkapnya</a></div>
                        </div>
                    </div>

                    <div class="accordion-group">
                        <div class="accordion-heading"><a class="accordion-toggle" data-parent="#accordion2" data-toggle="collapse" href="#collapseTwo">2. Survey GPS</a></div>

                        <div class="accordion-body collapse" id="collapseTwo">
                            <div class="accordion-inner"><img alt="" src="http://localhost/geosolution/upload/images/Survey%20GPS.jpg" style="width: 200px; height: 150px;" class="alignleft" />
                                <h5>Survey GPS</h5>

                                <p>Melakukan pemetaan bentuk dan ukuran bumi yang dilakukan secara terestris (menggunakan peralatan manual) dan ekstra terestris (menggunakan bantuan satelit penginderaan jauh dan GPS/Global Positioning System)</p>
                                <a href="http://localhost/geosolution/survey-gps/1">Selengkapnya</a></div>
                        </div>
                    </div>

                    <div class="accordion-group">
                        <div class="accordion-heading"><a class="accordion-toggle" data-parent="#accordion2" data-toggle="collapse" href="#collapseThree">3. GIS</a></div>

                        <div class="accordion-body collapse" id="collapseThree">
                            <div class="accordion-inner"><img alt="" src="http://localhost/geosolution/upload/images/gis.png" style="width: 200px; height: 150px;" class="alignleft" />
                                <h5>GIS</h5>

                                <p>Metode penyampaian informasi secara grafis yang menggabungkan peta dengan data-data lapangan sehingga lebih mudah dipahami dan dianalisa. Data GIS dapat dimanfaatkan sebagai acuan perencanaan pembangunan, bank data atau alat pemantau pembangunan.</p>
                                <a href="http://localhost/geosolution/gis/1">Selengkapnya</a></div>
                        </div>
                    </div>

                    <div class="accordion-group">
                        <div class="accordion-heading"><a class="accordion-toggle" data-parent="#accordion2" data-toggle="collapse" href="#collapseFour">4. Survey Batimetri/Hidrografi</a></div>

                        <div class="accordion-body collapse" id="collapseFour">
                            <div class="accordion-inner"><img alt="" src="http://localhost/geosolution/upload/images/Survey%20Batimetri-Hidrografi.jpg" style="width: 200px; height: 150px;" class="alignleft" />
                                <h5>Survey Batimetri/Hidrografi</h5>

                                <p>Membuat peta topografi/relief muka bumi (menampilkan semua unsur yang ada diatas permukaan bumi baik unsur alam maupun buatan manusia)</p>
                                <a href="http://localhost/geosolution/survey-batimetri-hidrografi/1">Selengkapnya</a></div>
                        </div>
                    </div>

                    <div class="accordion-group">
                        <div class="accordion-heading"><a class="accordion-toggle" data-parent="#accordion2" data-toggle="collapse" href="#collapse5">5. Rental Alat Survey</a></div>

                        <div class="accordion-body collapse" id="collapse5">
                            <div class="accordion-inner"><img alt="" src="http://localhost/geosolution/upload/images/rentan%20alat%20survei.jpg" style="width: 200px; height: 150px;" class="alignleft" />
                                <h5>Rental Alat Survey</h5>

                                <p>Sebagai perusahaan yang bergerak di bidang survey pemetaan, PT JSK melayani kebutuhan alat survey baik digital maupun manual dengan sistem harian maupun bulanan. Pemenuhan kebutuhan peralatan survey ini juga bisa dilakukan dengan sistem sewa beli maupun penjualan alat second denga harga yang kompetitif. Selain perwatan yang memenuhi standart, PT JSK secara berkala melakukan kalibrasi pada setiap unit alat survey untuk menjamin keakuratan data sessuai dengan tingkat ketelitian yang diharapkan.</p>
                                <a href="http://localhost/geosolution/rental-alat-survey/1">Selengkapnya</a></div>
                        </div>
                    </div>

                    <div class="accordion-group">
                        <div class="accordion-heading"><a class="accordion-toggle" data-parent="#accordion2" data-toggle="collapse" href="#collapsesix">6. Service Survice</a></div>

                        <div class="accordion-body collapse" id="collapsesix">
                            <div class="accordion-inner"><img alt="" src="http://localhost/geosolution/upload/images/Waterpass.jpg" style="width: 200px; height: 150px;" class="alignleft" />
                                <h5>Service Survice</h5>

                                <p>Salah satu layanan di PT JSK addalah menyediakan surveyor lengkap dengan Total Station untuk melaksanakan pekerjaan sesuai dengan kebutuhan pemakai jasa. PT JSK menjamin kemampuan dan kesinambungan keberadaan personil dan unit kerja di lokasi pekerjaan sesuai dengan kelas atau paketnya.</p>
                                <a href="http://localhost/geosolution/service-survice/1">Selengkapnya</a></div>
                        </div>
                    </div>

                    <div class="accordion-group">
                        <div class="accordion-heading"><a class="accordion-toggle" data-parent="#accordion2" data-toggle="collapse" href="#collapseseven">7. Pelatihan</a></div>

                        <div class="accordion-body collapse" id="collapseseven">
                            <div class="accordion-inner"><img alt="" src="http://localhost/geosolution/upload/images/Pelatihan%20Total%20Station.JPG" style="width: 200px; height: 150px;" class="alignleft" />
                                <h5>Pelatihan</h5>

                                <p>Pelatihan Total Station adalah merupakan wadah peningkatan kemampuan surveyor di bidang pengukuran praktis sesuai kebutuhan. PT JSK dengan dukungan personal, unit kerja dan komputasi yang memadai siap menjalin kerjasama dengan pihak-pihak yang bermaksud mengadakan pelatihan Total Station.</p>
                                <a href="http://localhost/geosolution/pelatihan/1">Selengkapnya</a></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<footer class="verybottom" style="">
    <div class="verybottom">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <center>
                        <p>
                            &copy; GeoSolution Surabaya - All right reserved
                        </p>
                    </center>
                </div>
            </div>
        </div>
    </div>
</footer>
<script>
    (function(){
// Append a close trigger for each block
        $('.box-tile .content').append('<span class="close">x</span>');
// Show window
        function showContent(elem){
            hideContent();
            elem.find('.content').addClass('expanded');
            elem.addClass('cover');
        }
// Reset all
        function hideContent(){
            $('.box-tile  .content').removeClass('expanded');
            $('.box-tile  li').removeClass('cover');
        }
// When a li is clicked, show its content window and position it above all
        $('.box-tile  li').click(function() {
            showContent($(this));
        });
// When tabbing, show its content window using ENTER key
        $('.box-tile  li').keypress(function(e) {
            if (e.keyCode == 13) {
                showContent($(this));
            }
        });
// When right upper close element is clicked  - reset all
        $('.box-tile  .close').click(function(e) {
            e.stopPropagation();
            hideContent();
        });
// Also, when ESC key is pressed - reset all
        $(document).keyup(function(e) {
            if (e.keyCode == 27) {
                hideContent();
            }
        });
    })();
</script>
</body>
</html>