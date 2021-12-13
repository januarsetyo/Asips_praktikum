@extends('admin/admin')

@section('tabel')
<div class="col-lg-9">
    <div class="users-table table-wrapper">
      <table class="table table-bordered table-dark">
        <thead>
          <tr class="users-table-info">
            <div class="form-group form-button">
                <a href="/tambahkecamatan"><button type="submit" name="signup" id="signup" class="form-submit">Tambah</button></a>
            </div>
            <th>ID Kecamatan</th>
            <th>Kecamatan</th>
            <th>created at</th>
            <th>updated at</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($kecamatan as $datakecamatan)
            <tr>
                <td scope="row">{{ $datakecamatan->id}}</td>
                <td scope="row">{{ $datakecamatan->kecamatan }}</td>
                <td scope="row">{{ $datakecamatan->CREATED_AT }}</td>
                <td scope="row">{{ $datakecamatan->UPDATED_AT }}</td>
                <td>
                  <form action="/edit-kecamatan" method="post" class="d-inline">
                      @csrf
                      <input type="hidden" name="id" value="{{ $datakecamatan->id }}">
                      <button class="btn btn-primary tombol border-0">
                          Edit
                      </button>
                  </form>
                </td>
              </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection