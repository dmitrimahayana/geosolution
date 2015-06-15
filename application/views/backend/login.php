<?php $this->load->view("backend/template/header"); ?>
<div class="container">
    <form class="form-signin" method="post" action="<?= base_url() ?>member/validation_login">
        <h2 class="form-signin-heading">Please sign in</h2>
        <?php if($this->session->flashdata('errors')): ?>
        <div class="alert alert-error">
            <button class="close" data-dismiss="alert">&times;</button>
            <strong>
                <?php echo $this->session->flashdata('errors'); ?>
            </strong>
        </div>
        <?php endif ?>
        <input type="text" name="username" id="username" class="input-block-level" placeholder="Email address">
        <input type="password" name="password" id="password" class="input-block-level" placeholder="Password">
        <button class="btn btn-large btn-primary" type="submit">Sign in</button>
    </form>

</div> <!-- /container -->
<?php $this->load->view("backend/template/footer"); ?>