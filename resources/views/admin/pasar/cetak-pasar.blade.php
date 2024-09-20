<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table.static {
            position: relative;
            border: 1px solid #543535;
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
            font-size: 12px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
    <title>Cetak Data Pasar</title>
</head>

<body>
    <div class="form-group">
        <p align="center"><b>Laporan Data Pasar</b></p>
        <table class="static">
            <tr>
                <th>Id Pasar</th>
                <th>Pasar</th>
                <th>Koordinat</th>
                <th>Kantor Pengelola</th>
                <th>Toilet</th>
                <th>Pos Ukur Ulang</th>
                <th>Pos keamanan</th>
                <th>Ruang Menyusui</th>
                <th>Ruang Kesehatan</th>
                <th>Ruang Peribadatan</th>
                <th>Pemadam Kebakaran</th>
                <th>Tempat Parkir</th>
                <th>TPS</th>
                <th>Pengolahan Air Limbah</th>
                <th>Air Bersih</th>
                <th>Listrik</th>
            </tr>
            @foreach ($pasar as $data)
            <tr>
                {{-- <td>{{ $loop->iteration }}</td> --}}
                <td>{{ $loop->iteration}}</td>
                <td>{{ $data->pasar }}</td>
                <td>{{ $data->koordinat }}</td>
                <td>{{ $data->kantor_pengelola }}</td>
                <td>{{ $data->toilet }}</td>
                <td>{{ $data->pos_ukur_ulang }}</td>
                <td>{{ $data->pos_keamanan }}</td>
                <td>{{ $data->ruang_menyusui }}</td>
                <td>{{ $data->ruang_kesehatan }}</td>
                <td>{{ $data->ruang_peribadatan }}</td>
                <td>{{ $data->pemadam_kebakaran }}</td>
                <td>{{ $data->tempat_parkir }}</td>
                <td>{{ $data->tps }}</td>
                <td>{{ $data->pengolahan_air_limbah }}</td>
                <td>{{ $data->air_bersih }}</td>
                <td>{{ $data->listrik }}</td>
            </tr>
            @endforeach
        </table>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>