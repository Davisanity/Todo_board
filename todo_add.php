<html>
<title>這裡的資料庫是連成一塊的</title>
<body>

<pre>
<?php
  require_once('connsql.php');
  $conn=mysqli_connect($servername,$username,$password,$dbname);
  // $db_note = ["","note_pro","note_reading","note_writing","note_englishing","note_movie","note_sport","note_other"];
  $db_note = ["","note_pro","note_reading","note_language","note_movie","note_sport","note_other","user_id"];
  $d=$_GET['modify_date'];
  $dates=date('Y-m-d',strtotime($d));
  $y = date('Y',strtotime($d));
  echo $y."\n";
  echo $dates."\n";
  if(strtotime($d)<strtotime($y.'-09-01')){
    $talbe_name= $y."first";
  }else{
    $talbe_name= $y."second";
  }
  echo $talbe_name."\n";

  // $show="SHOW TABLES LIKE '".$talbe_name."'";
  $show="SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'add_todo' AND engine = 'InnoDB' AND TABLE_NAME='$talbe_name'";
  echo $show."\n";
  $result=mysqli_query($conn,$show);
  $row_count=mysqli_num_rows($result);
  if($row_count==0){
    $create_table="CREATE TABLE `add_todo`.`$talbe_name` ( `dates` DATE NOT NULL , `note_pro` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `note_reading` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `note_language` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `note_movie` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `note_sport` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `note_other` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `user_id` VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ) ENGINE = InnoDB; ";
    $create = mysqli_query($conn,$create_table);
    echo "create $talbe_name \n";
  }else{
    echo "table exists\n";
  }
  $user_id = $_GET['note7'];
  echo $user_id."\n";
  for($i=1;$i<8;$i++){
    @$check[$i]=$_GET['check'.$i];
    @$note[$i]=$_GET['note'.$i];

    if(isset($_GET['check'.$i])){
      $sql="SELECT * FROM $talbe_name WHERE dates='$dates' AND user_id='$user_id'";
      $result=mysqli_query($conn,$sql);
      @$row_count=mysqli_num_rows($result);
      // echo $row_count;
      if($row_count==0){
        $insert="INSERT INTO $talbe_name(dates,user_id) VALUE('$dates','$user_id')";
        if(mysqli_query($conn,$insert)){
            $update ="UPDATE $talbe_name SET $db_note[$i]='$note[$i]' WHERE dates='$dates' AND user_id='$user_id' ";//這些單引號是必需的
            mysqli_query($conn,$update);
            echo $i." 's New record added successfully"."\n";
        }else{
          echo "Error: ".$sql."<br>".mysqli_error($conn)."\n";
        }
      }
      else{
        // echo $db_note[1]." ".$note[1]." ".$dates." ";
        $update ="UPDATE $talbe_name SET $db_note[$i]='$note[$i]' WHERE dates='$dates' AND user_id='$user_id' ";//這些單引號是必需的
        if(mysqli_query($conn,$update)){
          echo $i." updated"."\n";
        }
        else{
          echo "Error: ".$update."<br>".mysqli_error($conn)."\n";
        }
      }
    }else{
      echo $i." nothing happend!"."\n";
    }
  }

  mysqli_close($conn);
  header("location:profile.php");
  // header location means 跳轉到哪個頁面
?>
</pre>

</body>
</html>

<!-- 新增資料庫 -->
<!-- 
CREATE TABLE `add_todo`.`2016second` ( `dates` DATE NOT NULL , `note_pro` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `note_reading` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `note_language` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `note_movie` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `note_sport` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `note_other` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `user_id` VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ) ENGINE = InnoDB; 
-->