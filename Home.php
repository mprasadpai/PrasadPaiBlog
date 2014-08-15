<html>
<head><Title>Prasad Pai Blog</Title>
<link rel="stylesheet" type="text/css" href="all.css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script type="text/javascript" src="Feedback/FeedBack.js"></script>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
</head>
<body>

<h1>Prasad Pai Blog</h1>

<a href="#contactForm"><input type="button" id="btnFeedback" value="Feedback"></input></a>

<?php
include ( $_SERVER['DOCUMENT_ROOT'] . '/PrasadPaiBlog/User_Tracker/visitor_tracking.php');
include ( $_SERVER['DOCUMENT_ROOT'] . '/PrasadPaiBlog/User_Tracker/display_visits.php');
echo 'You are Visitor Number :' . $result->num_rows .'</br>';
?> 

<div id="tweetBox">
<h2>Favourite Tweets</h2>
<?php
include ( $_SERVER['DOCUMENT_ROOT'] . '/PrasadPaiBlog/Twitter/index.php');
showTweets();
?>
</div>


<div id="notesBox">
<h2>Post App</h2>
<?php
include ( $_SERVER['DOCUMENT_ROOT'] . '/PrasadPaiBlog/Post2Wall/index.php');

?>
</div>



<form id="contactForm" action="processForm.php" method="post">

  <h2>Send me a mail</h2>

  <ul>

    <li>
      <label for="senderName">Your Name</label>
      <input type="text" name="senderName" id="senderName" placeholder="Please type your name" required="required" maxlength="40" />
    </li>

    <li>
      <label for="senderEmail">Your Email Address</label>
      <input type="email" name="senderEmail" id="senderEmail" placeholder="Please type your email address" required="required" maxlength="50" />
    </li>

    <li>
      <label for="message" style="padding-top: .5em;">Your Message</label>
      <textarea name="message" id="message" placeholder="Please type your message" required="required" cols="80" rows="10" maxlength="10000"></textarea>
    </li>

  </ul>

  <div id="formButtons">
    <input type="submit" id="sendMessage" name="sendMessage" value="Send Email" />
    <input type="button" id="cancel" name="cancel" value="Cancel" />
  </div>

</form>

<div id="sendingMessage" class="statusMessage"><p>Sending your message. Please wait...</p></div>
<div id="successMessage" class="statusMessage"><p>Thanks for sending your message! We'll get back to you shortly.</p></div>
<div id="failureMessage" class="statusMessage"><p>There was a problem sending your message. Please try again.</p></div>
<div id="incompleteMessage" class="statusMessage"><p>Please complete all the fields in the form before sending.</p></div>




</body>
</html>