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
            @if (auth()->user()->id_role=='1,2')
            <div class="form-group form-button">
                <a href="/tambahhistory"><button class="form-btn primary-default-btn transparent-btn">Tambah Data</button></a>
            </div>
            @endif
            <th>id history posyandu</th>
            <th>id balita</th>
            <th>tgl posyandu</th>
            <th>berat badan balita</th>
            <th>tinggi badan</th>
            <th>created at</th>
            <th>updated at</th>
            @if (auth()->user()->id_role=='1,2')
            <th>Edit</th>
            <th>Delete</th>
            @endif
          </tr>
        </thead>
        <tbody>
          @foreach ($history_posyandu as $datahistory)
          <tr>
              <td scope="row">{{ $datahistory->id }}</td>
              <td scope="row">{{ $datahistory->id_balita}}</td>
              <td scope="row">{{ $datahistory->tgl_posyandu }}</td>
              <td scope="row">{{ $datahistory->berat_badan_balita }}</td>
              <td scope="row">{{ $datahistory->tinggi_badan }}</td>
              <td scope="row">{{ $datahistory->created_at }}</td>
              <td scope="row">{{ $datahistory->updated_at }}</td>
              @if (auth()->user()->id_role=='1,2')
              <td>
                <form action="/edit-history" method="post" class="d-inline">
                    @csrf
                    <input type="hidden" name="id" value="{{ $datahistory->id }}">
                    <button class="btn btn-primary tombol border-0">
                        Edit
                    </button>
                </form>
              </td>
              <td> 
                <a href="/hapus-history{{$datahistory->id}}" class="btn btn-primary tombol border-0">Hapus</a>
              </td>
              @endif
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
