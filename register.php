<?php
  $error = "";
  $success_message = "";
  if(isset($_POST['register'])){
    session_start();
    if(isset($_SESSION['user_data'])){
      header('location:chatroom.php');
    }
    require_once('database/ChatUser.php');
    $user_object=new ChatUser;
    $user_object->setUserName($_POST['user_name']);
    $user_object->setUserEmail($_POST['user_email']);
    $user_object->setUserPassword($_POST['user_password']);
    //$user_object->setUserProfile($user_object->make_avatar(strtoupper($_POST['user_name'][0])));
    $user_object->setUserStatus('Disabled');
    $user_object->setUserCreatedOn(date("Y-m-d H:i:s"));
    $user_object->setUserVerificationCode(md5(uniqid()));
    $user_data=$user_object->get_user_data_by_email();
    if(is_array($user_data)){
      $error="Email already registered";
    }else{
      if($user_object->save_data()){
        // $to = 'pawansharma3215@gmail.com';//$user_object->getUserEmail;
        // $subject = "My subject";
        // $txt = "<p>Thank you for registering for Chat Application Demo.</p>
        //         <p>This is a verification email, please click the link to verify your email address.</p>
        //         <p><a href='http://localhost/chat_application/verify.php?code='".$user_object->getUserVerificationCode()."'>Click to Verify</a></p>";
        // $headers = "From: webmaster@example.com";
        // mail($to,$subject,$txt,$headers);
        $success_message="Registration successfully..";
      }else{
        $error = "Something went wrong! Try again";
      }
    }
  }
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
            if($error != '')
            {
                echo '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  '.$error.'
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                ';
            }

            if($success_message != '')
            {
                echo '
                <div class="alert alert-success">
                '.$success_message.'
                </div>
                ';
            }
            ?>
              <div class="card">
                <div class="card-header">Register</div>
                  <div class="card-body">
                      <form method="post" id="register_form">
                          <div class="form-group">
                            <label>Enter Your Name</label>
                            <input type="text" name="user_name" id="user_name" class="form-control" data-parsley-pattern="/^[a-zA-Z\s]+$/" required />
                          </div>
                          <div class="form-group">
                            <label>Enter Your Email</label>
                            <input type="email" name="user_email" id="user_email" class="form-control" data-parsley-type="email" required />
                          </div>
                          <div class="form-group">
                            <label>Enter Your Password</label>
                            <!-- <input type="password" name="user_password" id="user_password" class="form-control" data-parsley-minlength="6" data-parsley-maxlength="12" data-parsley-pattern="^[a-zA-Z]+$" required /> -->
                            <input type="password" name="user_password" id="user_password" class="form-control" data-parsley-minlength="6" data-parsley-maxlength="12" required />
                          </div>
                          <div class="form-group text-center">
                              <input type="submit" name="register" class="btn btn-success" value="Register" />
                          </div>
                      </form>
                      <br />
                      <div class="text-center">
                          <p><a href="index.php">Login</a></p>
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
  $('#register_form').parsley();
});

</script>