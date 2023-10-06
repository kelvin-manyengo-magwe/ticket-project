@extends('layouts.app')

@section('content')

<style>
body {
  background: #fff;
  font-family: 'PT Sans', sans-serif;
}
a {
  color: #333;
  text-decoration: none;
}
a:hover {
  color: #da5767;
}
.form-control {
  background-color: #f8f9fa;
  padding: 20px;
  padding: 25px 15px;
  margin-bottom: 1.3rem;
}
.form-control:focus {
  color: #000000;
  background-color: #ffffff;
  border: 3px solid #da5767;
  outline: 0;
  box-shadow: none;
}
.btn {
  padding: 0.6rem 1.2rem;
  background: #da5767;
  border: 2px solid #da5767;
}
.btn-primary:hover {
  background-color: #df8c96;
  border-color: #df8c96;
  transition: 0.3s;
}
</style>

  <div class="row justify-content-center" style="margin-left: 20%;">
      <div class="col-md-8">
          <div class="card">
              <div class="card-title text-center"><h3>Edit user</h3></div>

              <form method="POST" class="p-3" action="/users/{{$user->id}}" enctype="multipart/form-data">
                @method('patch')
                @csrf

                <div class="form-group">
                    <label for="name">Username</label>
                    <input type="text" name="name" class="form-control" size="60" placeholder="Name..." value="{{ $user->name }}"/>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email..." value="{{ $user->email }}"/>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password..." />
                </div>
                <div class="form-group">
                    <label for="name">Confirm password</label>
                    <input type="password" name="password" class="form-control" placeholder="Confirm password..."/>
                </div>

                <div class="form-group mb-4">
                      <select size="3" name="permissions[]" multiple>
                          @foreach($permissions as $permission)
                            <option value="{{$permission->id}}"
                              @if($user->hasPermissionTo($permission->id))
                                selected="selected"
                              @endif
                              >{{$permission->name}}</option>
                          @endforeach
                      </select>
                </div>

                <div class="form-group pt-2">
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
              </form>
          </div>
      </div>
  </div>

@endsection
