<?php

// Перевіряємо, чи була натиснута кнопка "send"
if (isset($_POST['send'])) {
    // Отримуємо та очищуємо дані від зайвих символів
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $phone = test_input($_POST["phone"]);
    $website = test_input($_POST["website"]);

    // Валідація імені та веб-сайту
    if(strlen($name) < 3 || strlen($name) > 20 || strlen($website) < 3 || strlen($website) > 20) {
        // Якщо валідація не пройдена, робимо редирект на сторінку з помилкою
        header('Location: http://localhost/error.php?error_code=1');
        exit();
    }

    // Валідація електронної пошти
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Якщо валідація не пройдена, робимо редирект на сторінку з помилкою
        header('Location: http://localhost/error.php?error_code=2');
        exit();
    }

    // Валідація українського номеру телефону
    if(!preg_match("/^(\+380)[0-9]{9}$/", $phone)) {
        // Якщо валідація не пройдена, робимо редирект на сторінку з помилкою
        header('Location: http://localhost/error.php?error_code=3');
        exit();
    }

    // Читаємо файл, де лежить база, в рядковому представленні
    $data = file_get_contents('db.txt');
    // Перетворюємо рядок в масив PHP
    $db = json_decode($data, 1);
    // Якщо файл був порожнім, він поверне null, тобто $db = [];
    if ($db == null) {
        $db = [];
    }

    // Додаємо новий елемент в кінець масиву
    $db[] = [
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'website' => $website
    ];

    // Перетворюємо в рядок
    $str = json_encode($db);
    // Записуємо рядок в файл
    file_put_contents('db.txt', $str);

    // Надсилаємо заголовок на редирект сторінки за адресою
    header('Location: http://localhost:8000/ok.php');
    exit;
}
header('Location: http://localhost:8000/');
exit;

// Функція для очищення даних
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


