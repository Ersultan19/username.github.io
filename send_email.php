<?php
$to = "ersultanbai17@gmail.com";//Почтовый ящик, на который будет отправлено сообщение
$subject = "Тема сообщения";//Тема сообщения
$headers = "Content-type: text/html; charset=utf-8 \r
";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["username"])){
        $name = trim(strip_tags($_POST["username"]));
    }
    if(isset($_POST["usernumber"])){
        $number = trim(strip_tags($_POST["usernumber"]));
    }
    if (isset($_POST["question"])) {
        $question = trim(strip_tags($_POST["question"]));
    }
  
    $message = "<html>";
    $message .= "<body>";
    $message .= "Телефон: ".$number;
    $message .= "<br />";
    $message .= "Имя: ".$name;
    $message .= "<br />";
    $message .= "Вопрос: ".$question;
    $message .= "</body>";
    $message .= "</html>";
  
    mail($to, $subject, $message, $headers);
} else {
    exit;
} 
?>
