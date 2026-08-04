@extends('admin/admin')

@section('tabel')

@if(session('sukses'))
<div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align: center">
    {{ session('sukses') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="col-lg-10">
    <div class="users-table table-wrapper">

        <div style="margin-bottom:12px">
            <a href="/tambahtransaksi">
                <button class="form-btn primary-default-btn transparent-btn">Tambah Transaksi</button>
            </a>
        </div>

        <table class="table table-bordered border-primary">
            <thead>
                <tr class="users-table-info">
                    <th>No Transaksi</th>
                    <th>Tanggal</th>
                    <th>Customer</th>
                    <th>Total</th>
                    <th>Detail</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transaksi as $item)
                <tr>
                    <td>{{ $item->no_transaksi }}</td>
                    <td>{{ date('d/m/Y', strtotime($item->tanggal)) }}</td>
                    <td>{{ $item->customer }}</td>
                    <td>Rp {{ number_format($item->total, 0, ',', '.') }}</td>
                    <td>
                        <a href="/detail-transaksi{{ $item->id }}">
                            <button type="button" class="btn btn-info btn-sm tombol">Detail</button>
                        </a>
                    </td>
                    <td>
                        <a href="/hapus-transaksi{{ $item->id }}">
                            <button type="button" class="btn btn-danger btn-sm tombol">Hapus</button>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align:center">Belum ada transaksi</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        {{ $transaksi->links() }}

    </div>
</div>

@endsection
