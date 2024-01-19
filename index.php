<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Анкета</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .additional-select {
            display: none;
            margin-top: 10px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>

<body>
    <div class="container">
        <h1>Добро пожаловать!</h1>
        <p>Прочтите документ <a href="Преамбола.pdf" target="_blank">Преамбула</a> перед заполнением анкеты.</p>
        <p>Ознакомьтесь с текстом ниже и приступайте к прохождению опроса</p>

        <div class="accordion">
            <div class="accordion-item">
                <div class="accordion-header" onclick="toggleAccordion(this)">Преамбула</div>
                <div class="accordion-content">
                    <h3 align="center">Пояснительная записка</h3>
                    <p align="center">Уважаемые коллеги!</p>
                    <p>
                        Приглашаем Вас принять участие в верификации институциональных моделей экологического образования с целью определения соответствия Вашей общеобразовательной организации статусу «Экоцентр» и/или «Экологический лидер» и вхождение в сетевое сообщество образовательных организаций, ориентированных на формирование у обучающихся экологической культуры через внедрение эффективной модели непрерывного экологического образования.
                        <br>Идея формирования сети «Экоцентров» в муниципальной образовательной системе определена в Стратегии социально-экономического развития города Челябинска на период до 2035 года (Решение Челябинской городской думы от 29 июня 2021 года № 20/2 «Об утверждении Стратегии социально-экономического развития города Челябинска на период до 2035 года»), согласно положениям которой к 2035 году Челябинск должен стать городом, успешно решившим экологические проблемы за счет развития секторов «зеленой» экономики и приобретения статуса федерального научно-образовательного и производственного центра экологических компетенций.
                        <br>Для решения данной задачи в муниципальной образовательной системе формируется сетевое сообщество, в рамках которого будут разрабатываться и внедряться в практику эффективные институциональные модели экологи-ческого образования, обеспечивающие высокий уровень сформированности экологической культуры у выпускни-ков, смену потребительского отношения к природе на природосозидающую, развитие природоцентрического мышления, принятие способов природосоздитального поведения и деятельности, ориентирующие учеников на выбор профессий «зелёного сектора» экономики, активное участие в волонтёрской деятельности, направленной на формирование экологических привычек.
                        <br>Преимущество достижения поставленной цели посредством деятельности сетевого сообщества обусловлено тем, что каждый партнер вносит в разработку и апробацию модели свой опыт, создает часть инновационного про-дукта, который можно внедрить в практику в различных условиях. Учитывая многоаспектность образовательной деятельности в современных условиях, разнообразие стоящих перед образовательными организациями задач, в се-тевом сообществе необходимо выделить две группы организаций: образовательные организации, формирующие модель непрерывного экологического образования, и образовательные организации, внедряющие предложенную модель. Первая группа составляет проектный офис для решения данной проблемы и формирует информационно-методический комплекс для внедрения модели во все образовательные организации города, вторая группа использует предложенные ресурсы для решения поставленной задачи. С целью совершенствования качества экологического образования в городе Челябинске разработан информационно-методический ресурс «Экологический конструктор», содержащий рекомендации по совершенствованию качества экологического образования в части содержания, организации деятельности обучающихся, создания условий для реализации экологического образования, в том числе использования ресурсов городской образовательной среды, предложения по повышению квалификации управленческих и школьных команд т.п. В ходе реализации проекта на муниципальном уровне формируется экологоориентированная образовательная среда, которая позволяет объединить ресурсы города для достижения главной цели – воспитания нового поколения граждан, имеющих экологические привычки, ориентированных на сохранение окружающей среды, имеющих опыт решения экологических проблем и положительно влияющих на повышение уровня экологической культуры населения.
                        <br>На первый взгляд, актуальность и новизна предлагаемой работы может быть поставлена под сомнение, так как аналогичный подход используется в международном проекте «Экошколы», цель данного проекта – сделать так, чтобы все образовательные учреждения стали экоцентрами и воздействовали на экологическое воспитание, осуществляемое путем четырех основных аспектов: образовательный эффект; эксплуатационный эффект; эффект среды/эффект здания; коммуникационный эффект . В Российской Федерации есть близкий аналог общероссийские программы «Зеленые вузы России» и «Зеленые школы России», которые обобщают позитивный опыт формирования экологической культуры учащихся и студентов, предлагая описание направлений деятельности в вузах и видеоуроки для педагогов. Наряду с этим существует большое количество конкурсов, ассоциаций, некоммерческих организаций, волонтерских объединений и т.п., которые позволяют формировать у обучающихся экологические привычки. Однако проблема до конца не решена, это можно увидеть по «проблеме мусора», который нам приходится убирать в рамках различных акций, не переходя к решению более актуальных и сложных задач в области экологии.
                        <br>Одной из проблем, которая, на наш взгляд, значительно снижает эффективность проводимой деятельности, является отсутствие системности в организации непрерывного экологического образования. Огромное количество предлагаемых мероприятий и акций, зачастую незапланированных, их фрагментарное включение в образователь-ный процесс, недостаточное понимание педагогическими работниками их роли и значения, дают отрицательный эффект. Одним из вариантов решения проблемы может стать формирование модели экологического образования, которая поможет конкретизировать и операционализировать экологическое содержание, создать условия для реализации данного содержания, определить необходимое и достаточное количество образовательных событий экологиче-ской направленности, мотивирует педагогическое сообщество на необходимость формирования экологической культуры у подрастающего поколения.
                        <br>Данная идея стала основой для работки муниципального инновационного проекта «Проектирование муниципальной модели реализации непрерывного экологического образования с использованием информационно-методического ресурса «Экологический конструктор», в рамках которого формируется сеть образовательных орга-низаций – «Экоцентров», внедряющих эффективные модели экологического образования. Определение статуса «Экоцентр» осуществляется при верификации институциональных моделей непрерывного экологического образования.

                    </p>
                    <h3 align="center">Объекты верификации</h3>
                    <p>При разработке инструментария верификации учитывался анализ мировых тенденций развития экологического образования, но основу инструментария составили позитивный опыт советской и российской школы, а также актуальные требования нормативных документов, в том числе:
                        <br>- обновленные ФГОС общего образования;
                        <br>- Федеральные образовательные программы;
                        <br>- Концепция экологического образования в системе общего образования (Решение федерального учебно-методического объединения по общему образованию протокол № 2/22 от 29.04.2022).
                        <br>Инструментарий верификации институциональных моделей экологического образования включает 3 объекта оценки:
                        <br>1) «I. Содержание экологического образования» обеспечивает оценку сформированности реализуемой в образовательной организации модели непрерывного экологического образования (в мировом опыте – образовательный эффект);
                        <br>2) «II. Образовательная экологоориентированная среда» позволяет выявить качество условий, обеспечивающих реализацию непрерывного экологического образования (эксплуатационный эффект и эффект среды/эффект здания);
                        <br>3) «III. Образовательная деятельность» обеспечивает оценку эффективности реализации непрерывного экологического образования и позволяет определить уровень вовлеченности субъектов образовательных отношений в экологоориентированную деятельность (коммуникационный эффект).
                        <br>Процедура верификации позволяет выявить проблемные зоны и обеспечивает эффективность принятия управленческих решений, направленных на достижение необходимого качества реализации экологического образования в образовательной организации, выбор эффективной модели формирования у обучающихся экологической культуры.
                        <br>При проведении процедуры верификации руководитель и уполномоченные лица (заместители заведующих, старшие воспитатели, методисты, заместители директора, учителя-предметники) заполняют форму, ориентируясь на предложенные критерии и показатели оценки объектов. Обратите внимание, что процесс присвоения статуса «Экоцентр»/«Экологический лидер» сопровождается выборочной проверкой подтверждающих документов, размещенных на сайте образовательной организации, наименования этих документов Вы увидите при заполнении формы в программе (комментарий к показателю).
                        <br>Сбор полной и достоверной информации для проведения анализа по каждому объекту верификации осуществляется в процессе внутреннего контроля как особого вида управленческой деятельности в целостной системе управления образовательной организацией.
                    </p>
                    <h3 align="center">Определение статуса образовательной организации</h3>
                    <p>Процедура проводится ежегодно в сентябре – октябре и позволяет установить статус образовательной организации, реализующей непрерывное экологическое образование:
                        <br>- «Экологический лидер» – образовательная организация ориентирована на проектирование и совершенствование эффективной модели организации экологического образования, обеспечивается высокий уровень вовлеченности субъектов образовательных отношений в экологоориентированную деятельность, коллектив образовательной организации готов к диссеминации позитивного опыта организации экологического образования. Статус «Экологический лидер» приравнивается к статусу «муниципальная инновационная площадка» (наличие дополнительного финансирования определяет Комитет по делам образования города Челябинска). Данные организации получают право проведения на своей базе стажировок для руководящих и педагогических работников, приоритетное право предоставления материалов в «Экологический конструктор», организации сетевых сообществ для специалистов экоцентров и т.п.;
                        <br>- «Экоцентр» – в образовательной организации внедрена эффективная модель организации экологического образования, созданы условия для ее функционирования и развития, обеспечивается высокий уровень вовлеченности субъектов образовательных отношений в экологоориентированную деятельность;
                        <br>- образовательные организации, не имеющие статуса – экологическое образование реализуется фрагментарно, бессистемно, обеспечивая обучающимся частичное достижение личностных планируемых результатов в сфере экологического воспитания. Данным образовательным организациям по результатам верификации предлагаются рекомендации по работе с информационно-методическим ресурсом «Экологический конструктор» с целью совершенствования экологического образования. На информационно-методическом ресурсе Вы сможете найти конкретные рекомендации по проектированию содержания экологического образования, организации деятельности, в том числе с социальными партнерами, созданию условий, в том числе с использованием ресурсов города.
                    </p>
                </div>
            </div>
            <!-- <div class="accordion-item">
                <div class="accordion-header" onclick="toggleAccordion(this)">Объекты верификации</div>
                <div class="accordion-content">
                    <p>При разработке инструментария верификации учитывался анализ мировых тенденций развития экологического образования, но основу инструментария составили позитивный опыт советской и российской школы, а также актуальные требования нормативных документов, в том числе:
                        <br>- обновленные ФГОС общего образования;
                        <br>- Федеральные образовательные программы;
                        <br>- Концепция экологического образования в системе общего образования (Решение федерального учебно-методического объединения по общему образованию протокол № 2/22 от 29.04.2022).
                        <br>Инструментарий верификации институциональных моделей экологического образования включает 3 объекта оценки:
                        <br>1) «I. Содержание экологического образования» обеспечивает оценку сформированности реализуемой в образовательной организации модели непрерывного экологического образования (в мировом опыте – образовательный эффект);
                        <br>2) «II. Образовательная экологоориентированная среда» позволяет выявить качество условий, обеспечивающих реализацию непрерывного экологического образования (эксплуатационный эффект и эффект среды/эффект здания);
                        <br>3) «III. Образовательная деятельность» обеспечивает оценку эффективности реализации непрерывного экологического образования и позволяет определить уровень вовлеченности субъектов образовательных отношений в экологоориентированную деятельность (коммуникационный эффект).
                        <br>Процедура верификации позволяет выявить проблемные зоны и обеспечивает эффективность принятия управленческих решений, направленных на достижение необходимого качества реализации экологического образования в образовательной организации, выбор эффективной модели формирования у обучающихся экологической культуры.
                        <br>При проведении процедуры верификации руководитель и уполномоченные лица (заместители заведующих, старшие воспитатели, методисты, заместители директора, учителя-предметники) заполняют форму, ориентируясь на предложенные критерии и показатели оценки объектов. Обратите внимание, что процесс присвоения статуса «Экоцентр»/«Экологический лидер» сопровождается выборочной проверкой подтверждающих документов, размещенных на сайте образовательной организации, наименования этих документов Вы увидите при заполнении формы в программе (комментарий к показателю).
                        <br>Сбор полной и достоверной информации для проведения анализа по каждому объекту верификации осуществляется в процессе внутреннего контроля как особого вида управленческой деятельности в целостной системе управления образовательной организацией.
                    </p>
                </div>
            </div> -->
            <!-- <div class="accordion-item">
                <div class="accordion-header" onclick="toggleAccordion(this)">Определение статуса образовательной организации</div>
                <div class="accordion-content">
                    <p>Процедура проводится ежегодно в сентябре – октябре и позволяет установить статус образовательной организации, реализующей непрерывное экологическое образование:
                        <br>- «Экологический лидер» – образовательная организация ориентирована на проектирование и совершенствование эффективной модели организации экологического образования, обеспечивается высокий уровень вовлеченности субъектов образовательных отношений в экологоориентированную деятельность, коллектив образовательной организации готов к диссеминации позитивного опыта организации экологического образования. Статус «Экологический лидер» приравнивается к статусу «муниципальная инновационная площадка» (наличие дополнительного финансирования определяет Комитет по делам образования города Челябинска). Данные организации получают право проведения на своей базе стажировок для руководящих и педагогических работников, приоритетное право предоставления материалов в «Экологический конструктор», организации сетевых сообществ для специалистов экоцентров и т.п.;
                        <br>- «Экоцентр» – в образовательной организации внедрена эффективная модель организации экологического образования, созданы условия для ее функционирования и развития, обеспечивается высокий уровень вовлеченности субъектов образовательных отношений в экологоориентированную деятельность;
                        <br>- образовательные организации, не имеющие статуса – экологическое образование реализуется фрагментарно, бессистемно, обеспечивая обучающимся частичное достижение личностных планируемых результатов в сфере экологического воспитания. Данным образовательным организациям по результатам верификации предлагаются рекомендации по работе с информационно-методическим ресурсом «Экологический конструктор» с целью совершенствования экологического образования. На информационно-методическом ресурсе Вы сможете найти конкретные рекомендации по проектированию содержания экологического образования, организации деятельности, в том числе с социальными партнерами, созданию условий, в том числе с использованием ресурсов города.
                    </p>
                </div>
            </div> -->
        </div>
        <script>
            function toggleAccordion(header) {
                var accordionItem = header.parentNode;
                accordionItem.classList.toggle('active');
            }
        </script>

        <div class="inp">
            <form id="surveyForm" action="indexphp.php" method="post">
                <label for="organization_type">Выберите тип Вашей ("Образовательной организации" или "ООО"):</label>
                <select id="organization_type" name="organization_type" style="margin-bottom: 15px;" onchange="showAdditionalSelect()">
                    <option value="1">Дошкольные образовательные организации</option>
                    <option value="2">Общеобразовательные организации</option>
                    <option value="3">Организации дополнительного образования</option>
                </select>

                <div id="additionalSelect" class="additional-select">
                    <label class="instruction-label">Выберите уровни образования:</label>
                    <div>
                        <input type="radio" id="option1" name="answerOptions[]" value="4,5,6,7,8">
                        <label for="option1">Дошкольное образование + Начальное образование + Основное образование + Среднее образование</label>
                    </div>
                    <div>
                        <input type="radio" id="option2" name="answerOptions[]" value="5,6,7,8">
                        <label for="option2">Начальное образование + Основное образование + Среднее образование</label>
                    </div>
                    <div>
                        <input type="radio" id="option3" name="answerOptions[]" value="6,7,8">
                        <label for="option3">Основное образование + Среднее образование</label>
                    </div>
                    <div>
                        <input type="radio" id="option4" name="answerOptions[]" value="5,7,8">
                        <label for="option4">Начальное образование + Основное образование</label>
                    </div>
                    <div>
                        <input type="radio" id="option5" name="answerOptions[]" value="5,8">
                        <label for="option5">Начальное образование</label>
                    </div>
                </div>

                <label for="organization_name">Полное название Вашей организации:</label>
                <input type="text" id="organization_name" name="organization_name" required >

                <label for="leader_name">ФИО руководителя:</label>
                <input type="text" id="leader_name" name="leader_name" required>

                <label for="leader_phone">Телефон руководителя:</label>
                <input type="tel" id="leader_phone" name="leader_phone" required oninput="formatPhoneNumber(this)">

                <label for="leader_email">E-mail организации/руководителя:</label>
                <input type="email" id="leader_email" name="leader_email" required>

                <label for="specialist_name">ФИО специалиста, прошедшего анкетирование:</label>
                <input type="text" id="specialist_name" name="specialist_name" required>

                <input type="submit" value="Перейти к тесту">
            </form>
        </div>
    </div>

    <script>
        function showAdditionalSelect() {
            var organizationTypeSelect = document.getElementById("organization_type");
            var additionalSelect = document.getElementById("additionalSelect");

            // Отображаем дополнительный select только при выборе "Организации дополнительного образования"
            additionalSelect.style.display = (organizationTypeSelect.value === "2") ? "block" : "none";
        }

        document.getElementById('surveyForm').addEventListener('submit', function(event) {
            // Проверка, был ли хотя бы один чекбокс отмечен только при выборе "Основное общее образование"
            var organizationTypeSelect = document.getElementById("organization_type");
            if (organizationTypeSelect.value === "2") {
                var checkboxes = document.querySelectorAll('#additionalSelect input[type="radio"]');
                var atLeastOneChecked = Array.from(checkboxes).some(function(checkbox) {
                    return checkbox.checked;
                });

                // Если ни один чекбокс не отмечен, предотвращаем отправку формы и выводим сообщение
                if (!atLeastOneChecked) {
                    event.preventDefault();
                    Swal.fire({
        text: 'Выберите один из вариантов уровня образования',
    });
                }
            }
        });


        function formatPhoneNumber(input) {
    // Удаление всех символов, кроме цифр
    let phoneNumber = input.value.replace(/\D/g, '');

    // Проверка, начинается ли номер с "8"
    if (phoneNumber.startsWith('8')) {
        // Замена "8" на "+7"
        phoneNumber = '+7' + phoneNumber.slice(1);
    }else if (phoneNumber.startsWith('9')) {
        // Добавление "+7" вперед
        phoneNumber = '+7' + phoneNumber;
    }

    // Форматирование номера телефона (можно дополнительно добавить разделители)
    phoneNumber = phoneNumber.replace(/(\d{1})(\d{3})(\d{3})(\d{2})(\d{2})/, '+$1 ($2) $3-$4-$5');

    // Установка отформатированного номера обратно в поле ввода
    input.value = phoneNumber;
}
    </script>
</body>

</html>