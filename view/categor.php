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

<?php

   $books = mysqli_query($db_connection, "SELECT * FROM `book` WHERE `id_genres` = ". $_GET['id'] );


  if($books)
  {

  $games_exist = true;
  if( mysqli_num_rows($books) <= 0)
  {
  echo 'Книг не существует';
  $games_exist = false;
  }

  while($book = mysqli_fetch_assoc($books))
  {
  ?>
  <a href="index.php?id_book=<?= $book['id_book']; ?>"><?php echo $book['name_book']; ?></a>

  <div><?php echo mb_substr(strip_tags($book['description']), 0, 100, 'utf-8') . '...'; ?>
  </div>

<? }}?>              