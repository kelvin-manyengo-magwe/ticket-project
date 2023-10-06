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
          <div class="card-title text-center"> <h3>{{ __('Create new user')}}</h3></div>
            <div class="card-body">
              <form method="POST" action="/users" enctype="multipart/form-data">
                @method('post')
                @csrf

                  @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                      <ul>
                          <li>{{$error}}</li>
                      </ul>
                    @endforeach
                </div>
                  @endif
                  <div class="form">

                <div class="form-group">
                    <label for="name">Username</label>
                    <input type="text" name="name" class="form-control" size="60" placeholder="Name..."/>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email..."/>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password..." />
                </div>

                <div class="form-group mb-4">
                    <label for="name">Confirm password</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password..."/>
                </div>

                  <div class="form-group">
                      <label for="roles">Create the role</label>
                      <input type="text" placeholder="Create the role...." class="form-control" name="role"/>
                  </div>

                <div class="form-group mb-4">
                      <label class="label-control">Select permissions</label>
                      <select size="3" name="permissions[]" multiple>
                          @foreach($permissions as $permission)
                            <option value={{$permission->id}}>{{$permission->name}}</option>
                          @endforeach
                      </select>
                </div>


                <div class="col form-group pt-3">
                    <button type="submit" style="font-size: 1.1rem;" class="btn btn-primary">Create</button>
                </div>
              </div>
              </form>
            </div>
      </div>
    </div>
</div>


@endsection
