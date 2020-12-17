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
        tr {
            line-height: 20px;
        }
    </style>
</head>
<body>
<div class="header">
    <h4>ЛИЧНОЕ ДЕЛО ПРЕПОДАВАТЕЛЯ</h4>
</div>

<table>

    <tr>
        <td>ФИО</td>
        <td>{{$full_name}}</td>
        </tr>
    <tr>
        <td>Дата рождения</td>
        <td>{{$birth_date}}</td>
    </tr>
    <tr>
        <td>Статус работы</td>
        <td>{{$status}}</td>
    </tr>
    <tr>
        <td>Должность</td>
        <td>{{$position}}</td>
    </tr>
    <tr>
        <td>Уровень образования</td>
        <td>{{$education}}</td>
    </tr>
    <tr>
        <td>Специлизация</td>
        <td>{{$specialization}}</td>
    </tr>
    <tr>
        <td>Дата принятия на работу</td>
        <td>{{$begin_at}}</td>
    </tr>
    <tr>
        <td>Основное место работы</td>
        <td>{{$parttime_work}}</td>
    </tr>
    <tr>
        <td>Количество ставок</td>
        <td>{{$working_rate}}</td>
    </tr>
    <tr><td>Перечень курируемых групп</td>
    <td>{{$groups}}</td>
    </tr>

</table>
</body>
</html>
