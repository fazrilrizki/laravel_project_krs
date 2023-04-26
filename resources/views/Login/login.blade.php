<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="{{ url('css/login.css') }}">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>

<body>
    <div class="login-container">
        <h2>Login Mahasiswa</h2>
        <form action="/loginMahasiswa" method="post">
            @csrf
            <div class="form-group">
                @if(session()->has('loginError'))
                <div class="alert alert-warning" role="alert">
                    {{ session('loginError') }}
                </div>
                @endif
                <label>NIM</label>
                <input type="text" name="nim" placeholder="Masukkan NIM">
            </div>
            <div class="form-group">
                <label>PIN</label>
                <input type="password" name="pin" placeholder="Masukkan PIN">
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
    </div>
</body>

</html>