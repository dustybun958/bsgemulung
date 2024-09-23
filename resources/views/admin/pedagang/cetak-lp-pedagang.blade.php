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
    <title>Cetak Data Pedagang</title>
</head>

<body>
    <div class="form-group">
        <p align="center"><b>Laporan Data Pedagang</b></p>
        <table class="static">
            <tr>
                <th class="text-start">No</th>
                <th class="text-start">Id Pedagang</th>
                <th class="text-start">Id Lapak</th>
                <th class="text-start">NIK</th>
                <th class="text-start">Check In</th>
                <th class="text-start">Check Out</th>
                <th class="text-start">Status</th>
                <th class="text-start">VA</th>
                <th class="text-start">Penarik Retribusi</th>
            </tr>
            @foreach ($cetakLpPedagang as $data)
            <tr>
                <td class="text-start">{{$loop->iteration}}</td>
                <td class="text-start">{{$data->id_pedagang}}</td>
                <td class="text-start">{{$data->id_lapak}}</td>
                <td class="text-start">{{$data->nik}}</td>
                <td class="text-start">{{$data->check_in}}</td>
                <td class="text-start">{{$data->check_out}}</td>
                <td class="text-start">{{$data->status}}</td>
                <td class="text-start">{{$data->VA}}</td>
                <td class="text-start">{{$data->penarikRetribusi->nama}}</td>
            </tr>
            @endforeach
        </table>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>