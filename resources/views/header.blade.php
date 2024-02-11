<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('layout')
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow">
        <div class="container-fluid">
          <a class="navbar-brand py-3 px-3" href="/">Pengaduan Masyarakat</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link text-dark"  href="/"><b>Home</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark" href="/kegiatan-warga"><b>Kegiatan Warga</b></a>
              </li>
            </ul>
            <span class="navbar-text">
              <a href="/login" class="px-4 text-decoration-none" target="_blank">Login</a>
            </span>
          </div>
        </div>
      </nav>
</body>
</html>