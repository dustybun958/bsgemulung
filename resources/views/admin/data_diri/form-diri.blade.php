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
                <th class="text-start">No</th>
                <th class="text-start">Nama</th>
                <th class="text-start">NIK</th>
                <th class="text-start">Jenis Kelamin</th>
                <th class="text-start">Alamat</th>
                <th class="text-start">RT</th>
                <th class="text-start">RW</th>
            </tr>

            @foreach ($dataDiri as $data)
            <tr>
                <td class="text-start">{{ $loop->iteration }}</td>
                <td class="text-start">{{ $data->nama }}</td>
                <td class="text-start">{{ $data->nik }}</td>
                <td class="text-start">{{ $data->jenis_kelamin }}</td>
                <td class="text-start">{{ $data->alamat->kab_kota}}, {{$data->alamat->kecamatan}}, {{$data->alamat->Kelurahan}}</td>
                <td class="text-start">{{ $data->rt }}</td>
                <td class="text-start">{{ $data->rw }}</td>
            </tr>
            @endforeach
        </table>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>