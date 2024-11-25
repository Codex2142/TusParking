<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Riwayat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
</head>
<body>
    @include('layout.header')
    @include('layout.sidebar')
    <div class="container mt-3">
        <aside class="mr-3" style="flex: 1;">
            <div class="card" style="margin-left: 10px; padding-top: 70px">
                <div class="text-white card-header bg-dark">
                    <h3 class="mb-0">SEDANG PARKIR</h3>
                </div>
                <div class="mb-3 d-flex">
                    <input type="text" id="searchInput" class="mt-3 form-control me-2" placeholder="Cari Nomor Induk atau Plat" autocomplete="off"v>
                    <select id="monthFilter" class="mt-3 ml-2 form-control">
                        <option value="">Pilih Bulan</option>
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>

                </div>
                <div class="card-body" id="printArea">
                    <table class="table table-bordered table-striped" id="dataTable">
                        <thead class="table-dark">
                            <tr>
                                <th>No.</th>
                                <th>Plat</th>
                                <th>Petugas Masuk</th>
                                <th>Petugas Keluar</th>
                                <th>Nomor Induk Masuk</th>
                                <th>Nomor Induk Keluar</th>
                                <th>Waktu Masuk</th>
                                <th>Waktu Keluar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($read) > 0)
                                @foreach ($read as $i)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $i->plat }}</td>
                                        <td>{{ $i->nipmasuk }}</td>
                                        <td>{{ $i->nipkeluar }}</td>
                                        <td>{{ $i->nimmasuk }}</td>
                                        <td>{{ $i->nimkeluar }}</td>
                                        <td>{{ $i->masuk }}</td>
                                        <td>{{ $i->keluar }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8" class="text-center">Tidak ada Data</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <button onclick="generatePDF()" class="ml-2 btn btn-primary">Cetak PDF</button>
            </div>
        </aside>
    </div>
    @include('layout.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.21/jspdf.plugin.autotable.min.js"></script>
    <script src="{{ asset('script/riwayat.js') }}"></script>

</body>
</html>
