<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <center>
        <h1>{{ $title }}</h1>
    </center>
    @foreach($mhs as $getMhs)
    <p>NIM : {{ $getMhs->nim }}</p>
    <p>Nama : {{ $getMhs->nama }}</p>
    @endforeach
    @foreach($smt as $getSmt)
    <p>Semester : {{ $getSmt->smt }}</p>
    @endforeach
    <!-- <p>{{ $date }}</p> -->
    <p>Mata Kuliah yang Diambil : </p>

    <table class="table table-bordered mb-5">
        <thead>
            <tr class="table-danger">
                <th scope="col">Mata Kuliah</th>
                <th scope="col">Kode MK</th>
                <th scope="col">SKS</th>
                <th scope="col">SMT</th>
                <th scope="col">Kelas</th>
            </tr>
        </thead>
        <tbody>
            @foreach($krs as $getKrs)
            <tr>
                <td>{{ $getKrs->namamk }}</td>
                <td>{{ $getKrs->kodemk }}</td>
                <td>{{ $getKrs->sks }}</td>
                <td>{{ $getKrs->semester }}</td>
                <td>A</td>
            </tr>
            @endforeach
    </table>
</body>

</html>