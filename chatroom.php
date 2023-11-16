<?php session_start(); ?>
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
  <style type="text/css">
    html,
    body{
      height: 100%;
      width: 100%;
      margin: 0;
    }
    #wrapper{
      display: flex;
        flex-flow: column;
        height: 100%;
    }
    #remaining{
      flex-grow : 1;
    }
    #messages{
      height: 200px;
      background: whitesmoke;
      overflow: auto;
    }
    #chat-room-frm{
      margin-top: 10px;
    }
    #user_list{
      height:450px;
      overflow-y: auto;
    }
    #messages_area{
      height: 650px;
      overflow-y: auto;
      background-color:#e6e6e6;
    }
  </style>
</head>
<body>
  <div class="container">
    <br />
    <h3 class="text-center">PHP Chat Application using Websocket - Display User with Online or Offline Status</h3>
    <br />
    <div class="row">
      <div class="col-lg-8">
        <div class="card">
          <div class="card-header"><h3>Chat Room</h3></div>
          <div class="card-body" id="messages_area"></div>
        </div>
        <form method="post" id="chat_form" data-parsley-errors-container="#validation_error">
          <div class="input-group mb-3">
            <textarea class="form-control" id="chat_message" name="chat_message" placeholder="Type Message Here" data-parsley-maxlength="1000" data-parsley-pattern="/^[a-zA-Z0-9\s]+$/" required></textarea>
            <div class="input-group-append">
              <button type="submit" name="send" id="send" class="btn btn-primary"><i class="fa fa-paper-plane"></i></button>
            </div>
          </div>
          <div id="validation_error"></div>
        </form>
      </div>
      <div class="col-lg-4">
        <?php
        $login_user_id='';

        if(isset($_SESSION['user_data']) && count($_SESSION['user_data'])>0){
          foreach ($_SESSION['user_data'] as $key=>$value) { 
            $login_user_id=$value['id'];
          ?>
            <input type="hidden" name="login_user_id" id="login_user_id" value="<?php echo $login_user_id; ?>">
            <div class="mt-3 mb-3 text-center">
              <img src="<?php echo $value['profile'];?>" width="150" class="img-fluid rounded-circle img-thumbnail"/>
              <h3 class="mt-2"><?php echo $value['name'];?></h3>
              <a href="profile.php" class="btn btn-secondary mt-2 mb-2">Edit</a>
              <input type="button" class="btn btn-primary mt-2 mb-2" name="logout" id="logout" value="Logout" />
            </div>
        <?php }
        } ?>
        <div class="card mt-3">
          <div class="card-header">User List</div>
          <div class="card-body" id="user_list">
            <div class="list-group list-group-flush">

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script type="text/javascript">
  $(document).ready(function(){
    var conn = new WebSocket('ws://localhost:8080');
    conn.onopen = function(e) {
      console.log("Connection established!");
    };
    conn.onmessage = function(e) {
      console.log(e.data);
    };
    $('#chat_form').parsley();
    $('#chat_form').on('submit', function(event){
      event.preventDefault();
      if($('#chat_form').parsley().isValid()){
        var user_id=$('#login_user_id').val();
        var message=$('#chat_message').val();
        var data={
          userId:user_id,
          msg:message
        };
        conn.send(JSON.stringify(data));
      }
    })

    $('#logout').click(function(){
      user_id=$('#login_user_id').val();
      $.ajax({
        url:"action.php",
        method:"POST",
        data:{user_id:user_id, action:'level'},
        success:function(data){
          var response=JSON.parse(data);
          console.log(response);
          if(response.status==1){
            location="index.php"
          }
        }
      })
    });
  });
</script>
</html>