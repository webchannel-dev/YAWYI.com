
<?php
		/****SET THE MAX CHARS FOR EACH MESSAGE***************/
			
			//it is recommended not to set the max too high, to prevent extremely long messages
			// from stalling your server
			
			$EMAIL_MAX = 2500;
		
		/*****************************************************/

		//function for stripping whitespace and some chars
		function cleanUp($str_to_clean, $newlines, $spaces){
		
			//build list of whitespace chars to be removed
			$bad_chars = array('\r', '\t', ';');
		
			//if newlines are false, add that to the list of bad chars
			if(!$newlines){array_push($bad_chars, '\n');}
			
			//if spaces are false, strip them too
			if(!$spaces){array_push($bad_chars, ' ');}
			
			$str_to_clean_a = str_replace($bad_chars, '', $str_to_clean);
			$str_to_clean_b = strip_tags($str_to_clean_a);
			return $str_to_clean_b;
		}
		
		//function to check for valid email address pattern
		function checkEmail($email) {
			if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)) {return false;}
			return true;
		}
		//function to check for valid url pattern
		function checkURL($url) {
			if(!eregi("^http:\/\/", $url)) {return false;}
			return true;
		}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US"> 
<head profile="http://gmpg.org/xfn/11"> 
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">  
	<title></title>
	<link rel="shortcut icon" type="image/x-icon" href="../images/icon/favicon.ico">	
	<link href="../includes/css/global.css" rel="stylesheet" type="text/css">
	<link href="../includes/css/menus.css" rel="stylesheet" type="text/css">
	<link href="../index0df8.html?css=style/" rel="stylesheet" type="text/css">
	<!--[if IE]>
		<link href="http://sportsyndicator.com/?css=style/ie.v.1296502075" rel="stylesheet" type="text/css">
	<![endif]-->
	<script src="../includes/js/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="../includes/js/jquery.cycle.all.js"></script>
	<script type="text/javascript" src="../includes/js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="../includes/js/jquery-site.js"></script>
	<link rel="stylesheet" href="../includes/css/colorbox/colorbox.css" type="text/css" media="screen" />
	<script type="text/javascript" src="../includes/js/jquery.colorbox.js"></script>
	<script type="text/javascript" src="../includes/js/jquery.colorbox-site.js"></script>
	<link rel="stylesheet" href="../includes/css/queryLoader.css" type="text/css" media="screen" />
	<script type="text/javascript" src="../includes/js/queryLoader.js"></script>
	<script type="text/javascript" src="../includes/js/swfobject.js"></script>
    <style type="text/css">
		/* BASIC STYLES */
		body{font-family: 'Lucida Grande',Trebuchet, Tahoma, sans-serif;color:#222;font-size:11px;}
		fieldset{margin:0;padding:0;border:0;}
		label{width:250px; display:block;}
		.txt_input{width:250px; display:block;}
		textarea{height:80px; width:250px;}
		input{display:block;}
		.req{color:#f00;font-size:90%;}
		#form_errors{color:#f00; display:none;}
		#form_thanks{color:#000; display:none;}
	</style>

	<script type="text/javascript">
v_fields = new Array('sender_email','sender_message');alert_on = true;thanks_on = true; thanks_message = "Thank you to contact YAWYI Fitness . Your message has been sent.";	
	function validateForm(){
		
		//alert(v_fields);
		
		//init errors
		var err = "";
		
		//start checking fields
		for(i=0;i<v_fields.length;i++){
			
			//store the field value
			var _thisfield = eval("document.contact."+v_fields[i]+".value");
			
			//check the field value
			if(v_fields[i] == "sender_name"){
				if(!isAlpha(_thisfield)){ err += "Please enter a valid name\n";}
			}else if(v_fields[i] == "sender_subject"){
				if(!isAlpha(_thisfield)){ err += "Please enter a valid subject\n";}
			}else if(v_fields[i] == "sender_email"){
				if(!isEmail(_thisfield)){ err += "Please enter a valid email address\n";}
			}else if(v_fields[i] == "sender_url"){
				if(!isURL(_thisfield)){ err += "Please enter a valid URL\n";}
			}else if(v_fields[i] == "sender_phone"){
				if(!isPhone(_thisfield)){ err += "Please enter a valid phone number\n";}
			}else if(v_fields[i] == "sender_message"){
				if(!isText(_thisfield)){ err += "Please enter a valid message\n";}
			}
			
		}//end for
		
		if(err != ""){ 
			if(alert_on){
				alert("The following errors have occurred\n"+err);
			}else{
				showErrors(err);
			}
			
			return false;
		
		}
		
		return true;
	}
	
	//function to show errors in HTML
	function showErrors(str){
		var err = str.replace(/\n/g,"<br />");
		document.getElementById("form_errors").innerHTML = err;
		document.getElementById("form_errors").style.display = "block";
	
	}
	
	//function to show thank you message in HTML
	function showThanks(str){
		var tym = str.replace(/\n/g,"<br />");
		document.getElementById("form_thanks").innerHTML = tym;
		document.getElementById("form_thanks").style.display = "block";
	
	}
	
	function isEmail(str){
	if(str == "") return false;
	var regex = /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i
	return regex.test(str);
	}
	
	function isText(str){
		if(str == "") return false;
		return true;
	}
	
	function isURL(str){
		var regex = /[a-zA-Z0-9\.\/:]+/
		return regex.test(str);
	}
	
	// returns true if the number is formatted in the following ways:
	// (000)000-0000, (000) 000-0000, 000-000-0000, 000.000.0000, 000 000 0000, 0000000000
	function isPhone(str){
		var regex = /^\(?[2-9]\d{2}[\)\.-]?\s?\d{3}[\s\.-]?\d{4}$/
		return regex.test(str);
	}
	
	// returns true if the string contains A-Z, a-z or 0-9 or . or # only
	function isAddress(str){
		var regex = /[^a-zA-Z0-9\#\.]/g
		if (regex.test(str)) return true;
		return false;
	}
	
	// returns true if the string is 5 digits
	function isZip(str){
		var regex = /\d{5,}/;
		if(regex.test(str)) return true;
		return false;
	}
	
	// returns true if the string contains A-Z or a-z only
	function isAlpha(str){
		var regex = /[a-zA-Z]/g
		if (regex.test(str)) return true;
		return false;
	}
	
	// returns true if the string contains A-Z or a-z or 0-9 only
	function isAlphaNumeric(str){
		var regex = /[^a-zA-Z0-9]/g
		if (regex.test(str)) return false;
		return true;
	}

</script>

	<?php
	if(isset($_POST["submitForm"])){
		$_name = cleanUp($_POST["name"], false, false);
		$_email = cleanUp($_POST["sender_email"], false, false);
		$_phone = cleanUp($_POST["phone"], false, false);
		$_message = cleanUp($_POST["sender_message"], true, true);

		
		$_body = "You have been sent this message from your contact form\n\n";
		
		if($_name){
			$_body .= "NAME: $_name\n\n";
		}
		
		if($_email){
			$_body .= "EMAIL: $_email\n\n";
		}
		
		if($_url){
			$_body .= "URL: $_url\n\n";
		}
		
		if($_phone){
			$_body .= "PHONE: $_phone\n\n";
		}
		
		if($_message){
		
			//check length of body, reduce to max chars
			if(strlen($_message) > $EMAIL_MAX){$_message= substr($_message, 0, $EMAIL_MAX);}else{$_message = $_message;}
			if(strlen($_message) > $SMS_MAX){$_message2 = substr($_message, 0, $SMS_MAX);}else{$_message2 = $_message;}
		}
		
		

		//store the recipient(s)
		$_to = array();

		//now get the recipient(s)
		$_to[] = "info@yawyi.com";
		
		//define the subject
		if(!$_subject){$_subject = "E-Mail from your contact form";}

		
		if(!$_name){$_name = "CONTACT FORM";}
		if(!$_email){$_email = $_name;}
		
		//set the headers
		$_header = "From: $_name < $_email >" . "\r\n" .
    "Reply-To: ".$_email."\r\n" .
    "Super-Simple-Mailer: supersimple.org";
		
		//we can send up to 2 emails (EMAIL and/or SMS)
		if(count($_to) > 2){ $_to = array_slice($_to,0,2);}
		
		for($i=0;$i<count($_to);$i++){
			
			//get the correct message, based on where it is delivering to
			if(strstr($_to[$i],"teleflip.com")){$_text = $_body.$_message2;}else{$_text = $_body.$_message;}
			
			//send the email(s)
			mail($_to[$i], $_subject, $_text, $_header);
			
		}
		
		echo "<script type=\"text/javascript\">window.onload = function(){showThanks(thanks_message);}</script>";
	}
	?>
    
</head>
<body>
	<script type="text/javascript">
  	var _gaq = _gaq || [];
  	_gaq.push(['_setAccount', 'UA-27824381-5']);
  	_gaq.push(['_trackPageview']);

  	(function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(ga);
  	})();
	</script>
<div id="site-wrapper">
	<div id="header">
		<div id="logo">
			<a href="../index.html"><img src="../images/logos/logo.png" border="0" alt="YAWYI Fitness" ></a>
		</div>
		<div id="navigation"><ul>
	<li id="home-menu">
		<a href="../home/index.html">HOME</a>
	</li>
	<li id="sports-menu">
		<a href="../sports/index.html">SPORTS</a>
	</li>
	<li id="case-studies-menu">
		<a href="../audiences/index.html">AUDIENCES</a>
	</li>
	<li id="clients-menu">
		<a  href="../clients/index.html">CLIENTS</a>
	</li><!--	<li id="career-menu">
		<a href="../career/index.html">CAREER</a>
	</li> -->
	<!--
<li id="corporate-menu">
		<a href="http://sportsyndicator.com/corporate/">CORPORATE</a>
	</li>
-->
	<li id="contact-menu" style="margin-right:0px;">
		<a class="selected"href="../contact/index.php">CONTACT</a>
	</li>
</ul></div>
   </div>
   <div id="content">
   		<div id="left-sidebar"><div id="sidebar-about">
	
	<div id="about-sidebar-summary">
		<p> <span class="Apple-style-span" style="line-height: 14px; font-family: arial, helvetica, sans; color: rgb(0,0,0); font-size: 11px">YAWYI is the place where physical wellbeing becomes your way of life. Nothing is imposable, Lets get started “ I will send you the more info section in my next email”</div>
	
	<div class="orange-more-info-btn">
		<a class="about" href="http://www.tub-media.com/sportsyndicator.com/index.php/about/">MORE INFO</a>
	</div>

</div>
<div id="sidebar-testimonials">
	<div id="testimonials-sidebar-header"></div>
	<div id="sidebar-testimonial-slideshow">
		
		<div class="testimonial-slide">
			<div id="testimonial-text">
				
				<p>
	<span style="font-size: 10px">"YAWYI has educated me with the tools I need to reach my goals and to continue to succeed. Now, I'm 6 stone lighter.</span></p>

				
			</div>
			<div id="testimonial-credit"><p>	<span style="font-size: 10px">Sian Harrison, Primary School Teacher
</BR>UAE - Dubai</span></p>
</div>
		</div>
		
		<div class="testimonial-slide">
			<div id="testimonial-text">
				
				<p>	<span style="font-size: 10px">&ldquo;I have improved my olympic weight lifting Squats/Dead lifts with the YAWYI's brilliant support and
care.&rdquo;</span></p>
</div>
			<div id="testimonial-credit"><p>	<span style="font-size: 10px">Luca Toth - IT Procurement Manager</BR>
Hungary</span></p>
</div>
		</div>
		
		 
			
	</div>
</div>
<div id="sidebar-news-feed">
	<div id="news-feed-sidebar-header"></div>
	<div id="twitter-feed">
	<script src="../includes/js/widget.js"></script>
	<script>
	new TWTR.Widget({
  version: 2,
  type: 'profile',
  rpp: 1,
  interval: 100,
  width: 170,
  height: 120,
  theme: {
    shell: {
      background: '#e3e3e3',
      color: '#5c5c5c'
    },
    tweets: {
      background: '#e3e3e3',
      color: '#666666',
      links: '#eb6207'
    }
  },
  features: {
    scrollbar: false,
    loop: true,
    live: false,
    hashtags: true,
    timestamp: false,
    avatars: false
  }
}).render().setUser('yawyifitness').start();
</script>
</div>
</div>

<div id="left-sidebar-main-bg"></div></div>
   		<div id="clients-logos"> 

   			
   		<table>
        <tr><h1>Contact Details</h1></tr>
        <tr><td width="400px">
        
        
        
        <p style="font-size:14px;">YAWYI Fitness</br>
        Info Line : 0555694015<br/>
        Dubai,UAE<br/>
        info@yawyi.com</p>
        
        <br/>
        <br/>
        
        <p></p>
        

        </td>
        
        <td><div class="contact">
				<br/><br/><br/>
		<fieldset style="float:left;">
		<p id="form_errors"></p>
		<p id="form_thanks"></p>
		<form name="contact" action="<?=$_SERVER['PHP_SELF']?>" method="post" onsubmit="return validateForm();">
        
        <label>Name <span class="req">*</span></label>
		<input type="text" class="txt_input" name="name" />

		<label>Your E-Mail <span class="req">*</span></label>
		<input type="text" class="txt_input" name="sender_email" />

		<label>Phone </label>
		<input type="text" class="txt_input" name="phone" />
        
		<label>Message <span class="req">*</span></label>
		<textarea name="sender_message"></textarea>
		<input type="submit" name="submitForm" value="Send message" />
		</form>
		</fieldset>
	</div></td></tr>
        
        </table>
   			   			
   		</div>
   	</div>
	<div id="footer"><div id="copyright" style="margin-right:10px;float:left;"><img src="../images/global/copyright.gif" border="0"></div>
<div id-"terms-footer" style="float:left;"><a href="../terms-and-conditions.html"><img src="../images/global/terms.gif" border="0"></div>
<div id="social-media-networks">
	<div id="follow-us-on" style="margin-right:10px;"><img src="../images/global/follow-us-on.gif" border="0"></div>
	<div id="twitter-logo" style="margin-right:5px;">
		<a href="http://www.twitter.com/yawyifitness/" target="_blank"><img src="../images/logos/twitter-logo.gif" border="0"></a>
	</div>
<div id="facebook-logo">
	<a href="https://www.facebook.com/pages/Yawyi/153835044724798" target="_blank"><img src="../images/logos/facebook-logo.gif" border="0"></a>
</div>
</div>
</div>
</div>
</body>

</html>