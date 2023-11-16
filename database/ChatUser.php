<?php 
	class ChatUser{
		private $user_id;
		private $user_name;
		private $user_email;
		private $user_password;
		private $user_profile;
		private $user_status;
		private $user_created_on;
		private $user_verification_code;
		private $user_login_status;

		public function __construct(){
			//echo require_once('database_connection.php');
		}

		function setUserId($user_id){
			$this->user_id=$user_id;
		}

		function getUserId(){
			return $this->user_id;
		}

		function setUserName($user_name){
			$this->user_name=$user_name;
		}

		function getUserName(){
			return $this->user_name;
		}

		function setUserEmail($user_email){
			$this->user_email=$user_email;
		}

		function getUserEmail(){
			return $this->user_email;
		}

		function setUserPassword($user_password){
			$this->user_password=$user_password;
		}

		function getUserPassword(){
			return $this->user_password;
		}

		function setUserProfile($user_profile){
			$this->user_profile=$user_profile;
		}

		function getUserProfile(){
			return $this->user_profile;
		}

		function setUserStatus($user_status){
			$this->user_status=$user_status;
		}

		function getUserStatus(){
			return $this->user_status;
		}

		function setUserCreatedOn($user_created_on){
			$this->user_created_on=$user_created_on;
		}

		function getUserCreatedOn(){
			return $this->user_created_on;
		}

		function setUserVerificationCode($user_varification_code){
			$this->user_varification_code=$user_varification_code;
		}

		function getUserVerificationCode(){
			return $this->user_varification_code;
		}

		function setUserLoginStatus($user_login_status){
			$this->user_login_status=$user_login_status;
		}

		function getUserLoginStatus(){
			return $this->user_login_status;
		}

		// function make_avatar($character){
	 //    $path = "images/". time() . ".png";
		// 	$image = imagecreate(200, 200);
		// 	$red = rand(0, 255);
		// 	$green = rand(0, 255);
		// 	$blue = rand(0, 255);
	 //    imagecolorallocate($image, $red, $green, $blue);  
	 //    $textcolor = imagecolorallocate($image, 255,255,255);

	 //    $font = dirname(__FILE__) . '/font/arial.ttf';

	 //    imagettftext($image, 100, 0, 55, 150, $textcolor, $font, $character);
	 //    imagepng($image, $path);
	 //    imagedestroy($image);
	 //    return $path;
		// }
		function get_user_data_by_email(){
			$servername = "localhost";
			$username = "root";
			$password = "";
			// Create connection
			$con = mysqli_connect($servername, $username, $password, "chat_application") or die('connection failed');
			$user_email=$_POST['user_email'];
			$sql="Select * from chat_user_table where user_email = '$user_email'";
			$result=mysqli_query($con,$sql) or die("Sql query failed");
			if(mysqli_num_rows($result)>0){
				$user_data=mysqli_fetch_array($result);//mysqli_fetch_all($result, MYSQLI_ASSOC);
				return $user_data;
			}
		}

		function save_data(){	
			$servername = "localhost";
			$username = "root";
			$password = "";
			$con = mysqli_connect($servername, $username, $password, "chat_application") or die('connection failed');
			$user_name=$this->user_name;
			$user_email=$this->user_email;
			$user_password=$this->user_password;
			$user_status=$this->user_status;
			$user_created_on=$this->user_created_on;
			$user_varification_code=$this->user_varification_code;
			$query="INSERT INTO chat_user_table(user_name, user_email, user_password, user_status, user_created_on, user_varification_code)
			VALUES ('$user_name', '$user_email', '$user_password','$user_status','$user_created_on','$user_varification_code')";
			if(mysqli_query($con,$query)){
				return true;
			}else{
				return false;
			}
		}

		function is_valid_email_verification_code(){
			$servername = "localhost";
			$username = "root";
			$password = "";
			// Create connection
			$con = mysqli_connect($servername, $username, $password, "chat_application") or die('connection failed');
			$user_varification_code=$this->user_varification_code;
			$sql="Select * from chat_user_table where user_varification_code = '$user_varification_code'";
			$result=mysqli_query($con,$sql) or die("Sql query failed");
			if(mysqli_num_rows($result)>0){
				return true;
			}else{
				return false;
			}
		}

		function get_user_data_by_id(){
			$servername = "localhost";
			$username = "root";
			$password = "";
			// Create connection
			$con = mysqli_connect($servername, $username, $password, "chat_application") or die('connection failed');
			$user_id=$this->user_id;
			$sql="Select * from chat_user_table where user_id = '$user_id'";
			$result=mysqli_query($con,$sql) or die("Sql query failed");
			if(mysqli_num_rows($result)>0){
				$user_data=mysqli_fetch_array($result);
				return $user_data;
			}
		}

		function enable_user_account(){
			$servername = "localhost";
			$username = "root";
			$password = "";
			// Create connection
			$con = mysqli_connect($servername, $username, $password, "chat_application") or die('connection failed');
			$user_status=$this->user_status;
			$user_varification_code=$this->user_varification_code;
			$upadate_status="Update chat_user_table set user_status = '$user_status' where user_varification_code = '$user_varification_code'";
			if(mysqli_query($con,$upadate_status)){
				return true;
			}else{
				return false;
			}
		}

		function update_user_login_data(){
			$servername = "localhost";
			$username = "root";
			$password = "";
			// Create connection
			$con = mysqli_connect($servername, $username, $password, "chat_application") or die('connection failed');
			$user_login_status=$this->user_login_status;
			$user_id=$this->user_id;
			$upadate_status="Update chat_user_table set user_login_status = '$user_login_status' where user_id = $user_id";
			if(mysqli_query($con,$upadate_status)){
				return true;
			}else{
				return false;
			}
		}

		function upload_image($user_profile){
			$extension = explode('.', $user_profile['name']);
			$new_name = rand() . '.' . $extension[1];
			$destination = 'images/' . $new_name;
			move_uploaded_file($user_profile['tmp_name'], $destination);
			return $destination;
		}

		function update_data(){
			$servername = "localhost";
			$username = "root";
			$password = "";
			// Create connection
			$con = mysqli_connect($servername, $username, $password, "chat_application") or die('connection failed');
			$user_id=$this->user_id;
			$user_name=$this->user_name;
			$user_email=$this->user_email;
			$user_password=$this->user_password;
			$user_profile=$this->user_profile;
			$upadate_profile="Update chat_user_table set user_name = '$user_name',user_email = '$user_email',user_password = '$user_password',user_profile = '$user_profile' where user_id = $user_id";
			if(mysqli_query($con,$upadate_profile)){
				return true;
			}else{
				return false;
			}
		}
	}
?>