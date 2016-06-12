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

<div id="outter-container">
    <h1>Login Page</h1>

    <div id="body">

        <?php

            if (isset($display_message) && $display_message.trim() != "0") {
                echo "<div class='message'>";
                echo $display_message;
                echo "</div>";
            }
            echo "<p>You are not logged in. please log in [or <a href=";
            echo site_url('register');
            echo ">Register</a>]</p>";
        ?>
        <section class="inner-container">
            <div class="login">
                <h1>Login to Web App</h1>
                <?php echo form_open('welcome_in'); ?>
                    <?php
                        echo "<div class='error_msg'>";
                        if (isset($error_message)) {
                            echo $error_message;
                        }
                        echo validation_errors();
                        echo "</div>";
                    ?>
                    <p><input type="text" name="username" value="" placeholder="Username"></p>
                    <p><input type="password" name="password" value="" placeholder="Password"></p>
                    <p class="submit"><input type="submit" name="submit" value="Login"></p>
                <?php echo form_close(); ?>
            </div>

            <div class="login-help">
                <p>Forgot your password? <a href="<?php echo site_url('not_implemented'); ?>">Click here to reset it</a>.</p>
            </div>
        </section>
    </div>

    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>
