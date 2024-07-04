<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $message = trim($_POST["message"]);

    if (empty($name) || empty($message)) {
        http_response_code(400);
        echo "Пожалуйста, заполните форму корректно и попробуйте снова.";
        exit;
    }

    $recipient = "ersultanbai17@gmail.com"; // Замените своим email
    $subject = "Новое сообщение с сайта от $name";
    $email_content = "Имя: $name\n";
    $email_content .= "Сообщение:\n$message\n";

    $email_headers = "From: $name <$recipient>";

    if (mail($recipient, $subject, $email_content, $email_headers)) {
        http_response_code(200);
        echo "Спасибо! Ваше сообщение было отправлено.";
    } else {
        http_response_code(500);
        echo "Что-то пошло не так, сообщение не было отправлено.";
    }
} else {
    http_response_code(403);
    echo "Был возникнут ошибка при отправке сообщения.";
}
?>
