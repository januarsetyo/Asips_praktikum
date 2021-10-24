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
            <th>id kecamatan</th>
            <th>kecamatan</th>
            <th>created at</th>
            <th>updated at</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($kecamatan as $datakecamatan)
            <tr>
                <td scope="row">{{ $datakecamatan->id}}</td>
                <td scope="row">{{ $datakecamatan->kecamatan }}</td>
                <td scope="row">{{ $datakecamatan->created_at }}</td>
                <td scope="row">{{ $datakecamatan->updated_at }}</td>
              </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
