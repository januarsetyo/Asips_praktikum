@extends('admin/admin')

@section('tabel')
@if (session()->has('tambah'))
<div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align: center">
    {{ session('tambah') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session()->has('edit'))
<div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align: center">
    {{ session('edit') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session()->has('hapus'))
<div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align: center">
    {{ session('hapus') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="col-lg-10">
    <div class="users-table table-wrapper">
    <table class="table table-bordered border-primary">
        <thead>
          <tr class="users-table-info">
            @if (auth()->user()->id_role=='1'||'2')
            <div class="form-group form-button">
                <a href="/tambahbalita"><button class="form-btn primary-default-btn transparent-btn">Tambah Data</button>
            </div>
            @endif
            <th>id balita</th>
            <th>nama balita</th>
            <th>nik orang tua</th>
            <th>nama orang tua</th>
            <th>tgl lahir balita</th>
            <th>jenis kelamin balita</th>
            <th>created at</th>
            <th>updated at</th>
            <th>Edit</th>
            @if ((auth()->user()->id_role=="1") || (auth()->user()->id_role=="2"))
            <th>Delete</th>
            @endif
          </tr>
        </thead>
        <tbody>
            @foreach ($balita as $databalita)
            <tr>
                <td scope="row">{{ $databalita->id }}</td>
                <td scope="row">{{ $databalita->nama_balita }}</td>
                <td scope="row">{{ $databalita->nik_orang_tua }}</td>
                <td scope="row">{{ $databalita->nama_orang_tua }}</td>
                <td scope="row">{{ $databalita->tgl_lahir_balita }}</td>
                <td scope="row">{{ $databalita->jenis_kelamin_balita }}</td>
                <td scope="row">{{ $databalita->created_at }}</td>
                <td scope="row">{{ $databalita->updated_at }}</td>
                <td>
                    <form action="/edit-balita" method="post" class="d-inline">
                        @csrf
                        <input type="hidden" name="id" value="{{ $databalita->id }}">
                        <button class="btn btn-primary tombol border-0">
                            Edit
                        </button>
                    </form>
                  </td>
                  @if ((auth()->user()->id_role=="1") || (auth()->user()->id_role=="2"))
                  <td>
                    <a href="/hapus-balita{{$databalita->id}}"><button type="button" class="btn btn-danger">Hapus</button></a>
                  </td>
                  @endif
              </tr>
            @endforeach
          </tbody>
      </table>
    </div>
  </div>
@endsection
