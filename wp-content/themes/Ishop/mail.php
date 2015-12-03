<?php
if ($_POST['submit']){
    $namef = $_REQUEST['namef'];
    $price = $_REQUEST['price'];
    $kol = $_REQUEST['kol'];
    $total = $_REQUEST['total'];
    $lsm = count($namef);

    $obsh = $_POST['obsh'];
    $name2=htmlspecialchars($_POST["name2"]);
    $surname=htmlspecialchars($_POST["name1"]);
    $tel=htmlspecialchars($_POST["telephone"]);
    $name3=htmlspecialchars($_POST["name3"]);
    $email=$_POST["email"];
    $city=htmlspecialchars($_POST["city"]);

    if (!empty($surname) && is_email($email)) {
        $body = "<table style='border: 1px solid rgb(240,240,240);'>";
        $mail_subject = "MB-Auto 161";
        $to = "MB-Auto161@yandex.ru, ".$email;
        $mail_headers="content-type:text/html; charset=UTF-8";
        $i=1;

        for ($k = 0; $k < $lsm; $k++) {
            $body = $body."<tr><td style='background-color:rgb(240,240,240);'>{$i}. </td>"."<td style='background-color:rgb(240,240,240);'><b>Название</b>: ".stripslashes($namef[$k])."</td><td style='background-color:rgb(240,240,240);'><b>Цена</b>: ".$price[$k]." </td><td style='background-color:rgb(240,240,240);'><b>Количество</b>:".$kol[$k]." шт.</td><td style='background-color:rgb(240,240,240);'> <b>Цена с учетом количества</b>:".$total[$k]."</td></tr>";
            $i++;
        }
        $body=$body."</table>";
        $body = $body."<table style='border: 1px solid rgb(240,240,240)';><tr><td style='background-color:rgb(240,240,240);'><b>Сумма заказа</b>:</td><td style='background-color:rgb(240,240,240);'> ".$obsh."</td></tr>"."<tr><td style='background-color:rgb(240,240,240);'><b>Имя</b>:</td><td style='background-color:rgb(240,240,240);'> ".$name2."</td></tr>"."<tr><td style='background-color:rgb(240,240,240);'><b>Фамилия</b>:</td><td style='background-color:rgb(240,240,240);'> ".$surname."</td></tr>"."<tr><td style='background-color:rgb(240,240,240);'><b>Отчество</b>:</td><td style='background-color:rgb(240,240,240);'> ".$name3."</td></tr>";
        $body = $body."<tr><td style='background-color:rgb(240,240,240);'><b>Телефон</b>:</td><td style='background-color:rgb(240,240,240);'> ".$tel."</td></tr>"."<tr><td style='background-color:rgb(240,240,240);'><b>Город</b>:</td><td style='background-color:rgb(240,240,240);'> ".$city."</td></tr>"."<tr><td style='background-color:rgb(240,240,240);'><b>E-mail</b>:</td><td style='background-color:rgb(240,240,240);'> ".$email."</td></tr></table>";
        $mailsend = wp_mail ($to, $mail_subject, $body, $mail_headers);
        if ($mailsend == true) { ?>
            <script>alert('Спасибо за заказ. В ближайшее время с вами свяжется менеджер.');</script>
        <?php } else { ?>
            <script>alert('Отправка не удалась, попробуйте еще раз.');</script>
        <?php }
    }
}
?>