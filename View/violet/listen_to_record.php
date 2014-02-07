<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php  $pagename="home"; include_once("_include/modules/config.php"); ?>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="<?=$language?>">
<head profile="http://gmpg.org/xfn/11">
    <title><?=$site_name?></title>
    <meta http-equiv="Content-Type" content="<?=$page_encoding?>" />
    <meta name="keywords" content="<?=$site_keywords?>" />
    <meta name="description" content="<?=$site_description?>" />
    <meta name="author" content="<?=$author?>" />
    <meta name="copyright" content="<?=$copy?>" />
    <link rel="shortcut icon" href="<?=$img_dir?>/icons/favicon.ico" type="image/x-icon" />
    <?php include("_include/modules/css-js.php"); ?>
    <?php include("_include/modules/google-analytics.php"); ?>

</head>
<body>

<?php include("_include/modules/top.php"); ?>

<!-- start middle -->
<div class="middle" style="min-height: 580px;">
    <!-- start inner -->
    <div class="inner gradient-down">

        <!-- IE 6 Needs this -->
        <div class="full-width">

            <div class="one-half pt20">
                <?php if (isset($data['record'])){ ?>
                    <p>
                    <span><b>Title:</b> <?php echo $data['record']->title; ?></span><br/>
                    <span><b>Author:</b> <?php echo $data['record']->author; ?></span><br/>
                    <span><b>Category:</b> <?php echo $data['record']->category; ?></span><br/>
                    <span><b>User:</b> <?php echo $data['record']->user; ?></span><br/>
                    <span><b>Time:</b> <?php echo $data['record']->time; ?></span><br/>
                    </p>
                    <audio controls>
                        <source src="<?php echo $data['record']->url; ?>" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
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


