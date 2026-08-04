@extends('admin/admin')

@section('tabel')

@if(session('sukses'))
<div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align: center">
    {{ session('sukses') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert" style="text-align: center">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="col-lg-10">
    <div class="users-table table-wrapper">

        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:12px">
            <a href="/tambahbarang">
                <button class="form-btn primary-default-btn transparent-btn">Tambah Data</button>
            </a>
            <form method="GET" action="/barang" style="display:flex; gap:8px">
                <input type="text" name="search" class="form-control" placeholder="Cari nama barang..." value="{{ $search }}" style="width:220px">
                <button class="btn btn-secondary btn-sm" type="submit">Cari</button>
                @if($search)
                    <a href="/barang" class="btn btn-outline-secondary btn-sm">Reset</a>
                @endif
            </form>
        </div>

        <table class="table table-bordered border-primary">
            <thead>
                <tr class="users-table-info">
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                @forelse($barang as $item)
                <tr>
                    <td>{{ $item->kode_barang }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                    <td>{{ $item->stok }}</td>
                    <td>
                        <form action="/edit-barang" method="POST" class="d-inline">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <button class="btn btn-primary btn-sm tombol border-0">Edit</button>
                        </form>
                    </td>
                    <td>
                        <a href="/hapus-barang{{ $item->id }}">
                            <button type="button" class="btn btn-danger btn-sm tombol">Hapus</button>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align:center">Tidak ada data barang</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        {{ $barang->appends(['search' => $search])->links() }}

    </div>
</div>

@endsection
