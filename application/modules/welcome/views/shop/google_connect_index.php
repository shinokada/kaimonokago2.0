<p><?php echo $_SESSION['user']['google_name']; ?>（<?php echo $_SESSION['user']['google_email']; ?>）のGoogleアカウントとしてログインしています！</p>
<p><a href="index.php/welcome/logout">[ログアウト]</a></p>
<?php

//var_dump($code);
//	var_dump($user);
//	var_dump($me);
	echo "<pre>";
var_dump($this->session->all_userdata());
echo "</pre>";

?>