<?php
// Require the non zend version of this. The only difference is that the non Zend version
// will not autoload so we have to use requires.
require('.\non_zend_facebook.php');

// See if there is a user from a cookie using our new class
$user = Non_Zend_Facebook::getUser();

if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated. Notice we don't have
	// to initialize an object and we just call the class.
    $user_profile = Non_Zend_Facebook::api('/me');
  } catch (FacebookApiException $e) {
    echo '<pre>'.htmlspecialchars(print_r($e, true)).'</pre>';
    $user = null;
  }
}

?>
<?php if ($user) { ?>
Your user profile is
<pre>
<?php print htmlspecialchars(print_r($user_profile, true)) ?>
</pre>
<?php } else { ?>
<fb:login-button></fb:login-button>
<?php } ?>
<div id="fb-root"></div>
<script>
window.fbAsyncInit = function() {
	FB.init({
		appId: '<?php echo Non_Zend_Facebook::getAppID() ?>',
		cookie: true,
		xfbml: true,
		oauth: true
	});
	FB.Event.subscribe('auth.login', function(response) {
		window.location.reload();
	});
	FB.Event.subscribe('auth.logout', function(response) {
		window.location.reload();
	});
	};
	(function() {
		var e = document.createElement('script'); e.async = true;
		e.src = document.location.protocol +
		'//connect.facebook.net/en_US/all.js';
		document.getElementById('fb-root').appendChild(e);
	}());
</script>