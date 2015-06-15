<?php //$this->load->view("header"); ?>

<?php $this->load->view("backend/template/footer"); ?>

<!--    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
    <script type="text/javascript" src="<?= base_url() ?>countdown/jquery.countdown.js"></script>
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>countdown/style.css" media="screen">

    <script type="text/javascript">

        $(function() {

            $('.countdown.callback').countdown({
                date: +(new Date) + 120000,
                render: function(data) {
                    $(this.el).text(this.leadingZeros(data.min, 2) + " min " + this.leadingZeros(data.sec, 2) + " sec");
                },
                onEnd: function() {
                    $(this.el).addClass('ended');
                    setTimeout(function() {
                        window.location="<?= base_url().'member/update_login' ?>"
                    }, 1000);
                }
            }).on("click", function() {
                    $(this).removeClass('ended').data('countdown').update(+(new Date) + 120000).start();
            });
        });

    </script>

<div class="container">
    <h1>Time Penalty for Failed Login</h1>

    <div class="countdown callback"></div>
</div>