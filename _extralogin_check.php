<?php
/* 2020 Extra Folder Protect */
$_extra_error = '';
if(isset($_POST['login']) && $_POST['login'] != '') {
    /* extra security for bots, this hidden field must be left empty */
    $_extra_error = 'Login attempt failed. Wrong password or spam protect';
}
else if(isset($_POST['_extrapassword'])) {
    if(strcasecmp(trim($_POST['_extrapassword']), $EXTRA_LOGIN_PASSWORD) == 0) {
        $_extra_error = 'Password accepted';
        setcookie($EXTRA_LOGIN_COOKIE_NAME, $EXTRA_LOGIN_COOKIE_SECRET_VALUE, mktime (0, 0, 0, 12, 31, 2032), "/");
        header("Refresh:0");
        exit();
    }
    else {
        $_extra_error = 'Login attempt failed. Wrong password or spam protect';
    }
}
?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login to folder</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <meta name="googlebot" content="noindex, nofollow">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <style>
    .form-horizontal {
        margin-top:20%;
    }
    .hidden {
        width: 0px;
        height: 0px;
        overflow: hidden;
        display: none;
    }
    .footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 60px;
        line-height: 60px;
        background-color: #E6E6E6;
    }
</style>

</head>
<body>

    <div class="container">

        <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <fieldset>
                <legend>Login to folder <?= $ip_now ?></legend>
                <p class="center text-center text-danger">
                    <?php
                    echo $_extra_error;
                    ?>
                </p>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="_extrapassword">Password</label>
                    <div class="col-md-4">
                        <input id="login" name="login" type="text" placeholder="" value="" class="hidden">
                        <input id="_extrapassword" name="_extrapassword" type="text" placeholder="Type in password" class="form-control input-md" style="-webkit-text-security: disc;">
                        <input type="password" name="password" class="hidden" value="">
                        <span class="help-block">
                            <p>
                                This folder requires extra login step. This is to protect folder from the bots.
                            </p>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="singlebutton"></label>
                    <div class="col-md-4">
                        <input type="submit" class="btn btn-primary" value="Login to folder">
                    </div>
                </div>

            </fieldset>
            <br /><br /><br /><br /><br /><br />
        </form>

    </div>

    <footer class="footer">
        <div class="container text-center">
            <span class="text-muted">Login to folder required</span>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <script>
        setTimeout(function() {
            document.getElementById("_extrapassword").focus();
        }, 300);
    </script>

</body>
</html>