<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/update/post_type/{{$post_type->id}}" method="post">
        @csrf
        <label for="type">หัวข้อข่าวสาร: </label>
        <input type="text" name='type' value="{{$post_type->type}}" required><br>
        <input type="submit" value="บันทึกหัวข้อข่าวสาร">
    </form>
</body>
</html>