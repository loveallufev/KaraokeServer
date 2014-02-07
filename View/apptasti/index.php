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
                 <!-- start slide -->
                 <div class="slide header-image-right gradient-down-color">
                      <div class="full-width">
                          <div class="one-half pt10">
                                      <h1>Mobile Lorem ditor Trixum it</h1>
                                      <h3 class="mb20">Connectivity lorem Facebook Lispum Dor</h3>
                                      <div class="faded-to-right"><!--  --></div>
                                      <div class="icon-to-left"><a href="http://www.youtube.com/watch?v=Jek0HCeFGy0"  rel="prettyPhoto"><img src="<?=$img_dir?>/icons/wand.png" width="64" height="64" alt="" /></a><div class="small-plus"><!--  --></div></div>
                                      <h4>Connect lorem misum</h4>
                                      <p class="limit">Lorem ipsum dolor amet, consectetur adipiscing elit. Nunc in fermentum lorem. Curabitur eget orci risus, nec euismod tortor dolor sit amet, consectetur.</p>
                                      <div class="faded-to-right"><!--  --></div>
                                      <div class="icon-to-left"><a href="<?=$img_dir?>/misc/pretty.jpg"  rel="prettyPhoto"><img src="<?=$img_dir?>/icons/network.png" width="64" height="64" alt="" /></a><div class="small-play"><!--  --></div></div>
                                      <h4>Sores Mitor</h4>
                                      <p class="limit">Lorem ipsum dolor sit amet, consectetur adipiscing, Nunc in fermentum lorem. Curabitur eget orci risus, nec euismod Curabitur eget orci.</p>
                                      <div class="faded-to-right"><!--  --></div>
                                      <div class="action-buttons clearfix">
                                            <a href="http://themeforest.net/item/apptastik-html/164769?ref=bogdanspn" id="trigger1_up" class="btn-big-action-fixed"><span><img src="<?=$img_dir?>/icons/button-arrow.png" width="30" height="30" alt=""/> Download App</span></a>
                                            <a href="http://themeforest.net/item/apptastik-html/164769?ref=bogdanspn" class="btn-big-neutral-fixed"><span>Learn More</span></a>

                                            <div id="tip1_up" style="display:none;">
                                                <div class="tip" style="width:240px;">
                                                    <h4>Nunc in fermentum</h4>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing</p>
                                                    <img src="<?=$img_dir?>/icons/download-small.png" width="16" height="16" alt="" class="vm"/>&nbsp;&nbsp;  for iPhone: <a href="#">Lorem Ipsum v.2.02</a><br/>
                                                    <div class="separator"><!--  --></div>
                                                    <img src="<?=$img_dir?>/icons/download-small.png" width="16" height="16" alt="" class="vm"/>&nbsp;&nbsp;  for Android: <a href="#">Lorem Ipsum v.2.02</a>
                                                </div>
                                            </div>
                                      </div>
                              <div class="clear"></div>
                          </div>
                          <div class="one-half">
                              <div class="rel images">
                                  <div class="bubble-one">
                                      <h2>FREE</h2>
                                      <h3>for Android</h3>
                                      <p>ver.2.20</p>
                                  </div>
                                  <div class="bubble-two">
                                      <h2>FREE</h2>
                                      <h3>for iPhone</h3>
                                      <p>ver.2.20</p>
                                  </div>
                                  <img src="<?=$img_dir?>/icons/phones.png"  alt="" />
                              </div>
                          </div>
                          <div class="clear"></div>
                      </div>
                 </div>
                 <!-- end slide -->

                 <!-- start slide -->
                 <div class="slide header-image-left gradient-down-color">
                        <div class="full-width">
                            <div class="one-half">
                                <div class="rel images">
                                    <div class="bubble-one">
                                        <h2>FREE</h2>
                                        <h3>for Android</h3>
                                        <p>ver.2.20</p>
                                    </div>
                                    <div class="bubble-two">
                                        <h2>FREE</h2>
                                        <h3>for iPhone</h3>
                                        <p>ver.2.20</p>
                                    </div>
                                    <img src="<?=$img_dir?>/icons/iphones.png" width="349" height="466" alt="" />
                                </div>
                            </div>
                            <div class="one-half pt10">
                                        <h1>Mobile Lorem ditor Trixum it</h1>
                                        <h3 class="mb20">Connectivity lorem Facebook Lispum Dor</h3>
                                        <div class="faded-to-right"><!--  --></div>
                                        <div class="icon-to-right"><a href="http://www.youtube.com/watch?v=Jek0HCeFGy0"  rel="prettyPhoto"><img src="<?=$img_dir?>/icons/wand.png" width="64" height="64" alt="" /></a><div class="small-play"><!--  --></div></div>
                                        <h4>Connect lorem misum</h4>
                                        <p class="limit">Lorem ipsum dolor amet, consectetur adipiscing elit. Nunc in fermentum lorem. Curabitur eget orci risus, nec euismod tortor dolor sit amet, consectetur.</p>
                                        <div class="faded-to-right"><!--  --></div>
                                        <div class="icon-to-right"><a href="<?=$img_dir?>/misc/pretty.jpg"  rel="prettyPhoto"><img src="<?=$img_dir?>/icons/network.png" width="64" height="64" alt="" /></a><div class="small-plus"><!--  --></div></div>
                                        <h4>Sores Mitor</h4>
                                        <p class="limit">Lorem ipsum dolor sit amet, consectetur adipiscing, Nunc in fermentum lorem. Curabitur eget orci risus, nec euismod Curabitur eget orci.</p>
                                        <div class="faded-to-right"><!--  --></div>
                                        <div class="action-buttons clearfix">
                                            <a href="http://themeforest.net/item/apptastik-html/164769?ref=bogdanspn" id="trigger2_up" class="btn-big-action-fixed"><span><img src="<?=$img_dir?>/icons/button-arrow.png" width="30" height="30" alt=""/> Download App</span></a>
                                            <a href="http://themeforest.net/item/apptastik-html/164769?ref=bogdanspn" class="btn-big-neutral-fixed"><span>Learn More</span></a>
                                            <div id="tip2_up" style="display:none;">
                                                <div class="tip" style="width:240px;">
                                                    <h4>Nunc in fermentum</h4>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing</p>
                                                    <img src="<?=$img_dir?>/icons/download-small.png" width="16" height="16" alt="" class="vm"/>&nbsp;&nbsp;  for iPhone: <a href="#">Lorem Ipsum v.2.02</a><br/>
                                                    <div class="separator"><!--  --></div>
                                                    <img src="<?=$img_dir?>/icons/download-small.png" width="16" height="16" alt="" class="vm"/>&nbsp;&nbsp;  for Android: <a href="#">Lorem Ipsum v.2.02</a>
                                                </div>
                                            </div>
                                        </div>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                 </div>
                 <!-- end slide -->


                 <!-- start slide -->
                 <div class="slide header-image-left gradient-down-color">
                        <div class="full-width">
                            <div class="one-half">
                                <div class="rel images">
                                    <div class="bubble-one">
                                        <h2>FREE</h2>
                                        <h3>for Android</h3>
                                        <p>ver.2.20</p>
                                    </div>
                                    <div class="bubble-two">
                                        <h2>FREE</h2>
                                        <h3>for iPhone</h3>
                                        <p>ver.2.20</p>
                                    </div>
                                    <img src="<?=$img_dir?>/icons/ipads.png" alt="" />
                                </div>
                            </div>
                            <div class="one-half pt10">
                                        <h1>Mobile Lorem ditor Trixum it</h1>
                                        <h3 class="mb20">Connectivity lorem Facebook Lispum Dor</h3>
                                        <div class="faded-to-right"><!--  --></div>
                                        <div class="icon-to-right"><a href="http://www.youtube.com/watch?v=Jek0HCeFGy0"  rel="prettyPhoto"><img src="<?=$img_dir?>/icons/wand.png" width="64" height="64" alt="" /></a><div class="small-play"><!--  --></div></div>
                                        <h4>Connect lorem misum</h4>
                                        <p class="limit">Lorem ipsum dolor amet, consectetur adipiscing elit. Nunc in fermentum lorem. Curabitur eget orci risus, nec euismod tortor dolor sit amet, consectetur.</p>
                                        <div class="faded-to-right"><!--  --></div>
                                        <div class="icon-to-right"><a href="<?=$img_dir?>/misc/pretty.jpg"  rel="prettyPhoto"><img src="<?=$img_dir?>/icons/network.png" width="64" height="64" alt="" /></a><div class="small-plus"><!--  --></div></div>
                                        <h4>Sores Mitor</h4>
                                        <p class="limit">Lorem ipsum dolor sit amet, consectetur adipiscing, Nunc in fermentum lorem. Curabitur eget orci risus, nec euismod Curabitur eget orci.</p>
                                        <div class="faded-to-right"><!--  --></div>
                                        <div class="action-buttons clearfix">
                                            <a href="http://themeforest.net/item/apptastik-html/164769?ref=bogdanspn" id="trigger3_up" class="btn-big-action-fixed"><span><img src="<?=$img_dir?>/icons/button-arrow.png" width="30" height="30" alt=""/> Download App</span></a>
                                            <a href="http://themeforest.net/item/apptastik-html/164769?ref=bogdanspn" class="btn-big-neutral-fixed"><span>Learn More</span></a>
                                            <div id="tip3_up" style="display:none;">
                                                <div class="tip" style="width:240px;">
                                                    <h4>Nunc in fermentum</h4>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing</p>
                                                    <img src="<?=$img_dir?>/icons/download-small.png" width="16" height="16" alt="" class="vm"/>&nbsp;&nbsp;  for iPhone: <a href="#">Lorem Ipsum v.2.02</a><br/>
                                                    <div class="separator"><!--  --></div>
                                                    <img src="<?=$img_dir?>/icons/download-small.png" width="16" height="16" alt="" class="vm"/>&nbsp;&nbsp;  for Android: <a href="#">Lorem Ipsum v.2.02</a>
                                                </div>
                                            </div>
                                        </div>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                 </div>
                 <!-- end slide -->


                 <!-- start slide -->
                 <div class="slide header-center gradient-down-color">
                        <div class="full-width">
                            <div class="center">
                                      <h1>Mobile Lorem ditor Huge Title Trixum it </h1>
                                      <h3 class="mb20">Connectivity lorem Facebook Lispum Dor</h3>
                            </div>
                            <div class="one-fourth left">
                                      <div class="faded-to-right"><!--  --></div>
                                      <div class="icon-to-left"><img src="<?=$img_dir?>/icons/wand.png" width="24" height="24" alt="" /></div>
                                      <h4>Connect lorem</h4>
                                        <div class="clear"></div>
                                      <p class="limit">Lorem ipsum dolor amet. Nunc in fermentum lorem. Cura bitur risus, nec euismod sit amet.</p>
                                      <div class="faded-to-right"><!--  --></div>
                                      <div class="icon-to-left"><img src="<?=$img_dir?>/icons/network.png" width="24" height="24" alt="" /></div>
                                      <h4>Sores Mitor</h4>
                                      <div class="clear"></div>
                                      <p class="limit">Lorem ipsum dolor sit amet, consectetur adipiscing. Curabitur eget orci risus, nec euismod orci.</p>
                                      <div class="faded-to-right"><!--  --></div>
                                      <div class="action-buttons-left clearfix">
                                             <a href="http://themeforest.net/item/apptastik-html/164769?ref=bogdanspn" class="btn-big-action-fixed"><span><img src="<?=$img_dir?>/icons/button-arrow.png" width="30" height="30" alt=""/> Get it For iPhone</span></a>
                                      </div>
                            </div>
                            <div class="two-fourth center rel">
                                    <div class="bubble-one-alt">
                                        <h2>FREE</h2>
                                        <h3>for iPhone</h3>
                                        <p>ver.2.20</p>
                                    </div>
                                    <div class="bubble-two">
                                        <h2>FREE</h2>
                                        <h3>for Android</h3>
                                        <p>ver.2.20</p>
                                    </div>
                                <img src="<?=$img_dir?>/icons/multiple-phones-center.png" alt="" class="mt10"/>
                            </div>
                            <div class="one-fourth right">
                                        <div class="faded-to-left"><!--  --></div>
                                        <div class="icon-to-right pt0 mt0"><img src="<?=$img_dir?>/icons/wand.png" width="24" height="24" alt="" /></div>
                                        <h4>Connect lorem</h4>
                                        <div class="clear"></div>
                                        <p class="limit">Lorem ipsum dolor amet, consectetur adipiscing elit. Cura bitur risus, nec euismod sit amet.</p>
                                        <div class="faded-to-left"><!--  --></div>
                                        <div class="icon-to-right pt0 mt0"><img src="<?=$img_dir?>/icons/network.png" width="24" height="24" alt="" /></div>
                                        <h4>Sores Mitor</h4>
                                        <div class="clear"></div>
                                        <p class="limit">Lorem ipsum dolor sit amet, consectetur adipiscing, urabitur eget orci risus, nec euismod orci.</p>
                                        <div class="faded-to-right"><!--  --></div>
                                        <div class="action-buttons-right clearfix">
                                             <a href="http://themeforest.net/item/apptastik-html/164769?ref=bogdanspn" class="btn-big-action-fixed"><span><img src="<?=$img_dir?>/icons/button-arrow.png" width="30" height="30" alt=""/> Get it For Android</span></a>
                                        </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                 </div>
                 <!-- end slide -->

                 <!-- start slide -->
                 <div class="slide header-center gradient-down-color">
                        <div class="full-width">
                            <div class="center">
                                      <h1>Mobile Lorem ditor Huge Title Trixum it </h1>
                                      <h3 class="mb20">Connectivity lorem Facebook Lispum Dor</h3>
                            </div>
                            <div class="one-fourth left">
                                      <div class="faded-to-right"><!--  --></div>
                                      <div class="icon-to-left pt0 mt0"><img src="<?=$img_dir?>/icons/wand.png" width="24" height="24" alt="" /></div>
                                      <h4>Connect lorem</h4>
                                      <div class="clear"></div>
                                      <p class="limit">Lorem ipsum dolor amet. Nunc in fermentum lorem. Cura bitur risus, nec euismod sit amet.</p>
                                      <div class="faded-to-right"><!--  --></div>
                                      <div class="icon-to-left pt0 mt0"><img src="<?=$img_dir?>/icons/network.png" width="24" height="24" alt="" /></div>
                                      <h4>Sores Mitor</h4>
                                      <div class="clear"></div>
                                      <p class="limit">Lorem ipsum dolor sit amet, consectetur adipiscing. Curabitur eget orci risus, nec euismod orci.</p>
                                      <div class="faded-to-right"><!--  --></div>
                                      <div class="action-buttons-left clearfix">
                                             <a href="http://themeforest.net/item/apptastik-html/164769?ref=bogdanspn" class="btn-big-action-fixed"><span><img src="<?=$img_dir?>/icons/button-arrow.png" width="30" height="30" alt=""/> Get it For Win</span></a>
                                      </div>
                            </div>
                            <div class="two-fourth center rel">
                                    <div class="bubble-one-alt">
                                        <h2>FREE</h2>
                                        <h3>for Windows</h3>
                                        <p>ver.2.20</p>
                                    </div>
                                    <div class="bubble-two">
                                        <h2>FREE</h2>
                                        <h3>for Mac</h3>
                                        <p>ver.2.20</p>
                                    </div>
                                <img src="<?=$img_dir?>/icons/air.png" alt="" class="mt10"/>
                            </div>
                            <div class="one-fourth right">
                                        <div class="faded-to-left"><!--  --></div>
                                        <div class="icon-to-right pt0 mt0"><img src="<?=$img_dir?>/icons/wand.png" width="24" height="24" alt="" /></div>
                                        <h4>Connect lorem</h4>
                                        <div class="clear"></div>
                                        <p class="limit">Lorem ipsum dolor amet, consectetur adipiscing elit. Cura bitur risus, nec euismod sit amet.</p>
                                        <div class="faded-to-left"><!--  --></div>
                                        <div class="icon-to-right pt0 mt0"><img src="<?=$img_dir?>/icons/network.png" width="24" height="24" alt="" /></div>
                                        <h4>Sores Mitor</h4>
                                        <div class="clear"></div>
                                        <p class="limit">Lorem ipsum dolor sit amet, consectetur adipiscing, urabitur eget orci risus, nec euismod orci.</p>
                                        <div class="faded-to-right"><!--  --></div>
                                        <div class="action-buttons-right clearfix">
                                             <a href="http://themeforest.net/item/apptastik-html/164769?ref=bogdanspn" class="btn-big-action-fixed"><span><img src="<?=$img_dir?>/icons/button-arrow.png" width="30" height="30" alt=""/> Get it For Mac</span></a>
                                        </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                 </div>
                 <!-- end slide -->

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
                         <h2>Some Features Connecätiveus</h2>
                         <ul class="feature-list mb0">
                            <li>
                                    <a href="#" class="icon"><img src="<?=$img_dir?>/icons/tools.png" width="52" height="52" alt="" /></a>
                                    <div class="text">
                                        <h4><a href="#">Lorem ipsum dolor sit</a></h4>
                                        <p>Maecenas purus libero, cursus ut dignissim in, cursus ut purus libero, adipiscing vel cursus ut dignissim enim ut pur.</p>
                                        <a href="#" class="text-link">Learn More</a>
                                    </div>
                            </li>
                            <li class="last">
                                    <a href="#" class="icon"><img src="<?=$img_dir?>/icons/id.png" width="52" height="52" alt="" /></a>
                                    <div class="text">
                                        <h4><a href="#">Ut quis mauris at</a></h4>
                                        <p>Maecenas purus libero, cursus ut dignissim in, cursus ut purus libero, adipiscing vel cursus ut dignissim enimut pur.</p>
                                        <a href="#" class="text-link">Learn More</a>
                                    </div>
                            </li>
                            <li>
                                    <a href="#" class="icon"><img src="<?=$img_dir?>/icons/key.png" width="52" height="52" alt="" /></a>
                                    <div class="text">
                                        <h4><a href="#">Lorem ipsum dolor sit</a></h4>
                                        <p>Maecenas purus libero, cursus ut dignissim in, cursus ut cursus ut dignissim purus libero, adipiscing vel enim.</p>
                                        <a href="#" class="text-link">Learn More</a>
                                    </div>
                            </li>
                            <li class="last">
                                    <a href="#" class="icon"><img src="<?=$img_dir?>/icons/recycle.png" width="52" height="52" alt="" /></a>
                                    <div class="text">
                                        <h4><a href="#">Ut quis mauris at</a></h4>
                                        <p>Maecenas purus libero, cursus ut dignissim in, cursus ut purus libero, cursus ut dignissim adipiscing vel enim.</p>
                                        <a href="#" class="text-link">Learn More</a>
                                    </div>
                            </li>
                        </ul>
                        <div class="clear"></div>
        </div>
        <div class="one-third">
                         <h2>Avaliable Lorem Bis</h2>
                         <ul class="feature-list mb0">
                            <li class="last">
                                <h4 class="mb20">Morbi interdum mollis leo id situ suscipit. Aenean risus quam, it volutpat eu tristique vitae.</h4>
                                <a href="#" class="btn-superbig-neutral" style="width:230px;"><span><b class="for-iphone"><!--  --></b></span></a>
                                <a href="#" class="btn-superbig-neutral" style="width:230px;"><span><b class="for-android"><!--  --></b></span></a>
                                <div class="center"><small>FREE, Version 2.02 - 02/02/2010</small></div>
                            </li>
                          </ul>
                          <div class="clear"></div>
        </div>
        <div class="clear"></div>

    </div>
  </div>
  <!-- end features -->

  <!-- start testimonials -->
  <div class="white">
     <div class="full-width mb20">
                <div class="mb20 hr"><!--  --></div>
                <div class="one-fourth">
                  <h4 class="mb20">Lorem ipsum dolor sit amet maecenas...</h4>
                  <img src="<?=$img_dir?>/icons/users.png" width="126"  alt="" />
                </div>
                <div class="one-fourth">
                  <blockquote><div class="icon-to-left"><img src="<?=$img_dir?>/icons/quotes.png" alt="" /></div><p>Maecenas purus libero leo id situ suscipit, leo id situ suscipit cursus ut dignissim in, cursus ut purus libero, adipiscing vel enim.</p><div class="clear"></div></blockquote>
                  <cite>John Doe, Lorem</cite>
                </div>
                <div class="one-fourth">
                  <blockquote><div class="icon-to-left"><img src="<?=$img_dir?>/icons/quotes.png" alt="" /></div><p>Maecenas purus libero, cursus ut dignissim in, cursus ut purus libero, adipiscing vel enim.</p><div class="clear"></div></blockquote>
                  <cite>John Doe, Lorem</cite>
                </div>
                <div class="one-fourth">
                  <blockquote><div class="icon-to-left"><img src="<?=$img_dir?>/icons/quotes.png" alt="" /></div><p>Maecenas purus libero, cursus ut leo id situ suscipit leo id situ suscipit dignissim in, cursus ut purus libero, adipiscing vel enim.</p><div class="clear"></div></blockquote>
                  <cite>John Doe, Lorem</cite>
                </div>
                <div class="clear"></div>

     </div>
  </div>
  <!-- end testimonials -->



</div>
<!-- end home -->
</div>
<!-- end middle  -->

<?php include("_include/modules/footer.php"); ?>

</body>
</html>