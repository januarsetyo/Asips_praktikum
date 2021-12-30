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
                <a href="/tambahuserrole"><button class="form-btn primary-default-btn transparent-btn">Tambah Data</button></a>
            </div>
            <th>id</th>
            <th>Nama User</th>
            <th>Role</th>
            <th>created at</th>
            <th>updated at</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($userrole as $datauserrole)
            <tr>
                <td scope="row">{{ $datauserrole->id }}</td>
                <td scope="row">{{ $datauserrole->id_kecamatan}}</td>
                <td scope="row">{{ $datauserrole->kelurahan }}</td>
                <td scope="row">{{ $datauserrole->created_at }}</td>
                <td scope="row">{{ $datauserrole->updated_at }}</td>
                <td>
                  <form action="/edit-userrole" method="post" class="d-inline">
                      @csrf
                      <input type="hidden" name="id" value="{{ $datauserrole->id }}">
                      <button class="btn btn-primary tombol border-0">
                          Edit
                      </button>
                  </form>
              </td>
              <td>
                <a href="/hapus-userrole{{$datauserrole->id}}"><button type="button" class="btn btn-danger">Hapus</button></a>
              </td>
              </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
