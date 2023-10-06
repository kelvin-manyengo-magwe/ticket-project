@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
          <div class="card-header">
              <h1>Name: {{$user->name}}</h1>

          </div>
          <div class="card-body">
              <h5 class="card-title">Role</h5>
              <p class="card-text">
                @foreach($roles as $role)
                  <span class="badge text-sm bg-warning">{{$role->name}}</span>
                @endforeach
              </p>
               <h4>Email: {{$user->email}}</h4>
              <h5 class="card-title">Permissions</h5>
              <p class="card-text">
                  @foreach($user->permissions as $permission)
                    <span class="badge text-sm bg-info text-dark">{{ $permission->name }}</span>
                  @endforeach
                  
              </p>
          </div>
              <div>
              <a href="{{url()->previous()}}" class="btn btn-primary">Go Back</a>
            </div>
      </div>
    </div>
</div>

@endsection
