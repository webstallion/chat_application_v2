<!DOCTYPE html>
<html lang="en">
<head>
    <script async='async' src='//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js'></script>
        <script>
          (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-4529508631166774",
            enable_page_level_ads: true
          });
        </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | PHP Chat Application using Websocket</title>
    <link href="https://demo.webslesson.info/restaurant-management-system-demo/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://demo.webslesson.info/restaurant-management-system-demo/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://demo.webslesson.info/restaurant-management-system-demo/vendor/parsley/parsley.css"/>
    <!-- Bootstrap core JavaScript -->
    <script src="https://demo.webslesson.info/restaurant-management-system-demo/vendor/jquery/jquery.min.js"></script>
    <script src="https://demo.webslesson.info/restaurant-management-system-demo/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="../restaurant-management-system-demo/vendor/parsley/dist/parsley.min.js"></script>

</head>
<body>
    <div class="containter">
        <br />
        <br />
        <h1 class="text-center"><a href="https://www.webslesson.info/2021/01/build-real-time-chat-application-in-php-mysql-using-websocket.html">PHP Chat Application using Websocket</a></h1>
        <div class="row justify-content-md-center mt-1">
            
            <div class="col-md-4">
                <br />
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <!-- webslesson_sidebarrightsec_AdSense1_1x1_as -->
                        <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-client="ca-pub-4529508631166774"
                             data-ad-host="ca-host-pub-1556223355139109"
                             data-ad-host-channel="L0001"
                             data-ad-slot="7056856732"
                             data-ad-format="auto"
                             data-full-width-responsive="true"></ins>
                        <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                <br />
                                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <form method="post" id="login_form">
                            <div class="form-group">
                                <label>Enter Your Email Address</label>
                                <input type="email" name="user_email" id="user_email" class="form-control" data-parsley-type="email" required />
                            </div>
                            <div class="form-group">
                                <label>Enter Your Password</label>
                                <input type="password" name="user_password" id="user_password" class="form-control" data-parsley-minlength="6" data-parsley-maxlength="12" data-parsley-pattern="^[a-zA-Z]+$" required />
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" name="login" id="login" class="btn btn-primary" value="Login" />
                            </div>
                        </form>
                        <br />
                        <div align="center">
                            <p><a href="register.php">Register</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-87739877-1', 'auto');
          ga('send', 'pageview');

        </script>

</body>

</html>

<script>

$(document).ready(function(){
    $('#login_form').parsley();
});

</script>