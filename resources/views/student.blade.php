<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    <nav>
        <ul>
        <li><a href="/dashboard">Home</a></li>
        <li><a href="/students">Student List</a></li>
        </ul>
    </nav>
    <h1>Student Management</h1>
    <h2>Add Student</h2>
    <form action="/students/insert" method="POST">
        @csrf
        <label for="stu_name">Name:</label><br>
        <input type="text" name="stu_name"><br>
        <label for="age">Age:</label><br>
        <input type="text" name="age"><br>
        <label for="age">Grade:</label><br>
        <select name="grade">
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="F">F</option>
        </select><br>
        <button type="submit" id="submit">Add Student</button>
    </form>
    <h2>Students List ({{$num_students}} Students)</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Grade</th>
        </tr>
        @forelse ($students as $student)
            <tr>
                <td>{{$student->id}}</td>
                <td>{{$student->stu_name}}</td>
                <td>{{$student->age}}</td>
                <td>{{$student->grade}}</td>
                <form action="/students/delete/{{$student->id}}" method="get">
                    @csrf
                    <td><button type="submit" id="delete" onclick="return confirm('Are you sure you want to delete this student?')">ลบ</button></td>
                </form>
            </tr>
        @empty
            ไม่มีข้อมูล
        @endforelse
    </table>
</body>
</html>