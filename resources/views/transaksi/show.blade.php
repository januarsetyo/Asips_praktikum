<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4" style="max-width:800px">
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Detail Transaksi</h5>
            <a href="/transaksi" class="btn btn-light btn-sm">Kembali</a>
        </div>
        <div class="card-body">

            <div class="row mb-3">
                <div class="col-sm-6">
                    <table class="table table-borderless table-sm">
                        <tr>
                            <td class="fw-bold">No Transaksi</td>
                            <td>: {{ $transaksi->no_transaksi }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Tanggal</td>
                            <td>: {{ date('d/m/Y', strtotime($transaksi->tanggal)) }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Customer</td>
                            <td>: {{ $transaksi->customer }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Total</td>
                            <td>: <strong>Rp {{ number_format($transaksi->total, 0, ',', '.') }}</strong></td>
                        </tr>
                    </table>
                </div>
            </div>

            <h6>Item Barang</h6>
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaksi->detail as $item)
                    <tr>
                        <td>{{ $item->kode_barang }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($item->sub_total, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="text-end fw-bold">Total</td>
                        <td><strong>Rp {{ number_format($transaksi->total, 0, ',', '.') }}</strong></td>
                    </tr>
                </tfoot>
            </table>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
