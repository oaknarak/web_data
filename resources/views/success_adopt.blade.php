<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>ชื่อสัตว์เลี้ยง</th>
            <th>ชื่อเจ้าของสัตว์เลี้ยง</th>
        </tr>
       
            @foreach ($show as $successadopt) 
            
            <tr>
                 <td>{{$successadopt->pet->name}}</td>
                <td>{{$successadopt->pet->user->name}}</td>
            </tr>

            @endforeach
    </table>
</body>
</html>