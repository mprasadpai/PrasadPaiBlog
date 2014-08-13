<html>
<head><Title>Prasad Pai Blog</Title></head>
<body>
<?php
include ( $_SERVER['DOCUMENT_ROOT'] . '/PrasadPaiBlog/User_Tracker/visitor_tracking.php');
include ( $_SERVER['DOCUMENT_ROOT'] . '/PrasadPaiBlog/User_Tracker/display_visits.php');

echo 'Welcome to Prasad Pai Blog';
echo '<br/><br/>';

echo '</br> You are Visitor Number :' . $result->num_rows .'</br>';

?>
</body>
</html>