<head>
  <style>
    @media print {
      body {
        margin: 0;
        padding: 0;
      }

      #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }

      #customers td,
      #customers th {
        border: 1px solid #ddd;
        padding: 8px;
      }

      #customers tr:nth-child(even) {
        background-color: #f2f2f2;
      }

      #customers tr:hover {
        background-color: #ddd;
      }

      #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
      }

      .center {
        text-align: center;
      }

      .bold {
        font-weight: bold;
      }
    }

  </style>
</head>

<body onload="window.print()">
  <center>
    <h3 class="center">Laporan Transaksi Sampah</h3>
    <small class="center">{{ now()->format('d M Y H:i:s') }}</small>
  </center>
  <table class="table table-hover" id="customers">
    <thead>
      <tr>
        <th class="bold">Tanggal</th>
        <th class="bold">Nama Warga</th>
        <th class="bold">Jenis Sampah</th>
        <th class="bold">Berat</th>
        <th class="bold">Harga</th>
      </tr>
    </thead>
    <tbody class="table-border-bottom-0">
      @foreach ($sampah as $data)
      <tr>
        <td>{{ $data->created_at->format('d M Y') }}</td>
        <td><b>{{ $data->nama }}</b></td>
        <td>{{ $data->jenis_sampah }}</td>
        <td>{{ $data->berat }}</td>
        <td>{{ $data->harga }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>
