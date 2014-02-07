<!-- start style switcher -->
<script type="text/javascript">
$(document).ready(function(){
	$(".trigger").click(function(){
		$(".style-switcher-body").toggle("fast");
		$(this).toggleClass("active");
		return false;
	});
});
</script>
<div class="style-switcher clearfix">
        <div class="style-switcher-toggler">
             <a class="trigger" href="#"><img src="<?=$img_dir?>/misc/x.gif" width="30" height="123" alt="" /></a>
        </div>
        <div class="style-switcher-body">
            <h4>Choose a Color</h4>
            <ul class="clearfix">
                <li><a href="javascript:chooseStyle('pink', 60)"><img src="<?=$img_dir?>/misc/color-pink.png" alt="pink" /></a></li>
                <li><a href="javascript:chooseStyle('green', 60)"><img src="<?=$img_dir?>/misc/color-green.png" alt="green" /></a></li>
                <li><a href="javascript:chooseStyle('orange', 60)"><img src="<?=$img_dir?>/misc/color-orange.png" alt="orange" /></a></li>
                <li><a href="javascript:chooseStyle('pink-dark', 60)"><img src="<?=$img_dir?>/misc/color-pink-dark.png" alt="pink-dark" /></a></li>
                <li><a href="javascript:chooseStyle('green-dark', 60)"><img src="<?=$img_dir?>/misc/color-green-dark.png" alt="green-dark" /></a></li>
                <li><a href="javascript:chooseStyle('orange-dark', 60)"><img src="<?=$img_dir?>/misc/color-orange-dark.png" alt="orange-dark" /></a></li>
            </ul>
        </div>
</div>
<!-- end style switcher -->

<!-- start top -->
<div class="top">
    <div class="full-width rel">
        <div class="one-third"><div class="logo"><a href="<?=$site_dir?>"><img src="<?=$img_dir?>/misc/logo.png" alt="<?=$site_name?>" /></a></div></div>
        <div class="two-third">
            <div class="rel">
                <div class="abs utility">
                    <div class="icon-to-left"><img src="<?=$img_dir?>/icons/smallphone.png" alt="" /></div>Give us a Call: <strong>1-800-APTSTIK</strong> or <a href="#">E-mail Us</a> Directly.<div class="clear"></div>
                </div>
            </div>
            <div class="mainmenu">
            <ul>
                <li <?php if( $pagename=="home" ) { ?>class="active"<?php } else { ?><?php } ?>><a href="index.php"><span>Home</span></a></li>
                <li <?php if( $pagename=="home-static" ) { ?>class="active"<?php } else { ?><?php } ?>><a href="index-static.php"><span>Static</span></a></li>
                <li <?php if( $pagename=="home-roundabout" ) { ?>class="active"<?php } else { ?><?php } ?>><a href="index-roundabout.php"><span>Roundabout</span></a></li>
                <li <?php if( $pagename=="features" ) { ?>class="active"<?php } else { ?><?php } ?>><a href="features.php"><span>Features</span></a></li>
                <li <?php if( $pagename=="pricing" ) { ?>class="active"<?php } else { ?><?php } ?>><a href="pricing.php"><span>Pricing</span></a></li>                
                <li <?php if( $pagename=="faq" ) { ?>class="active"<?php } else { ?><?php } ?>><a href="faq.php"><span>FAQ</span></a></li>
                <li <?php if( $pagename=="contact" ) { ?>class="active"<?php } else { ?><?php } ?>><a href="contact.php"><span>Contact</span></a></li>
            </ul>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<!-- end top -->