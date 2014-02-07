<?php

    // Include the UberGallery class
include('resources/UberGallery.php');
include_once("_include/modules/config.php");

    // Initialize the UberGallery object
$gallery = new UberGallery();

    // Initialize the gallery array
$galleryArray = $gallery->readImageDirectory($gallery_dir);

    // Define theme path
if (!defined('THEMEPATH')) {
    define('THEMEPATH', BASE_URL . DS . $gallery->getThemePath());
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php  $pagename="screenshot"; include_once("_include/modules/config.php"); ?>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="<?=$language?>">
<head profile="http://gmpg.org/xfn/11">
    <title><?=$site_name?></title>
    <meta http-equiv="Content-Type" content="<?=$page_encoding?>" />
    <meta name="keywords" content="<?=$site_keywords?>" />
    <meta name="description" content="<?=$site_description?>" />
    <meta name="author" content="<?=$author?>" />
    <meta name="copyright" content="<?=$copy?>" />
    <link rel="shortcut icon" href="<?=$img_dir?>/icons/favicon.ico" type="image/x-icon" />
    <link rel="image_src"
          type="image/jpeg"
          href="<?=$site_dir?>"><img src="<?=$img_dir?>/misc/logo.png" />
    <?php include("_include/modules/css-js.php"); ?>
    <?php include("_include/modules/google-analytics.php"); ?>

    <!-- start load cycle slideshow -->
    <link href="<?=$css_dir?>/jquery.cycle.css" rel="stylesheet" type="text/css" />
    <script src="<?=$js_dir?>/jquery.cycle.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo THEMEPATH; ?>/rebase-min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo THEMEPATH; ?>/style.css" />
    <?php echo $gallery->getColorboxStyles(5); ?>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <?php echo $gallery->getColorboxScripts(); ?>
    <script type="text/javascript">
        $(function() {
            $('#slideshow').cycle({
            fx:     'scrollHorz',  // effect
            speed:  400,    // speed of transition
            timeout: 8000,    // timeout of the slide
            pause:       false,     // true to enable "pause on hover"
            pauseOnPagerHover: false, // true to pause when hovering over pager link
            pager:  '#slideshownav',
            next:   '#slideshownext',
            prev:   '#slideshowprev',
            pagerAnchorBuilder: function(idx, slide) {
                // return sel string for existing anchor
                return '#slideshownav li:eq(' + (idx) + ') a';
            },
            cleartypeNoBg: true,  // fix cleartype inside slides
            cleartype: true  // fix cleartype inside slides
        });
            $('#slideshownav li a').click(function() {   $('#slideshow').cycle('pause');   });
            $('.slide').click(function() {   $('#slideshow').cycle('pause');     });
        });
    </script>
    <!-- stop load cycle -->

</head>
<body>

    <?php include("_include/modules/top.php"); ?>
    <!-- start middle -->
    <div class="middle" style="min-height:600px;">
        <!-- start home -->
        <div class="home">
            <div id="galleryWrapper">
                <div class="line"></div>

                <?php if($gallery->getSystemMessages()): ?>
                    <ul id="systemMessages">
                        <?php foreach($gallery->getSystemMessages() as $message): ?>
                            <li class="<?php echo $message['type']; ?>">
                                <?php echo $message['text']; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <div id="galleryListWrapper">
                    <?php if (!empty($galleryArray) && $galleryArray['stats']['total_images'] > 0): ?>
                        <ul id="galleryList" class="clearfix">
                            <?php foreach ($galleryArray['images'] as $image): ?>
                                <li><a href="<?php echo BASE_URL . DS . $image['file_path']; ?>" title="<?php echo $image['file_title']; ?>" rel='colorbox'><img src="<?php echo BASE_URL . DS . $image['thumb_path']; ?>" alt="<?php echo $image['file_title']; ?>"/></a></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>

                <div class="line"></div>
                <div id="galleryFooter" class="clearfix">

                    <?php if ($galleryArray['stats']['total_pages'] > 1): ?>
                        <ul id="galleryPagination">

                            <?php foreach ($galleryArray['paginator'] as $item): ?>

                                <li class="<?php echo $item['class']; ?>">
                                    <?php if (!empty($item['href'])): ?>
                                        <a href="<?php echo $item['href']; ?>"><?php echo $item['text']; ?></a>
                                    <?php else: ?><?php echo $item['text']; ?><?php endif; ?>
                                    </li>

                                <?php endforeach; ?>

                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <?php include("_include/modules/footer.php"); ?>

    </body>
    </html>

