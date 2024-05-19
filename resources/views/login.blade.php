<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Pendataan Barang</title>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <nav>
        <div class="left">
            <a href=""><img src="https://img.freepik.com/premium-vector/shoes-shop-logo-template-design_316488-452.jpg" alt="Shoe Store Logo"></a>
        </div>
        <div class="right">
            <a href="/home" class="login">Home</a>
            <a href="/product" class="login2">Product</a>
            <a href="#" class="login">Login</a>
            {{-- <a href="/register" class="login2">Register</a> --}}
        </div>
    </nav>

    <div class="containerLogin">
        <div class="login2">
            <h1>Login</h1>
            <br>
            <form class="w-100">
                <div class="mb-3">
                    <label for="exampleInputnama1" class="form-label">Nama lengkap</label>
                    <input type="text" class="form-control" id="exampleInputnama1" aria-describedby="name">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" aria-describedby="password">
                </div>
                <div class="mb-3">
                    <label for="exampleInputhandphone1" class="form-label">Nomor Handphone</label>
                    <input type="number" class="form-control" id="exampleInputhandphone1" aria-describedby="Handphone">
                </div>
                <br>
                <button type="submit" class="btn btn-primary mx-auto">Submit</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>