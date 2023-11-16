<?php 
  session_start(); 
  if(!isset($_SESSION['user_data'])){
    header('location: index.php');
  }
  require('database/ChatUser.php');
  $user_object= new ChatUser;
  $user_id='';
  foreach ($_SESSION['user_data'] as $key => $value) {
    $user_id=$value['id'];
  }
  $user_object->setUserId($user_id);
  $user_data=$user_object->get_user_data_by_id();
  $message=''; 
  if(isset($_POST['edit'])){
    $user_profile=$_POST['hidden_user_profile'];
    if($_FILES['user_profile']['name'] != ''){
      $user_profile=$user_object->upload_image($_FILES['user_profile']);
      $_SESSION['user_data'][$user_id]['profile']=$user_profile;
    }
    $user_object->setUserName($_POST['user_name']);
    $user_object->setUserEmail($_POST['user_email']);
    $user_object->setUserPassword($_POST['user_password']);
    $user_object->setUserProfile($user_profile);
    $user_object->setUserId($user_id);
    if($user_object->update_data()){
      $message='<div class="alert alert-success">Profile Details Updated</div>';
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Chat application in php using web scocket programming</title>
    <!-- Bootstrap core CSS -->
    <link href="restaurant-management-system-demo/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="restaurant-management-system-demo/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="restaurant-management-system-demo/vendor/parsley/parsley.css"/>
    <link rel="stylesheet" type="text/css" href="restaurant-management-system-demo/vendor/bootstrap/bootstrap.min.css"/>
    <!-- Bootstrap core JavaScript -->
    <script src="restaurant-management-system-demo/vendor/jquery/jquery.min.js"></script>
    <script src="restaurant-management-system-demo/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="restaurant-management-system-demo/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="restaurant-management-system-demo/vendor/parsley/dist/parsley.min.js"></script>
</head>
<body>
  <div class="container">
    <br />
    <br />
    <h1 class="text-center">PHP Chat Application using Websocket</h1>
    <br />
    <br />
    <?php echo $message; ?>
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-6">Profile</div>
          <div class="col-md-6 text-right"><a href="chatroom.php" class="bt btn-warning btn-sm">Go to Chat</a></div>
          <div class="card-body">
            <form method="post" id="profile_form" enctype="multipart/form-data">
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="user_name" id="user_name" class="form-control" data-parsley-pattern="/^[a-zA-Z\s]+$/" required value="<?php echo $user_data['user_name']; ?>"/>
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="user_email" id="user_email" class="form-control" data-parsley-type="email" required readonly value="<?php echo $user_data['user_email']; ?>"/>
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="user_password" id="user_password" class="form-control" data-parsley-minlength="6" data-parsley-maxlength="12" required />
              </div>
              <div class="form-group">
                <label>Profile</label>
                <input type="file" name="user_profile" id="user_profile">
                <img src="<?php echo $user_data['user_profile']; ?>" width="100" class="img-fluid img-thumbnail" />
                <input type="hidden" name="hidden_user_profile" value="<?php echo $user_data['user_profile']; ?>">
              </div>
              <div class="form-group text-center">
                <input type="submit" name="edit" class="btn btn-success" value="Edit" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>