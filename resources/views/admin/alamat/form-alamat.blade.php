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
    <title>Cetak Data Diri</title>
</head>

<body>
    <div class="form-group">
        <p align="center"><b>Laporan Data Diri</b></p>
        <table class="static">
            <tr>
                <th>ID Alamat</th>
                <th>Kode Alamat</th>
                <th>Kab/Kota</th>
                <th>Kecamatan</th>
                <th>Kelurahan</th>
            </tr>
            @foreach ($alamat as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->kode_alamat }}</td>
                <td>{{ $data->kab_kota }}</td>
                <td>{{ $data->kecamatan }}</td>
                <td>{{ $data->Kelurahan }}</td>
            </tr>
            @endforeach
        </table>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>