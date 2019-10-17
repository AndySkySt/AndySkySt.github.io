 <!DOCTYPE html>
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
<html>
    <head>
        <header>
            <div id="logo"> 
                <a href="http://library.ru/" title="На главную страницу">
                    <img src="img/Booktravel.png" title="library.ru" alt="library.ru">
                    <span>Lybrary</span> 
                </a>
            </div>
            
            <div id="reg_auth">
   <div class="auth">
                
<?php if(!(isset($_SESSION['login']))){ ?>
    <form name="login-form" class="sign-up-form" method="post">

    <input type="text" name="login" placeholder="Логин" required><br>
    <input type="password" name="password" placeholder="Пароль" required><br>
    <input type="submit" name="enter" value="Войти">

    <p><br>Впервые на сайте?<br> <a href="view/register.php">Зарегистрируйтесь</a></p>
    </form>
<? } else { ?>
   
   <form method="get">
        <?php echo $_SESSION['login'] ?>
        <input type=submit name="off" value="Выход">            
    </form>

<? }

    if(isset($_GET['off'])){
        unset($_SESSION['login']);
        session_unset();
        session_destroy();
    }
?>
                 <?php
                
                if(isset($_POST['enter']))
                {
                    $login = $_POST['login'];
                    $hashedPass = md5($_POST['password']);

                    $sql = "SELECT * FROM user WHERE `login` = '{$login}' AND `password` = '{$hashedPass}' LIMIT 1";
                    $query = mysqli_query($db_connection, $sql);

                    if(mysqli_num_rows($query) == 1){
                        while ($row = mysqli_fetch_assoc($query)) {
                            $_SESSION['id'] = $row['id'];
                            $_SESSION['login'] = $row['login'];
                            $_SESSION['admin'] = $row['admin'];
                        }
                    }
                    else
                    {
                        echo 'Неправильный логин / пароль';
                    }
                }
                
                ?>
        </header>
    </head>
<body>
</body>
</html>