@extends('admin/admin')

@section('tabel')
<div class="col-lg-9">
    <div class="users-table table-wrapper">
      <table class="posts-table">
        <thead>
          <tr class="users-table-info">
            <div class="form-group form-button">
                <a href="/tambahposyandu"><button type="submit" name="signup" id="signup" class="form-submit">Tambah</button></a>
            </div>
            <th>id posyandu</th>
            <th>nama posyandu</th>
            <th>alamat posyandu</th>
            <th>created at</th>
            <th>updated at</th>
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
              </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
