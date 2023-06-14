<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>One hour - one site </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
<div class="d-flex align-items-center justify-content-center block-size" >
    <div class="text-center text">
        <h1>Произошла помилка</h1>
        <?php
        $error_code = $_GET['error_code'];
        if($error_code == 1) {
            echo "<p>Ім'я або назва сайту має бути довжиною від 3 до 20 символів</p>";
        } else if($error_code == 2) {
            echo "<p>Введіть правильну адресу електронної пошти</p>";
        } else if($error_code == 3) {
            echo "<p>Введіть правильний номер телефону з кодом</p>";
        } else {
            echo "<p>Ошибка 404</p>";
        }
        ?>
        <a href="/" class="btn btn-secondary">Повернутися на головну</a>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>