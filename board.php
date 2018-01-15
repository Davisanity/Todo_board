<html>
<title>Let me show You what you do</title>
<head><link rel=stylesheet type="text/css" href="css/board_view.css"></head>
<body background="Pics/board_back.jpg " background-repeat: repeat-x;>
  <h1 id="content">來看看這些日子你做了什麼吧</h1>
  <a href="profile.php"  title="back">點我返回表單</a>
  <!--上面那行如果加上 target="_blank"  會變成開新分頁-->
  <table name="board" bgcolor="00FF99">
  <?php
  require_once('connsql.php');
  $conn=mysqli_connect($servername,$username,$password,$dbname);
//  $db_note = ["","note_pro","note_reading","note_writing","note_englishing","note_movie","note_sport","note_other"];
  $sql = "SELECT * FROM second2016 ORDER by dates ASC"; //在things資料表中選擇所有欄位
  mysqli_query($conn,  "SET collation_connection = ‘utf8_general_ci‘");
  $query_result = mysqli_query($conn,$sql); // 執行SQL查詢
  //$result = mysqli_fetch_assoc($query_result); //將陣列以欄位名索引
  //$total_fields=mysqli_num_fields($query_result); // 取得欄位數(會是8 因為有8個欄位)
  $total_records=mysqli_num_rows($query_result);  // 取得記錄數
  echo '<tr>';
    echo '<th>'."日期".'</th>';
    echo '<th>'."專業".'</th>';
    echo '<th>'."閱讀".'</th>';
    // echo '<th>'."寫字".'</th>';
    echo '<th>'."語文".'</th>';
    echo '<th>'."影片".'</th>';
    echo '<th>'."健身".'</th>';
    echo '<th>'."其他".'</th>';
  echo '</tr>';
  for($i=0;$i<$total_records;$i++){
    $result = mysqli_fetch_assoc($query_result); //將陣列以欄位名索引
    echo '<tr>';
      echo '<td>'.$result["dates"].'</td>';        //–印出id欄位的值
      echo '<td>'.$result["note_pro"].'</td>'; //<!–印出name欄位的值–>
      echo '<td>'.$result["note_reading"].'</td>';     //<!–印出age欄位的值–>
      // echo '<td>'.$result["note_writing"].'</td>';
      echo '<td>'.$result["note_language"].'</td>';
      echo '<td>'.$result["note_movie"].'</td>';
      echo '<td>'.$result["note_sport"].'</td>';
      echo '<td>'.$result["note_other"].'</td>';
    echo '</tr>';
  }

  ?>
  </table>
</body>
</html>
