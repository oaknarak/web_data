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
    <h1>สวัสดี {{Auth::user()->name}}</h1>
    <table>
        <tr>
            <th>ชื่อบริษัท</th>
            <th>ราคาที่จดทะเบียน</th>
            <th>ขนาดบริษัท</th>
            <th>ชื่อเจ้าของบริษัท</th>
        </tr>
        @foreach ($companies as $company)
            <tr>
                <td>{{$company->company_name}}</td>
                <td>{{number_format($company->company_price)}}</td>
                @if($company->company_price<5000000)
                    <td>ขนาดเล็ก</td>   
                @elseif($company->company_price>=5000000)
                    <td>ขนาดกลาง</td>
                @elseif($company->company_price>=10000000)
                    <td>ขนาดใหญ่</td>
                @endif
                <td>{{$company->user->name}}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>