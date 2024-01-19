<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
        .additional-select {
            display: none;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container"> 
        <h1>Добро пожаловать!</h1>

        <script>
            function toggleAccordion(header) {
                var accordionItem = header.parentNode;
                accordionItem.classList.toggle('active');
            }
        </script>

        <div class="inp">
            <form id="admin" action="download.php" method="post">
                <label for="organization_type"> Войдите чтобы скачать результаты:</label>

                <label for="organization_name"> Логин:</label>
                <input type="text" id="organization_name" name="organization_name" required>

                <label for="leader_name"> Пароль:</label>
                <input type="password" id="leader_name" name="leader_name" required>

                <input type="submit" value="Войти">
            </form>
        </div>
    </div>
    <script>
document.getElementById("admin").addEventListener("submit", function(event) {
    // Получаем значения логина и пароля
    var login = document.getElementById("organization_name").value;
    var password = document.getElementById("leader_name").value;

    // Проверяем, совпадают ли логин и пароль с ожидаемыми значениями
    if (login !== "admin" || password !== "admin") {
        // Если не совпадают, предотвращаем отправку формы
        event.preventDefault();

        // Выводим сообщение об ошибке
        Swal.fire({
        icon: 'error',
        title: 'Ошибка',
        text: 'Логин или пароль неверны',
    });
    }
});
</script>
</body>

</html>