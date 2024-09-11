<head>
  <style>
    #customers {
      margin-top: 20px;
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

  </style>
</head>

<body>
  <center>
    <h3>Laporan Tranksaksi Sampah</h3>
    <small>{{ now()->format('d M Y H:i:s') }}</small>
  </center>
  <table class="table table-hover" id="customers">
    <thead>
      <tr>
        <th>Tanggal</th>
        <th>Nama Warga</th>
        <th>Jenis Sampah</th>
        <th>Berat</th>
        <th>Harga</th>
      </tr>
    </thead>
    <tbody class="table-border-bottom-0">
      <tr>
        <td>{{ $sampah->created_at->format('d M Y') }}</td>
        <td> <b>{{ $sampah->nama }}</b></td>
        <td>{{ $sampah->jenis_sampah }}</td>
        <td>
          {{ $sampah->berat }}
        </td>
        <td>{{ $sampah->harga }}</td>
      </tr>
    </tbody>
  </table>
  <script>
    window.print()

  </script>
</body>
