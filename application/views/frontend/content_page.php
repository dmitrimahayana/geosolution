<?php $this->load->view("frontend/template/header"); ?>

    <section id="subintro">
        <div class="jumbotron subhead satu" id="overview">
            <div class="container">
                <div class="row">
                    <div class="span8">
                        <h3>
                            <i class="m-icon-big-swapright m-icon-white"></i>
                            <?php foreach($page as $key=>$row):
                                echo ucwords(strtolower($row->TITLE_));
                            endforeach; ?></h3>
<!--                        <p>-->
<!--                            Kami Menyediakan jasa jasa meliputi-->
<!--                        </p>-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="maincontent">
        <div class="container">
            <div class="row">
                <?php
                foreach($page as $key=>$row):
                    $mystring = $row->CONTENT;
                    $findme   = '<div class="span12 well">';
                    $pos = strpos($mystring, $findme);

                    $findme2   = '<div class="span8 well">';
                    $pos2 = strpos($mystring, $findme2);

                    // Note our use of ===.  Simply == would not work as expected
                    // because the position of 'a' was the 0th (first) character.
                    if ($pos === false && $pos2 === false && $name_page!="about") {
    //                    echo "The string '$findme' was not found in the string '$mystring'";
                        echo '<div class="span12 well">';
                    } else {
    //                    echo "The string '$findme' was found in the string '$mystring'";
    //                    echo " and exists at position $pos";
                        echo "";
                    }
                endforeach;
                ?>

                <?php foreach($page as $key=>$row):
                    echo $row->CONTENT;
                endforeach; ?>

                <?php
                foreach($page as $key=>$row):
                    $mystring = $row->CONTENT;
                    $findme   = '<div class="span3 well">';
                    $pos = strpos($mystring, $findme);

                    $findme2   = '<div class="span8 well">';
                    $pos2 = strpos($mystring, $findme2);

                    // Note our use of ===.  Simply == would not work as expected
                    // because the position of 'a' was the 0th (first) character.
                    if ($pos === false && $pos2 === false && $name_page!="about") {
                        //                    echo "The string '$findme' was not found in the string '$mystring'";
                        echo '</div>';
                    } else {
                        //                    echo "The string '$findme' was found in the string '$mystring'";
                        //                    echo " and exists at position $pos";
                        echo "";
                    }
                endforeach;
                ?>

                <?php if($name_page=="about"): ?>
                <div class="span8 well">
                    <div class="spacer30">
                    </div>
                    <div class="row">
                        <form action="<?= base_url() ?>message/insert/<?= $lang ?>" name="message" method="post">
                            <div class="span3">
                                <label>Name <span>*</span></label>
                                <input name="name" type="text" class="input-block-level" placeholder="Name" />
                            </div>
                            <div class="span3">
                                <label>Subject <span>*</span></label>
                                <input name="subject" type="text" class="input-block-level" placeholder="Subject" />
                            </div>
                            <div class="span8">
                                <label>Message <span>*</span></label>
                                <textarea name="message" rows="9" class="input-block-level" placeholder="Message"></textarea>
                                <button class="btn btn-medium btn-satu" type="submit">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php $this->load->view("frontend/template/footer"); ?>