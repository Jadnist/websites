<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name'])) {$name = $_POST['name'];}
    if (isset($_POST['phone'])) {$phone = $_POST['phone'];}
    // if (isset($_POST['email'])) {$email = $_POST['email'];}
    if (isset($_POST['formData'])) {$formData = $_POST['formData'];}

    $to = "info@tlk-avtoput.ru"; /*Укажите адрес, га который должно приходить письмо*/
    $sendfrom   = "info@tlk-avtopyt.ru"; /*Укажите адрес, с которого будет приходить письмо, можно не настоящий, нужно для формирования заголовка письма*/
    $headers  = "From: " . strip_tags($sendfrom) . "\r\n";
    $headers .= "Reply-To: ". strip_tags($sendfrom) . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html;charset=utf-8 \r\n";
    $subject = "$formData";
    $message = "$formData
<br>Форма М<br><b>Имя:</b> $name
<br><b>Телефон:</b> $phone";
    $send = mail ($to, $subject, $message, $headers);
    if ($send == 'true')
    {
    echo '<center>

Спасибо за отправку вашей заявки!<br>В течении 5 минут наш менеджер свяжеться с вами!

</center>';
    }
    else
    {
    echo '<center>

<b>Ошибка. Сообщение не отправлено!</b>

</center>';
    }
} else {
    http_response_code(403);
    echo "Попробуйте еще раз";
}?>
