<?php 
function validation($value='')
{
/*clean user data*/
function clean($value = "") {
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);
    return $value;
};
/*check  lenght*/
function check_length($value = "", $min, $max) {
    $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
    return !$result;
}
/* call clean function*/

$email = clean($email);
$password = clean($password);

if(!empty($email) && !empty($password)) {
    echo "string";
}

if(!empty(!empty($password) && !empty($email))) {
    $email_validate = filter_var($email, FILTER_VALIDATE_EMAIL); 

    if(check_length($password, 2, 1000) && $email_validate) {
        echo "string";
    }
}

if(!empty($email) && !empty($password)) {
    $email_validate = filter_var($email, FILTER_VALIDATE_EMAIL); 

    if(check_length($password, 2, 1000) && $email_validate) {
        echo "Спасибо за сообщение";
    }
}
if(!empty($email)) {
    $email_validate = filter_var($email, FILTER_VALIDATE_EMAIL); 

    if(check_length($password, 2, 1000) && $email_validate) {
        echo "Спасибо за сообщение";
        sayHi();
    } else { // добавили сообщение
        echo "Введенные данные некорректные";
    }
} else { // добавили сообщение
    echo "Заполните пустые поля";
}
};
 ?>