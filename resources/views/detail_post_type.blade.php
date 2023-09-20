<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 5px;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>รหัสหัวข้อ</th>
            <th>ชื่อหัวข้อ</th>
            <th>สร้างเมื่อวันที่</th>
        </tr>
        <tr>
            <td>{{$post_type->id}}</td>
            <td>{{$post_type->type}}</td>
            <td>{{thaidate('วันที่ j F พ.ศ.Y',$post_type->created_at)}}</td>
        </tr>
    </table>
</body>
</html>