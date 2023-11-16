<?php
  session_start();
  unset($_SESSION['user_data']);
  $error='';
  if(isset($_SESSION['user_data'])){
    header('location:chatroom.php');
  }
  if(isset($_POST['login'])){
    require_once('database/ChatUser.php');
    $user_object=new ChatUser;
    $user_object->setUserEmail($_POST['user_email']);
    $user_data=$user_object->get_user_data_by_email();
    if(is_array($user_data) && count($user_data)>0){
      if($user_data['user_status']=='Enable'){
        if($user_data['user_password']==$_POST['user_password']){
          $user_object->setUserID($user_data['user_id']);
          $user_object->setUserloginStatus('Login');
          if($user_object->update_user_login_data()){
            $_SESSION['user_data'][$user_data['user_id']]=[
                                                            'id'=>$user_data['user_id'],
                                                            'name'=>$user_data['user_name'],
                                                            'profile'=>$user_data['user_profile']
                                                          ];
            // $_SESSION['user_data'][]=[
            //                           'id'=>$user_data['user_id'],
            //                           'name'=>$user_data['user_name'],
            //                           'profile'=>$user_data['user_profile']
            //                          ];                                                                             
            header('location:chatroom.php');                                              
          }
        }else{
          $error="Wrong Password";
        }
      }else{
        $error='Please Verify Your Email Address';
      }
    }else{
      $error="Pls register account..";
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

    <div class="containter">
      <br />
      <br />
      <h1 class="text-center"><a href="https://www.webslesson.info/2021/01/build-real-time-chat-application-in-php-mysql-using-websocket.html">PHP Chat Application using Websocket</a></h1>
      <div class="row justify-content-md-center">
        <div class="col col-md-4 mt-5">
          <?php
          if(isset($_SESSION['success_message'])){
            echo '<div class="alert alert-success">'.
                    $_SESSION['success_message']
                  .'</div>';
                  unset($_SESSION['success_message']);
          }

          if($error !=''){
            echo '<div class="alert alert-danger">'.
                    $error
                  .'</div>';
          }
          ?>
          <div class="card">
            <div class="card-header">Login</div>
            <div class="card-body">
              <form method="post" id="login_form">
                  <div class="form-group">
                    <label>Enter Your Email</label>
                    <input type="email" name="user_email" id="user_email" class="form-control" data-parsley-type="email" required />
                  </div>
                  <div class="form-group">
                    <label>Enter Your Password</label>
                    <input type="password" name="user_password" id="user_password" class="form-control" data-parsley-minlength="6" data-parsley-maxlength="12" required />
                  </div>
                  <div class="form-group text-center">
                      <input type="submit" name="login" class="btn btn-success" value="Login" />
                  </div>
              </form>
            </div>
          </div> 
        </div>
      </div>
    </div>
</body>
</html>
<script>
$(document).ready(function(){
  $('#login_form').parsley();
});
</script>