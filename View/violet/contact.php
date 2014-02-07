<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php  $pagename="contact"; include_once("_include/modules/config.php"); ?>
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

    <!-- start form validation -->
    <script type="text/javascript">
    //<![CDATA[
      $(document).ready(function() {
      	$('form#contactForm').submit(function() {
      		$('form#contactForm .error').remove();
      		var hasError = false;
      		$('.requiredField').each(function() {
      			if(jQuery.trim($(this).val()) == '') {
                  	var labelText = $(this).prev('label').text();
                  	$(this).parent().append('<span class="error">You forgot to enter your '+labelText+'.</span>');
                  	$(this).addClass('inputError');
                  	hasError = true;
                  } else if($(this).hasClass('email')) {
                  	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                  	if(!emailReg.test(jQuery.trim($(this).val()))) {
                  		var labelText = $(this).prev('label').text();
                  		$(this).parent().append('<span class="error">You entered an invalid '+labelText+'.</span>');
                  		$(this).addClass('inputError');
                  		hasError = true;
                  	}
                  }
      		});
      		if(!hasError) {
      			$('form#contactForm li.buttons button').fadeOut('normal', function() {
      				$(this).parent().append('<img src="<?=$img_dir?>/misc/loader.gif" alt="Loading..." height="31" width="31" />');
      			});
      			var formInput = $(this).serialize();
      			$.post($(this).attr('action'),formInput, function(data){
      				$('form#contactForm').slideUp("fast", function() {
      					$(this).before('<p class="success"><strong>Thanks!</strong> Your email was successfully sent. I check my email all the time, so I should be in touch soon.</p>');
      				});
      			});
      		}

      		return false;

      	});
      });
    //]]>
    </script>
    <!-- end form validation -->

</head>
<body>

<?php include("_include/modules/top.php"); ?>

<!-- start middle -->
<div class="middle" style="min-height: 580px;">
  <!-- start inner -->
  <div class="inner gradient-down">

    <!-- IE 6 Needs this -->
    <div class="full-width">

        <div class="one-half pb10">
                <h1>Our information:</h1>
                <h4 class="mb20">
                    Uranus Software Solution (USS) is a small, independent team in Vietnam. We focus on developing mobile and web applications.
                    <br/> USS Karaoke is the first our app.
                </h4>
                         <div class="clear"></div>

                         <div id="inline-1" style="display:none; width:500px; height:370px;">
                              <object width="498" height="350" data="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Weiden,+Germany&amp;sll=37.0625,-95.677068&amp;sspn=42.766543,79.453125&amp;ie=UTF8&amp;hq=&amp;hnear=Weiden,+Weiden+in+der+Oberpfalz,+Bavaria,+Germany&amp;z=12&amp;ll=49.674984,12.160652&amp;output=embed"></object><br /><small><a href="http://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Weiden,+Germany&amp;sll=37.0625,-95.677068&amp;sspn=42.766543,79.453125&amp;ie=UTF8&amp;hq=&amp;hnear=Weiden,+Weiden+in+der+Oberpfalz,+Bavaria,+Germany&amp;z=12&amp;ll=49.674984,12.160652" style="color:#0000FF;text-align:left">View Larger Map</a></small>
                         </div>

                         <div id="inline-2" style="display:none; width:500px; height:370px;">
                              <object width="498" height="350" data="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Weiden,+Germany&amp;sll=37.0625,-95.677068&amp;sspn=42.766543,79.453125&amp;ie=UTF8&amp;hq=&amp;hnear=Weiden,+Weiden+in+der+Oberpfalz,+Bavaria,+Germany&amp;z=12&amp;ll=49.674984,12.160652&amp;output=embed"></object><br /><small><a href="http://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Weiden,+Germany&amp;sll=37.0625,-95.677068&amp;sspn=42.766543,79.453125&amp;ie=UTF8&amp;hq=&amp;hnear=Weiden,+Weiden+in+der+Oberpfalz,+Bavaria,+Germany&amp;z=12&amp;ll=49.674984,12.160652" style="color:#0000FF;text-align:left">View Larger Map</a></small>
                         </div>
        </div>

        <div class="one-half pt20">
                    <div class="outer-rounded-box-bold">
                        <div class="simple-rounded-box">

                  		<form action="contact/send" id="contactForm" method="post" style="padding-left:10px;">
                  			<ol class="forms">
                  				<li>
                                    <label for="yourName">Your Name <span class="required">*</span></label>
                  					<input type="text" name="yourName" id="yourName" value="" class="requiredField" style="width:370px;"/>
                                </li>
                  				<li>
                                    <label for="email">Email <span class="required">*</span></label>
                  					<input type="text" name="email" id="email" value="" class="requiredField email" style="width:370px;"/>
                                </li>
                  				<li class="textarea">
                                    <label for="commentsText">Comments <span class="required">*</span></label>
                  					<textarea name="comments" id="commentsText" rows="3" cols="56" class="requiredField" style="width:370px;"></textarea>
                  				</li>
                  				<li class="inline">
                                    <input type="checkbox" name="sendCopy" id="sendCopy" value="true" class="nostyle"/>
                                    <label for="sendCopy">Send a copy of this email to yourself</label>
                                </li>
                  				<li class="screenReader">
                                    <label for="checking" class="screenReader">If you want to submit this form, do not enter anything in this field</label>
                                    <input type="text" name="checking" id="checking" class="screenReader" value="" />
                                </li>
                            </ol>
                            <div class="clear"></div>
                            <div><input type="hidden" name="submitted" id="submitted" value="true"/></div>
                            <div class="form-button-left"><button type="submit" class="form-button"><span>Send Information</span></button></div>
                            <div class="clear"></div>
                  		</form>

                        <!-- notification boxes are designed but inactive, activate as needed -->
                        <!--<p class="success"><strong>Thanks!</strong> Your email was successfully sent.  We should be in touch soon.</p>
                        <p class="errors"><strong>Ooops!</strong> There was an error somewhere. Please retry or mail the geeks.</p>
                        <p class="notification"><strong>Please note!</strong> You should lorem <a href="#">Mauris</a> dictum libero id justo.</p>-->

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