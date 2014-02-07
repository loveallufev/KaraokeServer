<?php  $pagename="home"; include_once("_include/modules/config.php"); ?>
<html>
<head>
    <title><?=$site_name?></title>
    <meta http-equiv="Content-Type" content="<?=$page_encoding?>" />
    <meta name="keywords" content="<?=$site_keywords?>" />
    <meta name="description" content="<?=$site_description?>" />
    <meta name="author" content="<?=$author?>" />
    <meta name="copyright" content="<?=$copy?>" />
    <link rel="shortcut icon" href="<?=$img_dir?>/icons/favicon.ico" type="image/x-icon" />
    <meta property="og:image" content="<?=$img_dir?>/misc/icon300x300.png" />
    <?php include("_include/modules/css-js.php"); ?>
    <?php include("_include/modules/google-analytics.php"); ?>

</head>
<body>

<?php include("_include/modules/top.php"); ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=476841689104290";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>


<!-- start middle -->
<div class="middle" style="min-height: 580px;">
    <!-- start inner -->
    <div class="inner gradient-down">

        <!-- IE 6 Needs this -->
        <div class="full-width">

            <div class="one-half pt20">
                <?php if (isset($data['record'])){
                    $http = ($_SERVER['HTTPS'] ? 'https://' : 'http://'); ?>
                    <p>
                    <span><b>Title:</b> <?php echo $data['record']->title; ?></span><br/>
                    <span><b>Author:</b> <?php echo $data['record']->author; ?></span><br/>
                    <span><b>Category:</b> <?php echo $data['record']->category; ?></span><br/>
                    <span><b>User:</b> <?php echo $data['record']->user; ?></span><br/>
                    <span><b>Time:</b> <?php echo $data['record']->time; ?></span><br/>
                    <span><b>Views:</b> <?php echo $data['record']->count; ?></span><br/>
                    </p>
                    <audio controls>
                        <source src="<?php echo $data['record']->url; ?>" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                    <br/>
                    <div style="height: 20px;" ></div>
                    <div class="fb-like" data-href="<?php echo $http . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>" data-width="420" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
                    <br/>
                    <div class="fb-comments" data-href="<?php echo $http . $_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI'];?>" data-width="420" data-numposts="10" data-colorscheme="light"></div>
                <?php } else { ?>
                    <h2> Invalid record ID </h2>
                <?php } ?>
            </div>

            <div class="one-half pt20">
                <div class="outer-rounded-box-bold">
                    <div class="simple-rounded-box">

                        <h1>Related records:</h1>
                        <div id="list4">
                            <ul>
                                <?php if (isset($data['related']))  {
                                    foreach ($data['related'] as $relatedRec) { ?>
                                    <li><a href="<?php echo BASE_URL . DS . 'index.php/record/listen?id=' . $relatedRec->id; ?>">
                                            <strong><?php echo $relatedRec->title; ?></strong><?php echo $relatedRec->time;?></a></li>
                                <?php }
                                } else
                                {
                                    echo "No related records";
                                } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>

        </div>

    </div>
    <!-- end inner -->
</div>

<?php include("_include/modules/footer.php"); ?>

</body>
</html>



