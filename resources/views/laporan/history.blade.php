@extends('admin/admin')

@section('tabel')
<div class="col-lg-10">
    <div class="users-table table-wrapper">
      <table class="table table-bordered table-dark">
        <thead>
          <tr class="users-table-info">
            <th>id_history_posyandu</th>
            <th>id_balita</th>
            <th>tgl_posyandu</th>
            <th>berat_badan_balita</th>
            <th>tinggi_badan</th>
            <th>created_at</th>
            <th>updated_at</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($history_posyandu as $datahistory)
            <tr>
                <td scope="row">{{ $datahistory->id }}</td>
                <td scope="row">{{ $datahistory->id_balita}}</td>
                <td scope="row">{{ $datahistory->tgl_posyandu }}</td>
                <td scope="row">{{ $datahistory->berat_badan_balita }}</td>
                <td scope="row">{{ $datahistory->tinggi_badan }}</td>
                <td scope="row">{{ $datahistory->created_at }}</td>
                <td scope="row">{{ $datahistory->updated_at }}</td>
              </tr>
            @endforeach
          </tbody>
      </table>
    </div>
  </div>
@endsection
