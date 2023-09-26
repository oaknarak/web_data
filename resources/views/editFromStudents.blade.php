<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
    <style>
        *{   
            font-family: 'Sarabun';
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <nav>
            <ul>
            <li><a href="/dashboard">Home</a></li>
            <li><a href="/students">Student List</a></li>
            </ul>
        </nav>
        <h1>Student Management</h1>
        <h2>Edit Form Student</h2>
        <form action="/students/update/{{$student_update->id}}" method="POST">
            @csrf
            <label for="stu_id">Student ID:</label><br>
            <input type="text" name="stu_id" value="{{$student_update->id}}" readonly><br>
            <label for="stu_name">Name:</label><br>
            <input type="text" name="stu_name" value="{{$student_update->stu_name}}"><br>
            <label for="age">Age:</label><br>
            <input type="text" name="age" value="{{$student_update->age}}"><br>
            <label for="age">Grade:</label><br>
            <select name="grade">
                <option value="A" @if($student_update->grade == "A") selected @endif>A</option>
                <option value="B" @if($student_update->grade == "B") selected @endif>B</option>
                <option value="C" @if($student_update->grade == "C") selected @endif>C</option>
                <option value="D" @if($student_update->grade == "D") selected @endif>D</option>
                <option value="F" @if($student_update->grade == "F") selected @endif>F</option>
            </select><br>
            <button type="submit" class="btn btn-warning">Update Student</button>
        </form>
        <h2>Students List ({{$num_students}} Students)</h2>
        <form action="/students" method="get">
            @csrf
            <td><button type="submit" class="btn btn-primary">Add Student</button></td>
        </form>
        <table class="table table-hover">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Grade</th>
                <th colspan="2">Action</th>
            </tr>
            @forelse ($students as $student)
                <tr>
                    <td>{{$student->id}}</td>
                    <td>{{$student->stu_name}}</td>
                    <td>{{$student->age}}</td>
                    <td>{{$student->grade}}</td>
                    <form action="/students/editForm/{{$student->id}}" method="get">
                        @csrf
                        <td><button type="submit" class="btn btn-warning">แก้ไข</button></td>
                    </form>
                    <form action="/students/delete/{{$student->id}}" method="get">
                        @csrf
                        <td><button type="submit" id="delete" onclick="return confirm('Are you sure you want to delete this student?')">ลบ</button></td>
                    </form>
                </tr>
            @empty
                ไม่มีข้อมูล
            @endforelse
        </table>
    </div>
</body>
</html>