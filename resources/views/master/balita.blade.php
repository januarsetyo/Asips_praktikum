@extends('admin/admin')

@section('tabel')
<div class="col-lg-9">
    <div class="users-table table-wrapper">
      <table class="table table-bordered table-dark">
        <thead>
          <tr class="users-table-info">
            <div class="form-group form-button">
                <a href="/tambahbalita"><button type="submit" name="signup" id="signup" class="form-submit">Tambah</button></a>
            </div>
            <th>id balita</th>
            <th>id posyandu</th>
            <th>nama balita</th>
            <th>nik orang tua</th>
            <th>nama orang tua</th>
            <th>tgl lahir balita</th>
            <th>jenis kelamin balita</th>
            <th>created at</th>
            <th>updated at</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($balita as $databalita)
            <tr>
                <td scope="row">{{ $databalita->id }}</td>
                <td scope="row">{{ $databalita->id_posyandu}}</td>
                <td scope="row">{{ $databalita->nama_balita }}</td>
                <td scope="row">{{ $databalita->nik_orang_tua }}</td>
                <td scope="row">{{ $databalita->nama_orang_tua }}</td>
                <td scope="row">{{ $databalita->tgl_lahir_balita }}</td>
                <td scope="row">{{ $databalita->jenis_kelamin_balita }}</td>
                <td scope="row">{{ $databalita->created_at }}</td>
                <td scope="row">{{ $databalita->updated_at }}</td>
              </tr>
            @endforeach
          </tbody>
      </table>
    </div>
  </div>
@endsection
