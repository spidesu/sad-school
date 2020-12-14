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
    <h4>ПОКАЗАТЕЛИ ДЕЯТЕЛЬНОСТИ УЧЕБНОГО ЗАВЕДЕНИЯ </h4>
    по состоянию на {{ $current_date }}
</div>


<table border="1">
    <thead>
    <tr>
        <th>№ п/п</th>
        <th>Показатели</th>
        <th>Единица измерения</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>1</td>
        <td>Образовательная деятельность</td>
        <td></td>
    </tr>
    <tr>
        <td>1.1</td>
        <td>Общая численность учащихся, в том числе:</td>
        <td>{{ $student['count'] }}</td>
    </tr>
    <tr>
        <td>1.1.1</td>
        <td>Детей дошкольного возраста (3 - 7 лет)</td>
        <td>{{ $student['count_very_low'] }}</td>
    </tr>
    <tr>
        <td>1.1.1</td>
        <td>Детей младшего школьного возраста (7 - 11 лет)</td>
        <td>{{ $student['count_low'] }}</td>
    </tr>

    <tr>
        <td>1.1.1</td>
        <td>Детей среднего школьного возраста (11 - 15 лет)</td>
        <td>{{ $student['count_medium'] }}</td>
    </tr>

    <tr>
        <td>1.1.1</td>
        <td>Детей старшего школьного возраста (15 - 17 лет)</td>
        <td>{{ $student['count_high'] }}</td>
    </tr>

    <tr>
        <td>1.1.1</td>
        <td>Численность учащихся, обучающихся по образовательным программам по договорам об оказании платных
            образовательных услуг
        </td>
        <td>{{ $student['count_non_budget'] }}</td>
    </tr>

    <tr>
        <td>1.1.1</td>
        <td>Численность/удельный вес численности учащихся, занимающихся в 2-х и более объединениях (кружках, секциях,
            клубах), в общей численности учащихся
        </td>
        <td>{{ $student['count_2x'] }}</td>
    </tr>

    <tr>
        <td>1.1.1</td>
        <td>Численность/удельный вес численности учащихся по образовательным программам, направленным на работу с детьми
            с особыми потребностями в образовании, в общей численности учащихся, в том числе:
        </td>
        <td>{{ $student['count_special'] }}</td>
    </tr>

    <tr>
        <td>1.1.1</td>
        <td>Учащиеся с ограниченными возможностями здоровья</td>
        <td>{{ $student['count_disability'] }}</td>
    </tr>

    <tr>
        <td>1.1.1</td>
        <td>Дети-сироты, дети, оставшиеся без попечения родителей</td>
        <td>{{ $student['count_no_reps'] }}</td>
    </tr>

    <tr>
        <td>1.1.1</td>
        <td>Дети-мигранты</td>
        <td>{{ $student['count_migrant'] }}</td>
    </tr>
    <tr>
        <td>1.1.1</td>
        <td>Дети, попавшие в трудную жизненную ситуацию (малоимущие)</td>
        <td>{{ $student['count_low_money'] }}</td>
    </tr>

    @foreach ($teacher['count_groupped'] as $teach)
    <tr>
        <td>1.1.1</td>
        <td>Численность/удельный вес численности педагогических работников, имеющих {{$teach->name}} образование, в общей
            численности педагогических работников
        </td>
        <td>{{ $teach->total}}</td>
    </tr>

    <tr>
        <td>1.1.1</td>
        <td>Численность/удельный вес численности педагогических работников, имеющих {{$teach->name}} образование педагогической
            направленности (профиля), в общей
            численности педагогических работников
        </td>
        <td>{{ $teach->edu_teach}}</td>
    </tr>
    @endforeach


    <tr>
        <td>1.1.1</td>
        <td>Численность/удельный вес численности педагогических работников в общей численности педагогических
            работников, педагогический стаж работы которых составляет:
        </td>
        <td></td>
    </tr>

    <tr>
        <td>1.1.1</td>
        <td>До 5 лет</td>
        <td>{{ $teacher['count_low_exp'] }}</td>
    </tr>

    <tr>
        <td>1.1.1</td>
        <td>Свыше 30 лет</td>
        <td>{{ $teacher['count_high_exp'] }}</td>
    </tr>

    <tr>
        <td>1.1.1</td>
        <td>Численность/удельный вес численности педагогических работников в общей численности педагогических работников
            в возрасте до 30 лет
        </td>
        <td>{{ $teacher['count_low_years'] }}</td>
    </tr>

    <tr>
        <td>1.1.1</td>
        <td>Численность/удельный вес численности педагогических работников в общей численности педагогических работников
            в возрасте от 55 лет
        </td>
        <td>{{ $teacher['count_high_years'] }}</td>
    </tr>
    </tbody>
</table>

4. Общая численность обучающихся на отделениях, финансируемых за счет средств городского бюджета путем выделения
субсидии на выполнение муниципального задания, за счёт средств бюджета муниципального образования «Город Астрахань»
составляет:

<table border="1">
    <thead>
    <tr>
        <th>№ п/п</th>
        <th>Отделение</th>
        <th>количество</th>
    </tr>
    </thead>
    <tbody>
    {{$result = 0}}
    @foreach($budgetPrograms as $programs)
    <tr>
            {{$result += $programs['count']}}
            @foreach($programs['programs'] as $program)
                <td></td>
                <td>{{$program['name']}}</td>
                <td>{{$program['count']}}</td>
            @endforeach
    </tr>
    <tr>
        <td></td>
        <td>{{$programs['name']}} всего</td>
        <td>{{$programs['count']}}</td>
    </tr>
    @endforeach
    <tr>
        <td></td>
        <td>всего</td>
        <td>{{$result}}</td>
    </tr>
    </tbody>
</table>


Общая численность обучающихся отделения дополнительных платных услуг:

<table border="1">
    <thead>
    <tr>
        <th>№ п/п</th>
        <th>Наименование программы (по лицензии)</th>
        <th>Контингент</th>
    </tr>
    </thead>
    <tbody>
    {{$result = 0}}
    @foreach($nonBudgetPrograms as $program)
    <tr>
            {{$result += $program->studentCount}}
            <td></td>
            <td>Дополнительная общеразвивающая программа в области {{$program->name}}</td>
            <td>{{$program->studentCount}}</td>
        @endforeach
    </tr>
    <tr>
        <td>ИТОГО</td>
        <td></td>
        <td>{{$result}}</td>
    </tr>
    </tbody>
</table>

</body>
</html>
