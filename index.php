<html>
<title>Show Me what you do</title>
<head><link rel=stylesheet type="text/css" href="board_view.css"></head>
<body background="Pics/background.jpg " background-repeat: repeat-x;>

  <img src="Pics/profile.jpg" id="profile">
  <form action="todo_add.php" method="get" name="form">
  <div id="content">
    <p><input type=date name="modify_date" value="<?php echo date('Y-m-d'); ?>"></p>
    <p><input type="checkbox" name="check1" value=""><input type="text" name="note1">學專業 </p>
    <p><input type="checkbox" name="check2" value=""><input type="text" name="note2">看小說 </p>
    <p><input type="checkbox" name="check3" value=""><input type="text" name="note3">練字帖 </p>
    <p><input type="checkbox" name="check4" value=""><input type="text" name="note4">讀英文 </p>
    <p><input type="checkbox" name="check5" value=""><input type="text" name="note5">看電影 </p>
    <p><input type="checkbox" name="check6" value=""><input type="text" name="note6">去運動 </p>
    <p><input type="checkbox" name="check7" value=""><input type="text" name="note7">其他事 </p>
    <input type="submit" value="更新資料" />
  </div>
  </form>
</body>
</html>
