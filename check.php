<?php
require('Pusher.php');
echo '<div id="message">Waiting for you to confirm login from remote device.....</div>';
$user = $_GET['user'];
$app_id = '44376';
$app_key = '90589c5b71118c012d39';
$app_secret = 'd5ec30897a541bd86cb5';

$pusher = new Pusher( $app_key, $app_secret, $app_id ,false, 'https://api.pusherapp.com', 443);
$pusher->trigger('Konsensus', 'login-event', array('user' => $user) );

echo '<script src="http://js.pusher.com/2.0/pusher.min.js"></script>
<script type="text/javascript">
var Pusher = new Pusher(\'90589c5b71118c012d39\');
var channel = pusher.subscribe(\'Konsensus\');
channel.bind(\'login-confirm\', function(data) {
  alert(\'An event was triggered with message: \' + data.message);
});
</script>';
echo 'Login Confirmed! Welcome '.$user;

?>