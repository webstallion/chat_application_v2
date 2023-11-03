<?php
  session_start();
?>
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
    <title>Register | PHP Chat Application using Websocket</title>
    <link href="restaurant-management-system-demo/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="restaurant-management-system-demo/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="restaurant-management-system-demo/vendor/parsley/parsley.css"/>
    <!-- Bootstrap core JavaScript -->
    <script src="restaurant-management-system-demo/vendor/jquery/jquery.min.js"></script>
    <script src="restaurant-management-system-demo/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="restaurant-management-system-demo/vendor/parsley/dist/parsley.min.js"></script>
</head>
<body>

    <div class="containter">
      <br />
      <br />
      <h1 class="text-center"><a href="https://www.webslesson.info/2021/01/build-real-time-chat-application-in-php-mysql-using-websocket.html">PHP Chat Application using Websocket</a></h1>
      <div class="row justify-content-md-center">
        <div class="col col-md-4 mt-5">
          <?php
          if(isset($_SESSION['success_message'])){
            echo '<div class="alert alert-success">'.
                    $_SESSION['success_message'];
                  .'</div>';
                  unset($_SESSION['success_message']);
          }
          ?>
        </div>
      </div>
    </div>
</body>
</html>