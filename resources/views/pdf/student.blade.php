<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        .header {
            text-align: center;
        }

        ol li {
            margin: 15px;
        }
        .option {
            margin-top: 10px;
        }
        table {
            border: #000;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
<div class="header">
    <h4>ЛИЧНОЕ ДЕЛО ОБУЧАЮЩЕГОСЯ</h4>
</div>
<ol>
    <li>Фамилия, имя, отчество {{$full_name}}</li>
    <li>Дата рождения (число, месяц, год) {{$birth_date}}</li>
    <li>Сведения о представителях<br>
        @foreach($representatives as $rep)
        <div class="option">ФИО {{$rep->last_name. ' ' .$rep->first_name. ' ' .$rep->middle_name}}</div><br>
        <div class="option">Контактный телефон {{$rep->phone}}</div><br>
        @endforeach
    </li>
    <li>Адрес места жительства {{$address_act}}</li>
    <li>Дата поступления в ДШИ (приказ) {{$created_at}}</li>
    <li>Наименование образовательной программы {{$program->name}}</li>
    <li>Результаты прослушивания / просмотра при приеме на обучение
    </li>

    <table border="1">
        <thead>
        <tr>
            <th colspan="3">
                Результаты приемных испытаний (музыкальное искусство)
            </th>
        </tr>
        <tr>
            <th>слух</th>
            <th>память</th>
            <th>ритм</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        </tbody>
    </table>

    <table border="1">
        <thead>
        <tr>
            <th colspan="3">
                Результаты изобразительных испытаний (музыкальное искусство)
            </th>
        </tr>
        <tr>
            <th>слух</th>
            <th>память</th>
            <th>ритм</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        </tbody>
    </table>

    <li>Дата и причина отчисления из ДШИ</li>
    <li>Номер приказа об отчислении</li>
    <li>№ свидетельства об окончании ДШИ/справки об обучении/периоде обучения</li>


</ol>
</body>
</html>
