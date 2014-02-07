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

    <!-- start load cycle slideshow -->
    <link href="<?=$css_dir?>/jquery.cycle.css" rel="stylesheet" type="text/css" />
    <script src="<?=$js_dir?>/jquery.cycle.js" type="text/javascript"></script>
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
        $('.slide').click(function() {   $('#slideshow').cycle('pause'); 	 });
	});
 	</script>
    <!-- stop load cycle -->

</head>
<body>

<?php include("_include/modules/top.php"); ?>

<!-- start middle -->
<div class="middle">
<!-- start home -->
<div class="home">

   <!-- start header -->
   <div class="header">

        <!-- start slideshow -->
        <div id="slideshow">
                 <!-- start slide 1 -->

                 <!-- end slide -->

                 <!-- start slide 2 -->
                 <div class="slide header-image-left gradient-down-color">
                        <div class="full-width">
                            <div class="one-half">
                                <div class="rel images">
                                    <div class="bubble-one">
                                        <h2>FREE</h2>
                                        <h3>for Windows phone</h3>
                                        <p>ver.1.0</p>
                                    </div>
                                    <!--div class="bubble-two">
                                        <h2>FREE</h2>
                                        <h3>for iPhone</h3>
                                        <p>ver.2.20</p>
                                    </div-->
                                    <img src="<?=$img_dir?>/icons/wphones.png" width="349" height="466" alt="" />
                                </div>
                            </div>
                            <div class="one-half pt10">
                                        <h1>Sing any time, any where</h1>
                                        <h3 class="mb20">Integrate with Facebook</h3>
                                        <div class="faded-to-right"><!--  --></div>
                                        <div class="icon-to-right"><a href="#"  rel="prettyPhoto"><img src="<?=$img_dir?>/icons/song-lib.png" width="64" height="64" alt="" /></a><div class="small-play"><!--  --></div></div>
                                        <h4>Huge songs library</h4>
                                        <p class="limit">More than 20.000 English songs and 15.000 Vietnamese songs are waiting for you to explore.<br/> Every song is FREE and always be FREE</p>
                                        <div class="faded-to-right"><!--  --></div>
                                        <div class="icon-to-right"><a href="#"  rel="prettyPhoto"><img src="<?=$img_dir?>/icons/network.png" width="64" height="64" alt="" /></a><div class="small-plus"><!--  --></div></div>
                                        <h4>Sharing and Enjoying</h4>
                                        <p class="limit">Easy share to your friends your best records on Facebook. Music brings love to everyone.</p>
                                        <div class="faded-to-right"><!--  --></div>
                                        <div class="action-buttons clearfix">
                                            <!-- Remember trigger1_up , the orginal is trigger2_up, but missing trigger1 => download button doesn't work -->
                                            <a href="http://themeforest.net/item/apptastik-html/164769?ref=bogdanspn" id="trigger1_up" class="btn-big-action-fixed"><span><img src="<?=$img_dir?>/icons/button-arrow.png" width="30" height="30" alt=""/> Download App</span></a>
                                            <!--a href="http://themeforest.net/item/apptastik-html/164769?ref=bogdanspn" class="btn-big-neutral-fixed"><span>Learn More</span></a-->
                                            <div id="tip1_up" style="display:none;">
                                                <div class="tip" style="width:240px;">
                                                    <h4>Choose your platform:</h4>
                                                    <p>The application for other flatforms is beeing developed.</p>
                                                    <img src="<?=$img_dir?>/icons/download-small.png" width="16" height="16" alt="" class="vm"/>&nbsp;&nbsp;  for Windows phone: <a href="<?php echo BASE_URL . '/release/USS_Karaoke_1.0.xap'?>">USS Karaoke v.1.0</a><br/>
                                                    <!--<div class="separator"></div>
                                                    <img src="<?=$img_dir?>/icons/download-small.png" width="16" height="16" alt="" class="vm"/>&nbsp;&nbsp;  for Android: <a href="#">Lorem Ipsum v.2.02</a>
                                                    -->
                                                </div>
                                            </div>
                                        </div>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                 </div>
                 <!-- end slide 2-->

        </div>
        <!-- end slideshow -->

  </div>
  <!-- end header -->

  <!-- start slideshownav and controls -->
  <div class="gradient-up-darker-with-border">
     <div class="full-width">
          <!-- be sure when you add or delete a slide you need to make the nav reflect the number of slides  -->
          <ul id="slideshownav" class="clearfix">
              <li><a href="#"><img src="<?=$img_dir?>/misc/x.gif" width="16" height="16" alt="" /></a></li>
              <li><a href="#"><img src="<?=$img_dir?>/misc/x.gif" width="16" height="16" alt="" /></a></li>
              <li><a href="#"><img src="<?=$img_dir?>/misc/x.gif" width="16" height="16" alt="" /></a></li>
              <li><a href="#"><img src="<?=$img_dir?>/misc/x.gif" width="16" height="16" alt="" /></a></li>
              <li><a href="#"><img src="<?=$img_dir?>/misc/x.gif" width="16" height="16" alt="" /></a></li>
          </ul>

        <!-- start slideshowcontrol -->
        <div id="slideshowcontrol" class="clearfix">
              <div id="button_prev"><a href="#" id="slideshowprev"><img src="<?=$img_dir?>/misc/x.gif" width="17" height="21" alt="Prev" /></a></div>
              <div id="button_next"><a href="#" id="slideshownext"><img src="<?=$img_dir?>/misc/x.gif" width="17" height="21" alt="Next" /></a></div>
        </div>
        <!-- end slideshowcontrol -->
        <div class="clear"></div>
     </div>
  </div>
  <!-- end slideshownav and controls -->

  <!-- start features -->
  <div class="features gradient-up-with-border">
    <div class="full-width">
        <div class="two-third">
                         <h2>Some Features:</h2>
                         <ul class="feature-list mb0">
                            <li>
                                    <a href="#" class="icon"><img src="<?=$img_dir?>/icons/sing-offline.png" width="52" height="52" alt="" /></a>
                                    <div class="text">
                                        <h4><a href="#">Sing Offline</a></h4>
                                        <p>Download beat songs and sing later, even with no internet connection.</p>
                                        <a href="#" class="text-link">Learn More</a>
                                    </div>
                            </li>
                            <li class="last">
                                    <a href="#" class="icon"><img src="<?=$img_dir?>/icons/cloud.png" width="52" height="52" alt="" /></a>
                                    <div class="text">
                                        <h4><a href="#">Stable and Speed</a></h4>
                                        <p>Using cloud storage, USS Karaoke brings to you the best experiences, the reliability and fast loading speed.</p>
                                        <a href="#" class="text-link">Learn More</a>
                                    </div>
                            </li>
                            <li>
                                    <a href="#" class="icon"><img src="<?=$img_dir?>/icons/sharing.png" width="52" height="52" alt="" /></a>
                                    <div class="text">
                                        <h4><a href="#">Recording and sharing</a></h4>
                                        <p>Enjoy songs, sing and record your voice to keep your feeling. Let your friends know what you can't say.</p>
                                        <a href="#" class="text-link">Learn More</a>
                                    </div>
                            </li>
                            <li class="last">
                                    <a href="#" class="icon"><img src="<?=$img_dir?>/icons/free.png" width="52" height="52" alt="" /></a>
                                    <div class="text">
                                        <h4><a href="#">Up to date</a></h4>
                                        <p>Thousands free songs in multiple languages are always available and up to date, time by time.</p>
                                        <a href="#" class="text-link">Learn More</a>
                                    </div>
                            </li>
                        </ul>
                        <div class="clear"></div>
        </div>
        <div class="one-third">
                         <h2>Avaliable Platforms</h2>
                         <ul class="feature-list mb0">
                            <li class="last">
                                <h4 class="mb20">Our team is trying to develop this application in many platform. The first version is now available in Windows phone App store.
                                Android and iOS versions are comming soon.
                                </h4>
                                <!--<a href="#" class="btn-superbig-neutral" style="width:230px;"><span><b class="for-iphone"></b></span></a>-->
                                <a href="#" class="btn-superbig-neutral" style="width:230px;"><span><b class="for-wp"><!--  --></b></span></a>
                                <div class="center"><small>FREE, Version 1.0 - 01/02/2014</small></div>
                            </li>
                          </ul>
                          <div class="clear"></div>
        </div>
        <div class="clear"></div>

    </div>
  </div>
  <!-- end features -->

</div>
<!-- end home -->
</div>
<!-- end middle  -->

<?php include("_include/modules/footer.php"); ?>

</body>
</html>