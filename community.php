<?php include 'config.php' ?>
<!DOCTYPE HTML>
<html lang="en" xmlns:fb="http://ogp.me/ns/fb#">
    <head>
        <base href="<?php echo $SITE_URL ?>">
        <?php $title = "About - Open Knowledge Maps"; ?>
        <?php include($COMPONENTS_PATH . 'head_bootstrap.php'); ?>
        <?php include($COMPONENTS_PATH . 'head_standard.php'); ?>
        <?php include($COMPONENTS_PATH . 'head_headstart.php') ?>
    </head>

    <body class="team-page community-page">

        <?php include($COMPONENTS_PATH . 'header.php'); ?>

        <div id="team">
            <div class="headerimage"><img src="./img/community-mobil.png"></div>
            <div class="background2 bg4">
                <div class="team">
                    <p>Our Community</p>
                    <p>We are driven by our community: only together can we change the way we discover research.
                        Do you also want to make a difference? Then consider <a class="underline whitelink" href="#enthusiast-program">becoming an enthusiast</a>! In any case, <a class="underline whitelink" href="./getintouch">get in touch</a>.</p>
                </div>
            </div>

        </div>
        <?php include($COMPONENTS_PATH . "enthusiasts-program.php") ?>
        <?php include($COMPONENTS_PATH . "current-enthusiasts.php") ?>


        <?php
        $COMMENT_TITLE = "What our enthusiasts say";
        $COMMENT_IMAGES_URL = "./img/enthusiasts/ep-statements/";
        include($COMPONENTS_PATH . 'commentstream.php');
        ?>            



        <?php include($COMPONENTS_PATH . "program-coordination.php") ?>
        <?php /* include($COMPONENTS_PATH . "newsletter.php") */ ?>
        <?php include($COMPONENTS_PATH . 'footer_base.php'); ?>