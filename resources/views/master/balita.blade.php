@extends('admin/admin')

@section('tabel')
<div class="col-lg-10">
    <div class="users-table table-wrapper">
    <table class="table table-bordered border-primary">
        <thead>
          <tr class="users-table-info">
            <div class="form-group form-button">
                <a href="/tambahbalita"><button class="form-btn primary-default-btn transparent-btn">Tambah Data</button>
            </div>
            <th>id balita</th>
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
