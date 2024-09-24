<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <title>Cetak Data Lapak</title>
</head>

<body>
    <div class="form-group">
        <p align="center"><b>Laporan Data Lapak</b></p>
        <table class="static">
            <tr>
                <th class="text-start">No</th>
                <th class="text-start">Id Lapak</th>
                <th class="text-start">Nama Pasar</th>
                <th class="text-start">Jenis</th>
                <th class="text-start">Lantai</th>
                <th class="text-start">Blok</th>
                <th class="text-start">Zonasi</th>
                <th class="text-start">No</th>
                <th class="text-start">Hadap</th>
                <th class="text-start">Luas</th>
                <th class="text-start">Tarif Dasar</th>
                <th class="text-start">Status Lapak</th>
            </tr>
            @foreach ($cetakLpLapak as $data)
                <tr>
                    <td class="text-start">{{ $loop->iteration }}</td>
                    <td class="text-start">{{ $data->id_lapak }}</td>
                    <td class="text-start">{{ $data->pasar->pasar }}</td>
                    <td class="text-start">{{ $data->jenis }}</td>
                    <td class="text-start">{{ $data->lantai }}</td>
                    <td class="text-start">{{ $data->blok }}</td>
                    <td class="text-start">{{ $data->zonasi }}</td>
                    <td class="text-start">{{ $data->no }}</td>
                    <td class="text-start">{{ $data->hadap }}</td>
                    <td class="text-start">{{ $data->luas }}</td>
                    <td class="text-start">{{ $data->tarif_dasar }}</td>
                    <td class="text-start">{{ $data->status_lapak }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
