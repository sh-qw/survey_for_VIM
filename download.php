<?php
session_start(); ?><?php
$notifValue = isset($_SESSION['notif']) ? $_SESSION['notif'] : 0;
//echo $notifValue;
// Обнуляем значение после использования
include 'functions.php';
$open = checkopen($db);
if($open == 1){
    $txtbuttonclose = 'Закрыть опрос'; 
}else{
    $txtbuttonclose = 'Открыть опрос';
}
$_SESSION['notif'] = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="styles.css">
    
    <script>
        function toggleAccordion(header) {
            var accordionItem = header.parentNode;
            accordionItem.classList.toggle('active');
        }

        // Функция для установки сегодняшней даты в элемент ввода
        function setTodayDate() {
            var today = new Date();
            var year = today.getFullYear();
            var month = String(today.getMonth() + 1).padStart(2, '0');
            var day = String(today.getDate()).padStart(2, '0');

            var todayFormatted = year + '-' + month + '-' + day;

            document.getElementById('end_date').value = todayFormatted;
        }

        // Вызываем функцию при загрузке страницы
        window.onload = setTodayDate;
    </script>
    <style>
        .custom-checkbox {
            display: flex;
            align-items: center;
        }

        .styled-checkbox {
            position: absolute;
            opacity: 0;
        }

        .styled-checkbox+label {
            position: relative;
            padding-left: 28px;
            cursor: pointer;
            font-size: 16px;
            line-height: 20px;
        }

        .highlight-on-hover:hover {
    background-color: #e0e0e0; /* Любой цвет подсветки, который вы предпочитаете */
    cursor: pointer;
        }

        .notification { 

            padding: 5px;
            text-align: center;
            background-color: red;
            color: white;
            border-radius: 5px;
        }

        .close {

        background-color: black;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Добро пожаловать!</h1>

        <?php
        if($notifValue == 1) { echo '<div id="notification" class="notification">

            
            </div>';
        } ?>
        <script>
            function toggleAccordion(header) {
                var accordionItem = header.parentNode;
                accordionItem.classList.toggle('active');
            }

            // Функция для установки сегодняшней даты в элемент ввода
            function setTodayDate() {
                var today = new Date();
                var year = today.getFullYear();
                var month = String(today.getMonth() + 1).padStart(2, '0');
                var day = String(today.getDate()).padStart(2, '0');

                var todayFormatted = year + '-' + month + '-' + day;

                document.getElementById('end_date').value = todayFormatted;
            }

            // Функция для обработки изменений в выборе пользователя
            function handleDownloadOption() {
                var downloadOption = document.getElementById('download_option');
                var dateInputs = document.getElementById('date_inputs');

                // Показываем или скрываем элементы ввода дат в зависимости от выбора
                dateInputs.style.display = downloadOption.checked ? 'block' : 'none';
            }

            // Вызываем функцию при загрузке страницы
            window.onload = function() {
                setTodayDate();
                handleDownloadOption(); // Обрабатываем выбор пользователя сразу при загрузке страницы
            };

            
        </script>

        <div class="inp">
            <form id="admin" action="downloadexcel.php" method="post">
                <label for="organization_type">
                    Вы находитесь в панели админа. <br>
                    Чтобы скачать результаты опроса нажмите кнопку "Скачать"
                </label>
                <div class="custom-checkbox">
                    <label class="highlight-on-hover">
                        <input type="checkbox" id="download_option" name="download_option" onclick="handleDownloadOption()">Выберите этот пункт, чтобы скачать результаты за определенный период
                    </label>
                </div>
                <div id="date_inputs">


                    <label for="start_date">Выберите начальную дату:</label>
                    <input type="date" id="start_date" name="start_date">

                    <label for="end_date">Выберите конечную дату:</label>
                    <input type="date" id="end_date" name="end_date">
                </div>


                <input type="submit" id="download_button" value="Скачать">
            </form>
            <form action="close.php" method="post" id="accept" onsubmit="return myFunction();">
            <input type="submit" id="download_button" value="<?php echo $txtbuttonclose;?>" class="close" >
            </form>
        </div>
    </div>

    <script>

function myFunction() {
  var txt;var form = document.getElementById('accept');
  if (confirm("Вы уверены, что хотите <?php echo $txtbuttonclose;?>?")) {
    
    return true;
  } else {
    return false;
  }
}
    // Wait for the entire content of the page to be loaded
    document.addEventListener('DOMContentLoaded', function() {
        // Check the value of $_SESSION['notif']
        var notifValue = <?php echo $notifValue; ?>;
        
        // If the value is 1, display the notification
        if (notifValue === 1) {
            // Find the notification element by its ID
            var notificationElement = document.getElementById('notification');
            
            // Set the notification text
            notificationElement.innerText = "В выбранный промежуток нет результатов";

            // Display the notification
            notificationElement.style.display = 'block';

            // Auto-hide the notification after 4 seconds
            setTimeout(function() {
                notificationElement.style.display = 'none';
            }, 4000);
        }
    });

</script>
</body>

</html>
    