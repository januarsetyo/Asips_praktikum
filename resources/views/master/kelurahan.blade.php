@extends('admin/admin')

@section('tabel')
<div class="col-lg-9">
    <div class="users-table table-wrapper">
      <table class="posts-table">
        <thead>
          <tr class="users-table-info">
            <div class="form-group form-button">
                <a href="/tambahkelurahan"><button type="submit" name="signup" id="signup" class="form-submit">Tambah</button></a>
            </div>
            <th>id kelurahan</th>
            <th>kelurahan</th>
            <th>created at</th>
            <th>updated at</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($kelurahan as $datakelurahan)
            <tr>
                <td scope="row">{{ $datakelurahan->id }}</td>
                <td scope="row">{{ $datakelurahan->kelurahan }}</td>
                <td scope="row">{{ $datakelurahan->created_at }}</td>
                <td scope="row">{{ $datakelurahan->updated_at }}</td>
              </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
