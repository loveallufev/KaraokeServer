<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php  $pagename="faq";  include_once("_include/modules/config.php"); ?>
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
<div class="middle">
  <!-- start inner -->
  <div class="inner">

    <!-- IE 6 Needs this -->
    <div class="full-width">
        <div class="two-third">
                            <h1>Frequently Asked Questions</h1>
                            <h4 class="mb20">Maecenas purus libero, cur cursus ut <a href="#">purus libero sus</a> ut dignissim in, cursus ut purus libero, adipiscing vel enim.</h4>

                            <p>Aenean sollicitudin interdum vestibulum. Cras libero diam, fermentum in pretium non, bibendum aliquet magna. Cras vitae sapien in est fermentum mollis eu vitae elit. Sed leo odio, volutpat vel fringilla nec, mattis nec urna.</p>

                            <!-- faq accordion -->
                            <div class="accordion-faq">

                            	<span class="current">Fusce semper, nisi nec pellentesque sollicitudin bibendum</span>
                            	<div class="pane" style="display:block">
                            		<p>Fusce semper, nisi nec pellentesque sollicitudin bibendum eros ac nulla. Praesent bibendum eros ac nulla. Integer vel lacus ac neque viverra ornare. Nulla id massa nec erat laoreet elementum. Vivamus tristique auctor odio. Integer mi neque.</p>

                                    <div class="half-this">
                                         <ul>
                                            <li>Pellentesque sollicitudin bibendum eros</li>
                                            <li>Praesent bibendum eros ac nulla</li>
                                            <li>Integer vel lacus ac neque viverra</li>
                                            <li>Aliquam erat volutpat</li>
                                         </ul>
                                    </div>
                                    <div class="half-this-last">
                                         <ul>
                                            <li>Pellentesque sollicitudin bibendum eros</li>
                                            <li>Praesent bibendum eros ac nulla</li>
                                            <li>Integer vel lacus ac neque viverra</li>
                                            <li>Aliquam erat volutpat</li>
                                         </ul>
                                    </div>
                                    <div class="clear"></div>

                            		<p>Consectetur adipiscing elit. Praesent bibendum eros ac nulla. Integer vel lacus ac neque viverra ornare. Nulla id massa nec erat laoreet elementum. Vivamus tristique auctor odio. Integer mi neque.</p>
                            	</div>

                            	<span>In mauris odio, fringilla commodo, commodo ac, dignissim</span>
                            	<div class="pane">
                            		<p>Cras diam. Donec dolor lacus, vestibulum at, varius in, mollis id, dolor. Aliquam erat volutpat. Praesent pretium tristique est. Maecenas nunc lorem, blandit nec, accumsan nec, facilisis quis, pede. Aliquam erat volutpat. Donec sit amet urna quis nisi elementum fermentum.</p>
                            	</div>

                            	<span>Nulla hendrerit, felis quis elementum viverra</span>
                            	<div class="pane">
                            		<p>Non lectus lacinia egestas. Nulla hendrerit, felis quis elementum viverra, purus felis egestas magna, non vulputate libero justo nec sem. Nullam arcu. Donec pellentesque vestibulum urna. In mauris odio, fringilla commodo, commodo ac, dignissim ac, augue.</p>
                            	</div>

                            	<span>Fusce semper, nisi nec pellentesque sollicitudin bibendum</span>
                            	<div class="pane" style="display:block">
                            		<p>Fusce semper, nisi nec pellentesque sollicitudin bibendum eros ac nulla. Praesent bibendum eros ac nulla. Integer vel lacus ac neque viverra ornare. Nulla id massa nec erat laoreet elementum. Vivamus tristique auctor odio. Integer mi neque.</p>
                            		<p>Consectetur adipiscing elit. Praesent bibendum eros ac nulla. Integer vel lacus ac neque viverra ornare. Nulla id massa nec erat laoreet elementum. Vivamus tristique auctor odio. Integer mi neque.</p>
                            	</div>

                            	<span>In mauris odio, fringilla commodo, commodo ac, dignissim</span>
                            	<div class="pane">
                            		<p>Cras diam. Donec dolor lacus, vestibulum at, varius in, mollis id, dolor. Aliquam erat volutpat. Praesent pretium tristique est. Maecenas nunc lorem, blandit nec, accumsan nec, facilisis quis, pede. Aliquam erat volutpat. Donec sit amet urna quis nisi elementum fermentum.</p>
                            	</div>

                            	<span>Nulla hendrerit, felis quis elementum viverra</span>
                            	<div class="pane">
                            		<p>Non lectus lacinia egestas. Nulla hendrerit, felis quis elementum viverra, purus felis egestas magna, non vulputate libero justo nec sem. Nullam arcu. Donec pellentesque vestibulum urna. In mauris odio, fringilla commodo, commodo ac, dignissim ac, augue.</p>
                            	</div>

                            </div>
                            <!-- end faq accordion -->

        </div>
        <div class="one-third">
            <div class="outer-rounded-box-bold">
                <div class="simple-rounded-box">
                    <form action="send.php" method="post" class="search">
                    <table cellpadding="0" cellspacing="0" width="100%">
                      <tr>
                        <td class="left"><input value="Search" name="search" id="search" class="searchfield" onblur="if (this.value == '') {this.value = 'Search';}" onfocus="if (this.value == 'Search') {this.value = '';}"/></td>
                        <td>&nbsp;</td>
                        <td><a href="#" class="btn-small-action"><span>Search</span></a><div class="clear"></div></td>
                      </tr>
                    </table>
                    </form>
                </div>
            </div>
            <div class="outer-box">
                <div class="inner-box-filled-grey clearfix">
                    <div class="icon-to-left"><img src="<?=$img_dir?>/icons/key.png" width="24" height="24" alt="" /></div>
                    <h3>An Square Box Here</h3>
                    <p>Pellentesque tincidunt eleifend ultricies. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                    <ol>
                        <li>Pellentesque tincidunt eleifend</li>
                        <li>Ultricies um sociis natoque penatibus</li>
                        <li>Et magnis dis parturient montes</li>
                        <li>Ascetur ridiculus mus</li>
                    </ol>
                </div>
            </div>
            <div class="outer-rounded-box">
                <div class="inner-rounded-box-filled-grey clearfix">
                    <div class="icon-to-left"><img src="<?=$img_dir?>/icons/network.png" width="24" height="24" alt="" /></div>
                    <h3>Or Rounded Box There</h3>
                    <p>Pellentesque tincidunt eleifend ultricies. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                    <ul>
                        <li>Pellentesque tincidunt eleifend</li>
                        <li>Ultricies um sociis natoque penatibus</li>
                        <li>Et magnis dis parturient montes</li>
                        <li>Ascetur ridiculus mus</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="clear"></div>

    </div>

  </div>
  <!-- end inner -->
</div>
<!-- end middle -->

<?php include("_include/modules/footer.php"); ?>

</body>
</html>