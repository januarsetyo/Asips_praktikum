@extends('admin/admin')

@section('tabel')
<div class="col-lg-9">
    <div class="users-table table-wrapper">
      <table class="table table-bordered table-dark">
        <thead>
          <tr class="users-table-info">
            <div class="form-group form-button">
                <a href="/tambahrole"><button type="submit" name="signup" id="signup" class="form-submit">Tambah</button></a>
            </div>
            <th>id role</th>
            <th>Role</th>
            <th>created at</th>
            <th>updated at</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($role as $datarole)
            <tr>
                <td scope="row">{{ $datarole->id}}</td>
                <td scope="row">{{ $datarole->role }}</td>
                <td scope="row">{{ $datarole->created_at }}</td>
                <td scope="row">{{ $datarole->updated_at }}</td>
              </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
