<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Login Page</title>

    <link rel="stylesheet" href="<?php echo base_url(); ?>static/css/login.css">

</head>
<body>

<div id="container">
    <h1>Login Page</h1>

    <div id="body">
        <p>You are not logged in. please log in [or <a href="<?php echo site_url('register'); ?>">Register</a>.]</p>

        <section class="container">
            <div class="login">
                <h1>Login to Web App</h1>
                <form method="post" action="index.html">
                    <p><input type="text" name="login" value="" placeholder="Username or Email"></p>
                    <p><input type="password" name="password" value="" placeholder="Password"></p>
                    <p class="remember_me">
                        <label>
                            <input type="checkbox" name="remember_me" id="remember_me">
                            Remember me on this computer
                        </label>
                    </p>
                    <p class="submit"><input type="submit" name="commit" value="Login"></p>
                </form>
            </div>

            <div class="login-help">
                <p>Forgot your password? <a href="index.html">Click here to reset it</a>.</p>
            </div>
        </section>
    </div>

    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>
