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
                <th>No</th>
                <th>Id Izin</th>
                <th>Id Pedangang</th>
                <th>Izin</th>
            </tr>
            @foreach ($izin as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->id_izin}}</td>
                <td>{{ $data->id_pedagang }}</td>
                <td>{{ $data->izin }}</td>
            </tr>
            @endforeach
        </table>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>