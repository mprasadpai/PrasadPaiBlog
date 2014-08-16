<!DOCTYPE HTML>
<html>

<head>
  <title>Prasad Pai Blog 1.0</title>

  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="all.css">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script><base>
	<script type="text/javascript" src="Feedback/FeedBack.js"></script>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine&amp;v1" />
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" />
  
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <h1>Blog-O-Pedia<a href="#">1.0</a></h1>
        <div class="slogan">The PPAI percpective!</div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="current" in the li tag for the selected page - to highlight which page you're on -->
          <li class="current"><a href="index.php">Home</a></li> 
          <li><a href="#contactForm">Feedback</a><li>      
          <?php
		  session_start();
			if($_SESSION['logged_in']==true)
			{
				
				echo '<li><a href="Login/logout.php">Logout</a></li>';
			}
			else
			{
				echo '<li><a href="Login/main_login.php">Login</a></li>';
			
			}	
			?>
          <!--  <li><a href="">Another Page</a></li>     -->      
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div id="sidebar_container">
        <img class="paperclip" src="style/paperclip.png" alt="paperclip" />
        <div class="sidebar">
        <d
        <!-- insert your sidebar items here -->
        <h2>Favourite Tweets</h2>
        <?php
		include ( $_SERVER['DOCUMENT_ROOT'] . '/PrasadPaiBlog/Twitter/index.php');
		showTweets();
		?>
	
        </div>
    
      </div>
      <div id="content">
        <h1>Blog-O-Pedia</h1>
        <p>The fundamental site on which all latest web related stuff will be tried out.</p>
   
      </div>
    </div>
    <div id="footer">
      <p>Copyright &copy;A Prasad Pai Blog 2014</p>
    </div>
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
