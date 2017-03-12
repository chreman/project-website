<?php include 'config.php' ?>
<!DOCTYPE HTML>
<html lang="en">
    <head>

        <?php include ($COMPONENTS_PATH . "head_standard.php"); ?>

        <script>
            var intro = {
            title: "What's this?",
                    body: '<div class="description-headstart" style="max-width: 1000px"><div style="margin: 0 0 30px;"><p class="icon"><img src="./img/top100.png">            </p>             <p class="icon-description">An Open Knowledge Maps visualization presents you with a topical overview for a search term.                It is based on the most relevant papers in the chosen library.                            </p>        </div>        <div style="margin: 0 0 30px;">            <p class="icon"><img src="./img/textsimilarity.png">            </p>            <p class="icon-description">We use text similarity to create the knowledge maps.                The algorithm groups those papers together that have many words in common.            </p>        </div>        <div style="display: block;">            <p class="icon"><img src="./img/headstart-search.png"></p>            <p class="icon-description">The visualization is intended to give you a head start on your             literature search. You can also use Open Knowledge Maps to stay up-to-date - just limit your search to the most recent papers in the search options.            </p>        </div>'
            }
        </script>
    </head>

    <body>
        <?php include ($COMPONENTS_PATH . "header_search.php"); ?>

        <div style="padding-top:78px;">
            
            <?php
            require_once $LIB_PATH . 'MobileDetect/Mobile_Detect.php';
            $detect = new Mobile_Detect;
            if ($detect->isMobile()):
                ?>



                <div class="alert alert-warning" id="mobile-warning">

                    <a href="#" class="close" data-dismiss="alert">&times;</a>

                    Open Knowledge Maps isn't optimized for mobile usage yet. We are working on a better mobile experience; in the meantime, you may encounter some rough edges.

                </div>

            <?php endif ?>
            
            <div id="visualization" style="background-color:white;"></div>
        </div>
        <?php
        $credit = "";

        $title = "";

        if (!isset($_GET['service'])) {
            echo '<script type="text/javascript" src="./js/data-config_plos.js"></script>';
            $credit = '<a href="http://github.com/ropensci/rplos" target="_blank">rplos</a>. Content and metadata retrieved from <a href="https://www.plos.org/publications/journals/" target="_blank">Public Library of Science Journals</a>';

            $title = "PLOS";
        } else {
            if ($_GET['service'] === "plos") {
                $credit = '<a href="http://github.com/ropensci/rplos" target="_blank">rplos</a>. Content and metadata retrieved from <a href="https://www.plos.org/publications/journals/" target="_blank">Public Library of Science Journals</a>';
                echo '<script type="text/javascript" src="./js/data-config_plos.js"></script>';
                $title = "PLOS";
            } else if ($_GET['service'] === "pubmed") {
                $credit = '<a href="https://github.com/ropensci/rentrez " target="_blank ">rentrez</a>. All content retrieved from <a href="http://www.ncbi.nlm.nih.gov/pubmed " target="_blank ">PubMed</a>';
                echo '<script type="text/javascript" src="./js/data-config_pubmed.js"></script>';
                $title = "PubMed";
            } else if ($_GET['service'] === "doaj") {
                $credit = '<a href="https://github.com/ropenscilabs/jaod " target="_blank ">jaod</a>. All content retrieved from <a href="http://doaj.org " target="_blank ">DOAJ</a>.';
                echo '<script type="text/javascript" src="./js/data-config_doaj.js"></script>';
                $title = "DOAJ";
            } else if ($_GET['service'] === "base") {
                $credit = '<a href="https://github.com/ropenscilabs/rbace" target="_blank ">rbace</a>. All content retrieved from <a href="http://base-search.net" target="_blank ">BASE</a>.';
                echo '<script type="text/javascript" src="./js/data-config_base.js"></script>';
                $title = "BASE";
            }
        }
        ?>

        <?php
        $query = json_encode($_GET['id']);

        if (isset($_GET['query'])) {
            $query = json_encode($_GET['query']);
        }
        ?>

        <script>
            var div_height = ($(document).height() < 750) ? (750) : ($(document).height());
            $("#visualization").css("height", div_height + "px")

                    data_config.server_url = "<?php echo $HEADSTART_URL ?>server/";
            data_config.intro = intro;
            data_config.title = '<?php echo 'Overview of <span id="num_articles"></span> ' . $title . ' articles for ' . $query; ?>';
            data_config.files = [{
            title: <?php echo $query ?>,
                    file: <?php echo json_encode($_GET['id']) ?>
            }]
        </script>
        <script type="text/javascript" src="<?php echo $HEADSTART_URL ?>dist/headstart.js"></script>
        <script type="text/javascript">
            headstart.start();
        </script>

        <div style="text-align: right; margin: 20px 10px 10px 10px">Built with <a href="http://github.com/pkraker/Headstart" target="_blank">Headstart</a> and <?php echo $credit ?>
        </div>

        <link rel="stylesheet" href="<?php echo $HEADSTART_URL ?>dist/headstart.css">
        <link rel="stylesheet" href="./css/main.css">
        <?php include($COMPONENTS_PATH . 'footer.php'); ?>