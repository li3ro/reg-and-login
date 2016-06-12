<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Reg-and-Login welcome page</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>static/css/welcome.css">
</head>
<body>

<div id="container">
	<h1>Welcome in!</h1>
	</br>
	<h2>Session data:
		<?php
		echo "</br>";
		foreach ($this->session->all_userdata() as $key => $value) {
			echo "Key: $key; Value: $value </br>";
		}
		?>
	</h2>
	<div id="body">
		<p>You are logged in!</p>

		<b id="logout"><a href="<?php echo site_url('logout'); ?>?last_url="<?php echo urlencode(current_url())?> >Logout</a></b>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>