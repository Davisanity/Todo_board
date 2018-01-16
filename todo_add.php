<html>
<title>這裡的資料庫是連成一塊的</title>
<body>
<pre>
<?php
  require_once('connsql.php');
  $conn=mysqli_connect($servername,$username,$password,$dbname);
  // $db_note = ["","note_pro","note_reading","note_writing","note_englishing","note_movie","note_sport","note_other"];
  $db_note = ["","note_pro","note_reading","note_language","note_movie","note_sport","note_other"];
  $d=$_GET['modify_date'];
  $dates=date('Y-m-d',strtotime($d));
  $talbe_name='second2016';
  echo $dates."\n";

  for($i=1;$i<7;$i++){
    @$check[$i]=$_GET['check'.$i];
    @$note[$i]=$_GET['note'.$i];
    if(isset($_GET['check'.$i])){
      $sql="SELECT * FROM $talbe_name WHERE dates='$dates'";
      $result=mysqli_query($conn,$sql);
      @$row_count=mysqli_num_rows($result);
      // echo $row_count;
      if($row_count==0){
        $insert="INSERT INTO $talbe_name(dates) VALUE('$dates')";
        if(mysqli_query($conn,$insert)){
            $update ="UPDATE $talbe_name SET $db_note[$i]='$note[$i]' WHERE dates='$dates'";//這些單引號是必需的
            mysqli_query($conn,$update);
            echo $i." 's New record added successfully"."\n";
        }else{
          echo "Error: ".$sql."<br>".mysqli_error($conn)."\n";
        }
      }
      else{
        // echo $db_note[1]." ".$note[1]." ".$dates." ";
        $update ="UPDATE $talbe_name SET $db_note[$i]='$note[$i]' WHERE dates='$dates'";//這些單引號是必需的
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
