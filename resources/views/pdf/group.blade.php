<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        div {
            text-align: center;
        }
        body {
            text-align: center;
            margin:0 auto;
        }
        .header {
            text-align: center;
        }
        table {
            border: #000;
            border-collapse: collapse;
        }

        tr {
            line-height: 20px;
        }

        .item {
            width: 100%;
        }
    </style>
    <title></title>
</head>
<body>
<div class="header">
    <h4>СОСТАВ ГРУПП</h4>
</div>
<div class="content">
    @foreach($groups as $group)
        <div class="item" style="margin-top: 50px; text-align: center">
            <table border="1" style="min-width: 300px; margin: 0 auto">
           <tr><td> <div class="header1"><h4>{{!empty($group->name) ? $group->name : 'Без группы'}}<br>Специализация: <br>{{!empty($group->name) ? $group->specialization->name : ''}}</h4></div></td></tr>
                @foreach($group->students as $student)
               <tr> <td>  <div class="cont">{{$student->last_name. ' ' .$student->first_name. ' ' .$student->middle_name}}</div></td></tr>
                @endforeach
            </table>
            </div>

        </div>
    @endforeach

</div>
</body>
</html>
