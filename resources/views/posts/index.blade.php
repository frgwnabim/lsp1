<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Posts - SantriKoding.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Selamat datang di halaman Admin</h3>
                    {{-- <h5 class="text-center text-success">Muhammad Nawfal Rafi Ayyara</h5> --}}
                    <hr>

                </div>
                <div class="card border-0 shadow-sm rounded px-5 py-5">
                    <div class="row px-4">
                        {{-- CATEGORY --}}
                        <div class="col-md-4">
                            <label for="kategoriFilter">Filter by Category:</label>
                            <select id="kategoriFilter" class="form-select" onchange="applyFilter()">
                                <option value="all">All Categories</option>
                                <option value="pengaduan">Pengaduan</option>
                                <option value="aspirasi">aspirasi</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>
                        {{-- CATEGORY --}}

                        {{-- TIME --}}
                        <div class="col-md-4 d-flex ms-auto">
                            <div class="col-md-6">
                                <label for="tanggalFilter1">Filter by Tanggal:</label>
                                <select id="tanggalFilter1" class="form-select" onchange="applyFilter()">
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="tanggalFilter2">Filter by Bulan:</label>
                                <select id="tanggalFilter2" class="form-select" onchange="applyFilter()">
                                </select>
                            </div>
                        </div>
                        {{-- TIME --}}

                    </div>
                    <div class="card-body">
                        {{-- <a href="{{ route('posts.create') }}" class="btn btn-md btn-success mb-3">TAMBAH POST</a> --}}
                        <table class="table table-bordered" id="LaporanTable">
                            <thead>
                                <tr>

                                    <th scope="col">NO</th>
                                    <th scope="col">KATEGORI</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">GAMBAR</th>
                                    <th scope="col">JUDUL</th>
                                    <th scope="col">CONTENT</th>
                                    <th scope="col">TANGGAL</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody id="laporanTableBody">
                                @forelse ($posts as $key => $post)
                                    <tr data-category="{{ strtolower($post->kategori) }}">
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $post->kategori }}</td>
                                        <td>{{ $post->status }}</td>
                                        <td class="text-center">
                                            <img src="{{ asset('/storage/posts/' . $post->image) }}" class="rounded"
                                                style="width: 150px">
                                        </td>
                                        <td>{{ $post->title }}</td>
                                        <td>{!! $post->content !!}</td>
                                        <td>{{ $post->created_at->format('d F Y') }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                                <a href="{{ route('posts.show', $post->id) }}"
                                                    class="btn btn-sm btn-dark">SHOW</a>
                                                <a href="{{ route('posts.edit', $post->id) }}"
                                                    class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Post belum Tersedia.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <div class="fixed-bottom">
                <button type="submit" class="btn btn-danger px-5 py-2 my-3 mx-3">
                    {{-- <i class="nav-icon fas fa-sign-out-alt"></i> --}}
                    Logout
                </button>
            </div>
        </form>
    </footer>


</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
</script>

{{-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Isi pilihan tanggal
        var tanggalSelect = document.getElementById("tanggalFilter1");
        tanggalSelect.add(new Option("All Dates", "")); // Default option
        for (var i = 1; i <= 31; i++) {
            var option = document.createElement("option");
            option.value = i;
            option.text = i;
            tanggalSelect.add(option);
        }

        // Isi pilihan bulan
        var bulanSelect = document.getElementById("tanggalFilter2");
        bulanSelect.add(new Option("All Months", "")); // Default option
        var namaBulan = [
            "Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];
        for (var j = 0; j < namaBulan.length; j++) {
            var optionBulan = document.createElement("option");
            optionBulan.value = j + 1;
            optionBulan.text = namaBulan[j];
            bulanSelect.add(optionBulan);
        }

        // Panggil fungsi applyFilter() untuk memfilter data saat halaman dimuat
        applyFilter();
    });

    function applyFilter() {
        var filterTanggal = document.getElementById("tanggalFilter1").value;
        var filterBulan = document.getElementById("tanggalFilter2").value;

        // Loop melalui setiap baris tabel
        var laporanRows = document.querySelectorAll("#laporanTableBody tr");
        laporanRows.forEach(function(row) {
            var rowDataTanggal = row.querySelector("td:nth-child(7)").textContent; // Kolom TANGGAL

            // Cocokkan tanggal dan bulan yang dipilih dengan tanggal dan bulan pada setiap baris
            if ((filterTanggal === "" || rowDataTanggal.includes(filterTanggal)) &&
                (filterBulan === "" || rowDataTanggal.includes(filterBulan))) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    }
</script> --}}

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Isi pilihan tanggal
        var tanggalSelect = document.getElementById("tanggalFilter1");
        tanggalSelect.add(new Option("All Dates", "")); // Default option
        for (var i = 1; i <= 31; i++) {
            var option = document.createElement("option");
            option.value = i;
            option.text = i;
            tanggalSelect.add(option);
        }

        // Isi pilihan bulan
        var bulanSelect = document.getElementById("tanggalFilter2");
        bulanSelect.add(new Option("All Months", "")); // Default option
        var namaBulan = [
            "Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];
        for (var j = 0; j < namaBulan.length; j++) {
            var optionBulan = document.createElement("option");
            optionBulan.value = j + 1;
            optionBulan.text = namaBulan[j];
            bulanSelect.add(optionBulan);
        }

        // Panggil fungsi applyFilter() untuk memfilter data saat halaman dimuat
        applyFilter();
    });

    function applyFilter() {
        var filterTanggal = document.getElementById("tanggalFilter1").value;
        var filterBulan = document.getElementById("tanggalFilter2").value;

        // Loop melalui setiap baris tabel
        var laporanRows = document.querySelectorAll("#laporanTableBody tr");
        laporanRows.forEach(function(row) {
            var rowDataTanggal = row.querySelector("td:nth-child(7)").textContent; // Kolom TANGGAL

            // Buat objek Date untuk membandingkan tanggal dan bulan secara akurat
            var rowDataDate = new Date(rowDataTanggal);

            // Cocokkan tanggal, bulan, dan tahun yang dipilih dengan tanggal, bulan, dan tahun pada setiap baris
            if ((filterTanggal === "" || rowDataDate.getDate() == filterTanggal) &&
                (filterBulan === "" || rowDataDate.getMonth() + 1 == filterBulan)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    }
</script>




















{{-- Script Kategori --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var selectElement = document.getElementById("kategoriFilter");

        selectElement.addEventListener("change", function() {
            var selectedCategory = selectElement.value;
            var tableRows = document.querySelectorAll("#laporanTableBody tr");

            tableRows.forEach(function(row) {
                var rowCategory = row.getAttribute("data-category");

                // Check if the selected category is "all" or matches the row's data-category attribute
                if (selectedCategory === "all" || selectedCategory === rowCategory) {
                    row.style.display = ""; // Display the row
                } else {
                    row.style.display = "none"; // Hide the row
                }
            });
        });
    });
</script>

{{-- Script session --}}
<script>
    //message with toastr
    @if (session()->has('success'))

        toastr.success('{{ session('success') }}', 'BERHASIL!');
    @elseif (session()->has('error'))

        toastr.error('{{ session('error') }}', 'GAGAL!');
    @endif
</script>


</html>
