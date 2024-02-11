<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Post - SantriKoding.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body style="background: lightgray">
    @include('header')

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ url('/') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">Kategori</label>
                                {{-- <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" value="{{ old('title') }}" placeholder="Masukkan Judul Post"> --}}
                                <select name="kategori" id="kategori" class="form-select">
                                    <option value="pengaduan">Pengaduan</option>
                                    <option value="aspirasi">Aspirasi</option>
                                    <option value="lainnya">lainnya</option>
                                </select>

                                <!-- error message untuk title -->
                                @error('kategori')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">JUDUL</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" value="{{ old('title') }}" placeholder="Masukkan Judul Post">

                                <!-- error message untuk title -->
                                @error('title')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">GAMBAR</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    name="image">
                                <!-- error message untuk title -->
                                @error('image')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label class="font-weight-bold">KONTEN</label>
                                <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="5"
                                    placeholder="Masukkan Konten Post">{{ old('content') }}</textarea>

                                <!-- error message untuk content -->
                                @error('content')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="hidden" class="hidden" value="pending" name="status" id="status">
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row my-5">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded justify-content-center align-items-center d-flex">
                    <div class="card-body ">
                        <div class="d-flex justify-content-center align-items-center">
                            <h1>History laporan</h1>
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control search-input" placeholder="Search By Id..."
                                aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button"
                                    id="searchByIdButton">Search</button>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <table class="table table-responsive my-4 text-center">
                                <thead>
                                    <tr>
                                        <th class="px-5">No</th>
                                        <th class="px-5">Kategori Laporan</th>
                                        <th class="px-5">Judul Laporan</th>
                                        <th class="px-5">Isi Laporan</th>
                                        <th class="px-5">Gambar</th>
                                        <th class="px-5">Tanggal</th>
                                        <th class="px-5">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($history as $key => $data)
                                        <tr data-id="{{ $data->id }}" class="data-row">
                                            <td hidden>{{ $data->id }}</td>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $data->kategori }}</td>
                                            <td>{{ $data->title }}</td>
                                            <td>{!! $data->content !!}</td>
                                            <td>
                                                <img src="{{ asset('/storage/posts/' . $data->image) }}"
                                                    class="rounded" style="width: 50px">
                                            </td>
                                            <td>{{ $data->created_at->format('d M Y') }}</td>
                                            <td>{{ $data->status }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">
                                                <h1>Data kosong!</h1>
                                            </td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script>
        CKEDITOR.replace('content');
    </script>
</body>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function() {
        $("#searchByIdButton").click(function() {
            var searchId = $(".search-input").val().trim();

            // Loop melalui setiap baris tabel
            $(".data-row").each(function() {
                var rowId = $(this).data("id");

                // Cocokkan id yang diinputkan dengan id pada setiap baris
                if (searchId === "" || rowId.toString() === searchId) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>

</html>
