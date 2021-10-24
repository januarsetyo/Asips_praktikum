@extends('admin/admin')

@section('tabel')
<div class="col-lg-9">
    <div class="users-table table-wrapper">
      <table class="table table-bordered table-dark">
        <thead>
          <tr class="users-table-info">
            <th>username</th>
            <th>password</th>
            <th>created_at</th>
            <th>updated_at</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($user as $datauser)
            <tr>
                <td scope="row">{{ $datauser->username }}</td>
                <td scope="row">{{ $datauser->password }}</td>
                <td scope="row">{{ $datauser->created_at }}</td>
                <td scope="row">{{ $datauser->updated_at }}</td>
              </tr>
            @endforeach
          </tbody>
      </table>
    </div>
  </div>
@endsection
