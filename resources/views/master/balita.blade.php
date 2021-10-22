@extends('admin/admin')

@section('tabel')
<div class="col-lg-9">
    <div class="users-table table-wrapper">
      <table class="table table-bordered table-dark">
        <thead>
          <tr class="users-table-info">
            <th>id_balita</th>          
            <th>id_posyandu</th>
            <th>nama_balita</th>
            <th>nik_orang_tua</th>
            <th>nama_orang_tua</th>
            <th>tgl_lahir_balita</th>
            <th>jenis_kelamin_balita</th>
            <th>status</th>
            <th>created_at</th>
            <th>updated_at</th>
          </tr>
        </thead>
        <tbody>
            <tr>
              <th scope="row">1</th>
            </tr>
          </tbody>
      </table>
    </div>
  </div>
@endsection