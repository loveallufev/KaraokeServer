<!-- start top -->
<div class="top">
    <div class="full-width rel">
        <div class="one-third"><div class="logo"><a href="<?=$site_dir?>"><img src="<?=$img_dir?>/misc/logo.png" alt="<?=$site_name?>" /></a></div></div>
        <div class="two-third">
            <!--
            <div class="rel">
                <div class="abs utility">
                    <div class="icon-to-left"><img src="<?=$img_dir?>/icons/smallphone.png" alt="" /></div>Give us a Call: <strong>1-800-APTSTIK</strong> or <a href="#">E-mail Us</a> Directly.<div class="clear"></div>
                </div>
            </div>
            -->
            <div class="mainmenu">
            <ul>
                <!--
                <li <?php if( $pagename=="home" ) { ?>class="active"<?php } else { ?><?php } ?>><a href="index.php"><span>Home</span></a></li>
                <li <?php if( $pagename=="home-static" ) { ?>class="active"<?php } else { ?><?php } ?>><a href="index-static.php"><span>Static</span></a></li>
                <li <?php if( $pagename=="home-roundabout" ) { ?>class="active"<?php } else { ?><?php } ?>><a href="index-roundabout.php"><span>Roundabout</span></a></li>
                <li <?php if( $pagename=="features" ) { ?>class="active"<?php } else { ?><?php } ?>><a href="features.php"><span>Features</span></a></li>
                <li <?php if( $pagename=="pricing" ) { ?>class="active"<?php } else { ?><?php } ?>><a href="pricing.php"><span>Pricing</span></a></li>                
                <li <?php if( $pagename=="faq" ) { ?>class="active"<?php } else { ?><?php } ?>><a href="faq.php"><span>FAQ</span></a></li>
                <li <?php if( $pagename=="contact" ) { ?>class="active"<?php } else { ?><?php } ?>><a href="contact.php"><span>Contact</span></a></li>
                -->

                <li <?php if( $pagename=="home" ) { ?>class="active"<?php } else { ?><?php } ?>><a href="<?php echo BASE_URL . DS; ?>index.php"><span>Home</span></a></li>
                <li <?php if( $pagename=="screenshot" ) { ?>class="active"<?php } else { ?><?php } ?>><a href="<?php echo BASE_URL . DS; ?>index.php/gallery"><span>Screenshots</span></a></li>
                <li <?php if( $pagename=="contact" ) { ?>class="active"<?php } else { ?><?php } ?>><a href="<?php echo BASE_URL . DS; ?>index.php/contact"><span>Contact</span></a></li>

            </ul>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<!-- end top -->