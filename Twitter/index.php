<?php
function showTweets()
{
require "includes/FavoriteTweetsList.class.php";
require "includes/codebird/codebird.php";

// Enter the credentials of your app here:
$tweets = new FavoriteTweetsList(array(
    'twitter_consumer_key'		=> 'tsMbNW2oyVaK2q5ZyJHSBsQi4',
    'twitter_consumer_secret'	=> 'CEDawbwI8lJQvK5gfDX9xrBKPm1a9ml9n24EOaDTiRzeDDpMCJ',
    'twitter_access_token'		=> '25966536-kfvE7XrrHjK5QF77uSTh11tle4xKPIZxYhqK9NJDY',
    'twitter_token_secret'		=> 'rhpDj49nXNdmDVKoOLmjYApsYib3VWyzyK3jAjZAj3g2G'
));
        echo '<div id="tweetContainer">';
	    $tweets->generate(3);	    
        echo '</div>';
      
		echo '<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js/"></script>
        <script src="assets/js/jquery.splitlines.js"></script>
        <script src="assets/js/script.js"></script>'; 
      
}
?>