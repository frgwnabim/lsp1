<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center" style="height: 100vh;">
            {{-- <div class="col-md-4">
                <h1>Login Admin</h1>
                <p>email : email@example.com <br>password : password</p>
            </div> --}}
            <div class="col-md-4 col-sm-12 px-3 shadow rounded px-4">
                <div class="d-flex justify-content-center align-items-center my-4">
                    <h2>Login Admin</h2>
                </div>
                <p>Username : admin@mail.com <br> password : admin</p>
                <form action="{{ url('/login') }}" method="POST">
                    @csrf
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
                    @endif
                    <div class="input-control my-2">
                        <label for="email">Email : </label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>

                    <div class="input-control my-2">
                        <label for="password">Password :</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div style="float: right;">
                        <button type="submit" class="btn btn-outline-primary my-4 px-4 py-2">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
</script>

</html>
