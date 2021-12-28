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
            <div class="form-group form-button">
                <a href="/tambahkelurahan"><button class="form-btn primary-default-btn transparent-btn">Tambah Data</button></a>
            </div>
            <th>id kelurahan</th>
            <th>kelurahan</th>
            <th>created at</th>
            <th>updated at</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($kelurahan as $datakelurahan)
            <tr>
                <td scope="row">{{ $datakelurahan->id }}</td>
                <td scope="row">{{ $datakelurahan->kelurahan }}</td>
                <td scope="row">{{ $datakelurahan->created_at }}</td>
                <td scope="row">{{ $datakelurahan->updated_at }}</td>
                <td>
                  <form action="/edit-kelurahan" method="post" class="d-inline">
                      @csrf
                      <input type="hidden" name="id" value="{{ $datakelurahan->id }}">
                      <button class="btn btn-primary tombol border-0">
                          Edit
                      </button>
                  </form>
              </td>
              <td>
                <a href="/hapus-kelurahan{{$datakelurahan->id}}"><button type="button" class="btn btn-danger">Hapus</button></a>
              </td>
              </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
