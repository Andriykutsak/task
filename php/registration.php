<?php 
$config = array(); // указываем, что переменная $config это массив  
$config['server'] = "localhost"; //сервер MySQL. Обычно это localhost  
$config['login'] ="root"; //пользователь MySQL  
$config['passw'] = ""; //пароль от пользователя MySQL  
$config['name_db'] = "common"; //название нашей БД  

$connect = mysqli_connect($config['server'], $config['login'], $config['passw'],$config['name_dg']) or die("connect erorr Error!"); // подключаемся к MySQL или, в случаи  ошибки, прекращаем выполнение кода 
  
?>
<div align="center" id="error"> <?php //а тут уже будем писать код ?></div>
?>
<?php
if(isset($_POST['submit'])){ //выполняем нижеследующий код, только если нажата кнопка 
$query = mysql_query("SELECT * FROM `users`  WHERE `login`='".$_POST['login']."'"); //отправляем запрос на выборку всего содержимого , где поле логин равно переменной $login  
  $row = mysql_num_rows($query); // считаем количество рядов результата запроса  
if(empty($_POST['login'])){ //если переменная логина пуста или не существует  
echo"Вы не ввели логин"; // выводим сообщение об ошибке  
  }elseif(!preg_match("/[-a-zA-Z0-9]{3,15}/", $_POST['login'])){ //если переменная не соответствует шаблону -a-zA-Z0-9  
echo"Вы неправильно ввели логин"; // выводим сообщение об ошибке   
  }elseif(empty($_POST['password'])){ //если переменная логина пуста или не существует  
echo"Вы не ввели пароль"; // выводим сообщение об ошибке  
  }elseif($row > 0){ //если переменная больше 0  
echo"Такой пользователь уже существует!"; // выводим сообщение об ошибке  
  }elseif(!preg_match("/[-a-zA-Z0-9]{3,30}/", $_POST['password'])){ //если переменная не соответствует шаблону -a-zA-Z0-9  
echo"Вы неправильно ввели пароль"; // выводим сообщение об ошибке   
  }elseif(empty($_POST['password2'])){ //если переменная логина пуста или не существует  
echo"Вы не ввели подтверждение пароля"; // выводим сообщение об ошибке  
  }elseif(!preg_match("/[-a-zA-Z0-9]{3,30}/", $_POST['password2'])){ //если переменная не соответствует шаблону -a-zA-Z0-9  
echo"Вы неправильно ввели подтверждение пароля"; // выводим сообщение об ошибке   
  }elseif($_POST['password'] != $_POST['password2']){ //если переменная пароля и переенная  повтора пароля не одинаковы  
echo"Вы неправильно ввели подтверждение пароля"; // выводим сообщение об ошибке   
  }elseif(empty($_POST['email'])){ //если переменная E-mail'a пуста   
echo"Вы не ввели E-mail"; // выводим сообщение об ошибке   
  }elseif(!preg_match("/[-a-zA-Z0-9_]{3,20}@[-a-zA-Z0-9]{2,64}\.[a-zA-Z\.]{2,9}/", $_POST['email'])){ //регулярка на проверку правильности email  
echo"Вы неправильно ввели E-mail"; // выводим сообщение об ошибке   
  }else{ //если же ошибок нет  
  $login = $_POST['login']; //присваеваем переменную  
  $password = md5($_POST['password']);//присваеваем переменную и кодируем её в md5 для безопасности  
  $email = $_POST['email'];//присваеваем переменную  
   
  $insert = mysql_query("INSERT INTO `users` (`login` ,`password` ,`email` ) VALUES ('$login', '$password', '$email')"); //выполняем запрос на добавление нового пользователя  
  if($insert == true){  
  echo "Вы успешно зарегистрированы!";  
  }else{  
  echo "Непредвиденная ошибка!";  
  }  
   
  }  

}  
 ?>