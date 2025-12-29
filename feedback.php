<?php

// ------------- CONFIGURABLE SECTION ------------------------

// $mailto - set to the email address you want the form
// sent to, eg
//$mailto		= "youremailaddress@example.com" ;

$mailto = 'zdetor54@gmail.com' ;

// $subject - set to the Subject line of the email, eg
//$subject	= "Feedback Form" ;

$subject = "Comments for Site" ;

// the pages to be displayed, eg
//$formurl		= "http://www.example.com/feedback.html" ;
//$errorurl		= "http://www.example.com/error.html" ;
//$thankyouurl	= "http://www.abdesign.gr/contanct_en.html" ;

$formurl = "http://dekay.net84.net" ;/*
$errorurl = "http://www.karantinos.com/error.htm" ;*/
$thankyouurl = "http://dekay.net84.net/contact.html" ;

$uself = 0;

// -------------------- END OF CONFIGURABLE SECTION ---------------

$headersep = (!isset( $uself ) || ($uself == 0)) ? "\r\n" : "\n" ;
$email = $_POST['email'] ;
$comments = $_POST['message'] ;
$http_referrer = getenv( "HTTP_REFERER" );

if (!isset($_POST['email'])) {
	header( "Location: $formurl" );
	exit ;
}
if (get_magic_quotes_gpc()) {
	$comments = stripslashes( $comments );
}

$messageproper =

	"This message was sent from:\n" .
	"$http_referrer\n" .
	"------------------------------------------------------------\n" .
	"Email of sender: $email\n" .
	"------------------------- COMMENTS -------------------------\n\n" .
	$comments .
	"\n\n------------------------------------------------------------\n" ;

mail($mailto, $subject, $messageproper,
	"From: \"$name\" <$email>" . $headersep . "Reply-To: \"$name\" <$email>" . $headersep . "X-Mailer: chfeedback.php 2.08" );
header( "Location: $thankyouurl" );
exit ;

?>
