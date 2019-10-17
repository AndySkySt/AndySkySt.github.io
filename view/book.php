<?php

$dblocation = 'localhost';
$dbname = 'libr';
$dbuser = 'root';
$dbpassw = '';

$db_connection = mysqli_connect($dblocation, $dbuser, $dbpassw, $dbname);
if (! $db_connection){
  echo "Ошибка доступа к MySql";
  exit();
}
if (! mysqli_select_db($db_connection, $dbname)){
  echo 'Ошибка доступа к базе данных: ($dbname)';
  exit();
}
?>
<div id="content">
	<?php
$rs = mysqli_query($db_connection, "SELECT * FROM `book`WHERE id_book =".$_GET['id_book'] );
  while (($b = mysqli_fetch_assoc($rs))){ ?>
			
			<img src="<?= $b['image'] ?>">
			<br>
			Название книги: <?= $b['name_book']; ?>
			<br>
			Описание: <?= $b['description'] ?>;
			<br>
			<a href="<?php echo $b['book'];?>"><?php echo 'Cсылка на скачивание книги'?></a>

  
<? } ?>
</div>