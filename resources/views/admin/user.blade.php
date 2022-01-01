@extends('admin/admin')

@section('tabel')
<div class="col-lg-10">
    <div class="users-table table-wrapper">
      <table class="table table-bordered table-dark">
        <thead>
          <tr class="users-table-info">
            <th>username</th>
            <th>password</th>
            <th>Role</th>
            <th>created_at</th>
            <th>updated_at</th>
            <th>Edit</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($user as $datauser)
            <tr>
                <td scope="row">{{ $datauser->username }}</td>
                <td scope="row">{{ $datauser->password }}</td>
                <td scope="row">{{ $datauser->id_role }}</td>
                <td scope="row">{{ $datauser->created_at }}</td>
                <td scope="row">{{ $datauser->updated_at }}</td>
                <td>
                  <form action="/edit-user" method="post" class="d-inline">
                      @csrf
                      <input type="hidden" name="id" value="{{ $datauser->id }}">
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
