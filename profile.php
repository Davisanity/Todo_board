<html>
<title>Show Me what you do</title>

<!-- <script>
 $(document).ready(function(){
  $("#checkALL").click(function(){
   if($("#checkALL").prop("checked")){//如果全選按鈕有被選擇的話（被選擇是true）
    $("input[name='check[]']").each(function(){
     $(this).prop("checked",true);//把所有的核取方框的property都變成勾選
    })
   }else{
    $("input[name='check[]']").each(function(){
     $(this).prop("checked",false);//把所有的核方框的property都取消勾選
    })
   }
  })
 })
</script> -->
<head><link rel=stylesheet type="text/css" href="css/board_view.css"></head>
<body background="Pics/background.jpg " background-repeat: repeat-x;>

  <img src="Pics/profile.jpg" id="profile">
  <form action="todo_add.php" method="get" name="form">
  <div id="content">
    <p><input type=date name="modify_date" value="<?php echo date('Y-m-d'); ?>"></p>
    <p><input type="checkbox" name="check1" value=""><input type="text" name="note1">學專業 </p>
    <p><input type="checkbox" name="check2" value=""><input type="text" name="note2">讀本書 </p>
    <!-- <p><input type="checkbox" name="check3" value=""><input type="text" name="note3">練字帖 </p> -->
    <p><input type="checkbox" name="check3" value=""><input type="text" name="note3">學語言 </p>
    <p><input type="checkbox" name="check4" value=""><input type="text" name="note4">看影片 </p>
    <p><input type="checkbox" name="check5" value=""><input type="text" name="note5">健個身 </p>
    <p><input type="checkbox" name="check6" value=""><input type="text" name="note6">其他事 </p>
    <input type="submit" value="更新資料" />
    <input type="button" value="去看看" onclick="location.href='http://140.115.52.40:81/Todo_board/board.php'">

  </div>
  </form>
  <script src="js/main.js"></script>
</body>
</html>
