<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php  $pagename="home-roundabout"; include_once("_include/modules/config.php"); ?>
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

    <!-- load roundabout  -->
    <link rel="stylesheet" href="<?=$css_dir?>/jquery.roundabout.css" type="text/css" media="screen" />
    <script type="text/javascript" src="<?=$js_dir?>/jquery.roundabout.js"></script>
    <script type="text/javascript" src="<?=$js_dir?>/jquery.roundabout-shapes-1.1.js"></script>
	<script type="text/javascript">
			//<![CDATA[
			$(document).ready(function() {
				var interval;
				$('#roundabout')
                .roundabout({
                    shape: 'lazySusan',
                    easing: 'swing',
                    minOpacity: 1,
                    minScale: 0.7,
                    duration: 500,
                    clickToFocus: true
                    })
					.hover(
						function() {  clearInterval(interval); },
						function() {  interval = startAutoPlay(); }
					);
				interval = startAutoPlay();
			});
			function startAutoPlay() {
				return setInterval(function() {
					$('#roundabout').roundabout_animateToNextChild();
				}, 3000);
			}
			//]]>
	</script>
    <!-- end roundabout  -->

</head>
<body>

<?php include("_include/modules/top.php"); ?>

<!-- start middle -->
<div class="middle">
<!-- start home  -->
<div class="home">

    <!-- start header -->
    <div class="slide header-center gradient-down-color">
                        <div class="full-width">
                            <div class="center">
                                      <h1>Mobile Autoplay Roundabout Huge Title Trixum it </h1>
                                      <h3 class="mb20">Connectivity lorem Facebook Lispum Dor</h3>
                            </div>
                            <div class="one-fourth left">
                                      <div class="faded-to-right"><!--  --></div>
                                      <div class="icon-to-left"><img src="<?=$img_dir?>/icons/wand.png" width="24" height="24" alt="" /></div>
                                      <h4>Connect lorem</h4>
                                      <p class="limit">Lorem ipsum dolor amet. Nunc in fermentum lorem. Cura bitur risus, nec euismod sit amet.</p>
                                      <div class="faded-to-right"><!--  --></div>
                                      <div class="icon-to-left"><img src="<?=$img_dir?>/icons/network.png" width="24" height="24" alt="" /></div>
                                      <h4>Sores Mitor</h4>
                                      <p class="limit">Lorem ipsum dolor sit amet, consectetur adipiscing. Curabitur eget orci risus, nec euismod orci.</p>
                                      <div class="faded-to-right"><!--  --></div>
                                      <div class="action-buttons-left clearfix">
                                             <a href="http://themeforest.net/item/apptastik-html/164769?ref=bogdanspn" class="btn-big-action-fixed"><span><img src="<?=$img_dir?>/icons/button-arrow.png" width="30" height="30" alt=""/> Get it For iPhone</span></a>
                                      </div>
                            </div>
                            <div class="two-fourth center rel" style="z-index:9;">
                                 <div class="roundabout">
                                      <ul id="roundabout">
                            			<li><img src="_include/images/icons/iphone4.png" alt="" /></li>
                            			<li><img src="_include/images/icons/htc-phone1.png"  alt="" /></li>
                            			<li><img src="_include/images/icons/iphone4.png"  alt="" /></li>
                                	  </ul>
                                 </div>
                                 <!-- start floating bubble 1 -->
                                 <div class="bubble-one-alt" style="z-index:9999;">
                                          <h2>FREE</h2>
                                          <h3>for iPhone</h3>
                                          <p>ver.2.20</p>
                                 </div>
                                 <!-- end floating bubble 1 -->
                                 <!-- start floating bubble 2 -->
                                 <div class="bubble-two" style="z-index:99999;">
                                          <h2>FREE</h2>
                                          <h3>for Android</h3>
                                          <p>ver.2.20</p>
                                 </div>
                                 <!-- end floating bubble 2 -->
                            </div>
                            <div class="one-fourth right">
                                        <div class="faded-to-left"><!--  --></div>
                                        <div class="icon-to-right"><img src="<?=$img_dir?>/icons/wand.png" width="24" height="24" alt="" /></div>
                                        <h4>Connect lorem</h4>
                                        <p class="limit">Lorem ipsum dolor amet, consectetur adipiscing elit. Cura bitur risus, nec euismod sit amet.</p>
                                        <div class="faded-to-left"><!--  --></div>
                                        <div class="icon-to-right"><img src="<?=$img_dir?>/icons/network.png" width="24" height="24" alt="" /></div>
                                        <h4>Sores Mitor</h4>
                                        <p class="limit">Lorem ipsum dolor sit amet, consectetur adipiscing, urabitur eget orci risus, nec euismod orci.</p>
                                        <div class="faded-to-right"><!--  --></div>
                                        <div class="action-buttons-right clearfix">
                                             <a href="http://themeforest.net/item/apptastik-html/164769?ref=bogdanspn" class="btn-big-action-fixed"><span><img src="<?=$img_dir?>/icons/button-arrow.png" width="30" height="30" alt=""/> Get it For Android</span></a>
                                        </div>
                            </div>
                        </div>
  </div>
  <!-- end header -->

  <!-- start boxes -->
  <div class="gradient-up-with-border pt30 pb20">
  <div class="full-width">
      <div class="one-fourth">
          <div class="outer-box"><div class="inner-box-filled-grey">
              <h3><a href="#">Lorem ipsum dolor sit</a></h3>
              <div class="image-to-center"><a href="<?=$img_dir?>/misc/picture1.jpg" class="picture-frame-fifth mb0" rel="prettyPhoto[gallery]"><img src="<?=$img_dir?>/misc/picture1.jpg" width="194" height="113" alt="Alt Caption Trouble" class="captify" /><span class="small-plus"><!--  --></span></a></div>
              <p>Maecenas purus libero, cursus ut dignissim in, cursus ut purus libero.</p>
              <a href="#" class="text-link">Learn More</a>
          </div></div>
      </div>
      <div class="one-fourth">
          <div class="outer-box"><div class="inner-box-filled-grey">
              <h3><a href="#">Lorem ipsum dolor sit</a></h3>
              <div class="image-to-center"><a href="<?=$img_dir?>/misc/picture1.jpg" class="picture-frame-fifth mb0" rel="prettyPhoto[gallery]"><img src="<?=$img_dir?>/misc/picture2.jpg" width="194" height="113" alt="Alt Caption Trouble" class="captify" /><span class="small-plus"><!--  --></span></a></div>
              <p>Maecenas purus libero, cursus ut dignissim in, cursus ut purus libero.</p>
              <a href="#" class="text-link">Learn More</a>
          </div></div>
      </div>
      <div class="one-fourth">
          <div class="outer-box"><div class="inner-box-filled-grey">
              <h3><a href="#">Lorem ipsum dolor sit</a></h3>
              <div class="image-to-center"><a href="<?=$img_dir?>/misc/picture1.jpg" class="picture-frame-fifth mb0" rel="prettyPhoto[gallery]"><img src="<?=$img_dir?>/misc/picture3.jpg" width="194" height="113" alt="Alt Caption Trouble"  class="captify" /><span class="small-plus"><!--  --></span></a></div>
              <p>Maecenas purus libero, cursus ut dignissim in, cursus ut purus libero.</p>
              <a href="#" class="text-link">Learn More</a>
          </div></div>
      </div>
      <div class="one-fourth">
          <div class="outer-box"><div class="inner-box-filled-grey">
              <h3><a href="#">Lorem ipsum dolor sit</a></h3>
              <div class="image-to-center"><a href="<?=$img_dir?>/misc/picture1.jpg" class="picture-frame-fifth mb0" rel="prettyPhoto[gallery]"><img src="<?=$img_dir?>/misc/picture4.jpg" width="194" height="113" alt="Alt Caption Trouble"  class="captify" /><span class="small-plus"><!--  --></span></a></div>
              <p>Maecenas purus libero, cursus ut dignissim in, cursus ut purus libero.</p>
              <a href="#" class="text-link">Learn More</a>
          </div></div>
      </div>
      <div class="clear"></div>
  </div>
  </div>
  <!-- end boxes -->

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
                                        <p>Maecenas purus libero, cursus ut dignissim in, cursus ut purus libero, adipiscing vel cursus ut dignissim enimut pur.</p>
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
        <div class="one-third-last">
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

</div>
<!-- end home -->
</div>
<!-- end middle -->

<?php include("_include/modules/footer.php"); ?>

</body>
</html>