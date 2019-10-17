<?php
if(isset($_GET['id'])){
include_once('categor.php');
}elseif($_GET['id_book']){
   include_once('book.php');

} else {
?>

<div id="content">
   <?php require_once "view/categor.php"?>
   <h1>Добро пожаловать!</h1>
   <h1>Здесь моглы бы быть Ваша реклама</h1>
  </div>

<? } ?>