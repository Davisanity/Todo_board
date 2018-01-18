<html>
<title>Show Me what you do</title>

<script>
 // $(document).ready(function(){
 //  $("#checkALL").click(function(){
 //   if($("#checkALL").prop("checked")){//如果全選按鈕有被選擇的話（被選擇是true）
 //    $("input[name='check[]']").each(function(){
 //     $(this).prop("checked",true);//把所有的核取方框的property都變成勾選
 //    })
 //   }else{
 //    $("input[name='check[]']").each(function(){
 //     $(this).prop("checked",false);//把所有的核方框的property都取消勾選
 //    })
 //   }
 //  })
 // })
 function check_add_todo(){
  var n[6];
  n[0]  = document.form.note1.value;
  n[1] = document.form.note2.value;
  n[2] = document.form.note3.value;
  n[3] = document.form.note4.value;
  n[4] = document.form.note5.value;
  n[5] = document.form.note6.value;
  for (var i=0;i<6;i++){
    if(! anti_sql_inj(n[i])){
      alert("NO");
      return false;
    }
  }
  return true;
 }
 function anti_sql_inj(input){
  for (var i=0;i<input.length;i++){
    if( input.charAt(i) == '\'' || input.charAt(i) == '\"' ){
      alert("Want to sql injection?Please don't do that! \n");
      return false;
    }
  }
  return true;
}
</script>
<head><link rel=stylesheet type="text/css" href="css/board_view.css"></head>
<body background="Pics/background.jpg " background-repeat: repeat-x;>
  <div id="content">
  <img src="Pics/profile.jpg" id="profile">
  <p>歡迎回來 
  <?php
  session_start();
  echo $_SESSION['l_id'];
  // SESSION是全局变量，也就是说，它只要被声明，在所有页面都是可用的，前提是你不关闭网页或者没有到SESSION的生命周期
  ?>
  </p>
  </div>
  <form name="form" action="todo_add.php" onsubmit="return check_add_todo()" method="get">
  <div id="content">
    <p><input type=date name="modify_date" value="<?php echo date('Y-m-d'); ?>"></p>
    <p><input type="checkbox" name="check1" value=""><input type="text" name="note1">學專業 </p>
    <p><input type="checkbox" name="check2" value=""><input type="text" name="note2">讀本書 </p>
    <!-- <p><input type="checkbox" name="check3" value=""><input type="text" name="note3">練字帖 </p> -->
    <p><input type="checkbox" name="check3" value=""><input type="text" name="note3">學語言 </p>
    <p><input type="checkbox" name="check4" value=""><input type="text" name="note4">看影片 </p>
    <p><input type="checkbox" name="check5" value=""><input type="text" name="note5">健個身 </p>
    <p><input type="checkbox" name="check6" value=""><input type="text" name="note6">其他事 </p>
       <input type="hidden" name="note7" value=<?php echo '"'.$_SESSION['l_id'].'"'; ?> >
    <input type="submit" value="更新資料" />
    <input type="button" value="去看看" onclick="location.href='board.php'">
    <input type="button" value="登出" onclick="location.href='index.php'">
  </div>
  </form>
  <script src="js/profile.js"></script>
</body>
</html>
