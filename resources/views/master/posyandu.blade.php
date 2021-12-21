@extends('admin/admin')

@section('tabel')
<div class="col-lg-10">
    <div class="users-table table-wrapper">
    <table class="table table-bordered border-primary">
        <thead>
          <tr class="users-table-info">
            <div class="form-group form-button">
                <a href="/tambahposyandu"><button class="form-btn primary-default-btn transparent-btn">Tambah Data</button></a>
            </div>
            <th>id posyandu</th>
            <th>nama posyandu</th>
            <th>alamat posyandu</th>
            <th>created at</th>
            <th>updated at</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($posyandu as $dataposyandu)
            <tr>
                <td scope="row">{{ $dataposyandu->id }}</td>
                <td scope="row">{{ $dataposyandu->nama_posyandu }}</td>
                <td scope="row">{{ $dataposyandu->alamat_posyandu }}</td>
                <td scope="row">{{ $dataposyandu->created_at }}</td>
                <td scope="row">{{ $dataposyandu->updated_at }}</td>
                <td>
                    <form action="/edit-posyandu" method="post" class="d-inline">
                        @csrf
                        <input type="hidden" name="id" value="{{ $dataposyandu->id }}">
                        <button class="btn btn-primary tombol border-0">
                            Edit
                        </button>
                    </form>
                  </td>
                  <td>
                    <a href="/hapus-posyandu{{$dataposyandu->id}}"><button type="button" class="btn btn-danger">Hapus</button></a>
                  </td>
              </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
