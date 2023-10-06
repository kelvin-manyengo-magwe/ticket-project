@extends('layouts.app')

@section('content')
<div class="row py-lg-2 mb-4">
  <div class="col-md-6">This is role list</div>
  <div class="col-md-6">
      <a href="/roles/create" class="btn btn-primary btn-lg float-md-right" style="float: right;">Create role</a>
  </div>
</div>

  <div class="card">
      <div class="card-header">
        <i class="bi bi-table"></i>
        Data table
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-hover">
                  <tr>
                      <th>Id</th>
                      <th>Role</th>
                      <th>Slug</th>
                      <th>Permission</th>
                      <th>Tools</th>
                  </tr>
                  @foreach($roles as $role)
                  <tr>
                      <td>{{$role['id']}}</td>
                      <td>{{$role['name']}}</td>
                      <td>{{$role['slug']}}</td>
                      <td>Permissions...</td>
                      <td>
                          <a href="/roles/{{$role['id']}}"><i class="bi bi-eye"></i></a>
                          <a href="/roles/{{$role['id']}}/edit"><i class="bi bi-pencil-square"></i></a>

                        <form method="post" action="/roles/{{$role->id}}">
                          @csrf
                          @method('delete')
                            <a href="/roles/{{$role['id']}}"><i class="bi bi-trash"></i></a>
                        </form>

                      </td>
                  </tr>
                  @endforeach
              </table>
          </div>
      </div>
  </div>

@endsection
