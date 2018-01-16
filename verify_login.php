<!DOCTYPE html>
<html>
<head>
	<title>這裡要新增使用者資料並跳轉到profile</title>
</head>
<body>
	<script type="text/javascript">
    function s_error(){
        alert("這組帳號有人用過了!");
        location.href='index.php';
    }
    // $(document).ready(function(){
  		// $('#sig a').trigger('click');
    // });
    function s_success(){
    	 alert("恭喜註冊成功!");
        location.href='index.php';
    }
    function l_error(){
    	alert("帳號或密碼有誤!");
    	location.href='index.php';
    }
    function l_success(){
    	// alert("歡迎回來!");
    	location.href='profile.php';
    }
	</script>
<pre>
<?php
  require_once('connsql.php');
  $conn=mysqli_connect($servername,$username,$password,$dbname);
  // button sign up pressed
  if (isset($_POST["btn_s"])){
  	$sign_id=$_POST['s_id'];
  	$sign_pass=$_POST['s_pass'];
  	$query = "SELECT * FROM `user` WHERE `account`= '$sign_id'";
  	echo $query;
  	$result=mysqli_query($conn,$query);
  	// $row = @mysqli_fetch_row($result);
	// echo $row[0];
	//這是印出query到的資料
	$total_records = mysqli_num_rows($result);
	echo $total_records;
	//印出查詢到的筆數	
	if ($total_records>0) {
		echo "<script>s_error();</script> "; 
  	}else{
  		$insert = "INSERT INTO `user`(`account`, `password`) VALUES ('$sign_id','$sign_pass')";
  		if(mysqli_query($conn,$insert)){
  			echo "<script>s_success();</script> "; 
  			echo("success\n");
  		}else{
  			echo "Error: ".$sql."<br>".mysqli_error($conn)."\n";
  		}
  	}
  	
  } 
  // button log in pressed
  else if (isset($_POST["btn_l"])){
  	$login_id=$_POST['l_id'];
  	$login_pass=$_POST['l_pass'];
  	$query = "SELECT * FROM `user` WHERE `account`= '$login_id' AND `password`= '$login_pass' ";
  	$result=mysqli_query($conn,$query);
  	$total_records = mysqli_num_rows($result);
  	if($total_records==1){
  		echo "login success";
  		echo "<script>l_success();</script> "; 
  	}else{
  		echo "login error";
  		echo "<script>l_error();</script> "; 
  	}

  }

  



  // header("location:profile.php");
?>
</pre>	
<script src="js/login_index.js"></script>
</body>
</html>