@extends('layouts.app')

@section('content')
<div class="container">
   <div class="card">
      <div class="card-header">
          <h3>Name: {{$role['name']}}</h3>
          <h4>Slug:  {{$role['slug']}}</h3>
      </div>
      <div class="card-body">
          <div class="card-title">Permissions</div>
          <div class="card-text">
              ............
          </div>
      </div>
      <div class="card-footer">
          <a href="{{url()->previous()}}" class="btn btn-primary">Go Back</a>
      </div>
   </div>
</div>

@endsection
