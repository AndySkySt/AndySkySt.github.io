
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

<div id="menu">
<?php

/*модель для таблицы жанров*/
$rs = mysqli_query($db_connection, "SELECT * FROM `genres`");?>
<ul>
<?php
  while (($cat = mysqli_fetch_assoc($rs))){
  ?>
  <li><a href="index.php?id=<?php echo $cat['id_genres'];?>"><?php
    echo $cat['name_genres'];?></a><li>
    <?php
  }
  ?>
</ul>
</div>
<?php
mysqli_close ($db_connection);
?>