<div class="span3" id="sidebar">
    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
<!--        <li>-->
<!--            <a href="#"><span class="badge badge-success pull-right">731</span> Orders</a>-->
<!--        </li>-->
<!--        <li>-->
<!--            <a href="#"><span class="badge badge-success pull-right">812</span> Invoices</a>-->
<!--        </li>-->
<!--        <li>-->
<!--            <a href="#"><span class="badge badge-info pull-right">27</span> Clients</a>-->
<!--        </li>-->
<!--        <li>-->
<!--            <a href="#"><span class="badge badge-info pull-right">1,234</span> Users</a>-->
<!--        </li>-->
        <li>
            <a href="<?= base_url().'backoffice/message/manage' ?>">
                <span class="badge badge-info pull-right">
                    <?= $this->message_model->getNew(); ?>
                </span>
                Messages
            </a>
        </li>
<!--        <li>-->
<!--            <a href="#"><span class="badge badge-important pull-right">83</span> Errors</a>-->
<!--        </li>-->
<!--        <li>-->
<!--            <a href="#"><span class="badge badge-warning pull-right">4,231</span> Logs</a>-->
<!--        </li>-->
    </ul>
</div>