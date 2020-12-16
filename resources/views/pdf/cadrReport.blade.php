<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body {
            font-size: 12px;
        }
        td {
            text-align: center;
        }
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
{{$count = 1}}
<div class="header">
    <h4>Кадровое обеспечение образовательного процесса по дополнительным предпрофессиональным программам в области
        искусcтв</h4>
    <table border="1">
        <tr>
            <td rowspan="2">

            </td>
            <td rowspan="2">
                № строки
            </td>
            <td rowspan="2">
                Количество преподавателей, привлеченных к реализации учебного процесса (чел.)
            </td>
            <td colspan="4">
                Из них имеют образование:
            </td>
        <tr>
            <td>высшее профессиональное</td>
            <td>из них по профилю преподаваемого предмета (в области соответствующего вида искусства)</td>
            <td>среднее профессиональное</td>
            <td>из них по профилю преподаваемого предмета (в области соответствующего вида искусства)</td>
        </tr>

        @foreach ($result as $key => $spec)
            <tr>
                <td>
                    Специализация ({{$key}})
                </td>
                <td>
                {{$count++}}
                </td>
                <td>
                    {{ (int)$spec['count_this_high'] + (int)$spec['count_this_low'] + (int)$spec['count_high'] + (int)$spec['count_low']}}

                </td>
                <td>
                    {{$spec['count_high']}}
                </td>
                <td>
                    {{$spec['count_this_high']}}
                </td>
                <td>
                    {{$spec['count_low']}}
                </td>
                <td>
                    {{$spec['count_this_low']}}
                </td>
            </tr>
        @endforeach
    </table>
</div>

</body>
</html>
