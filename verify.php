<?php
  session_start();
  if(isset($_GET['code'])){
    require_once('database/ChatUser.php');
    $user_object=new ChatUser;
    $user_object->setUserverificationCode($_GET['code']);
    if($user_object->is_valid_email_verification_code()){
      $user_object->setUserStatus('Enable');
      if($user_object->enable_user_account()){
        $_SESSION['success_message']='Your Email successfully verify, now you can login into this Chat Application';
        header('location:index.php');
      }else{
        $error="Something went wrong..";
      }
    }else{
      $error="Something went wrong..";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
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
  </body>
</html>