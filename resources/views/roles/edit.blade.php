@extends('layouts.app')

@section('content')

  <form action="/roles/{{$role->id}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('patch')
      <div class="form-group">
          <label class="label-control" for="name">Role</label>
          <input type="text" name="name" class="form-control" value="{{$role->name}}" placeholder="role name..."/>
      </div>
      <div class="form-group">
          <label class="label-control" for="slug">Slug</label>
          <input type="text" name="slug" class="form-control" value="{{$role->slug}}" placeholeder="slug name..."/>
      </div>
      <div class="form-group mb-3">
          <label class="label-control" for="permission">Add permission</label>
          <input type="text" name="permission" class="form-control" value="" placeholeder="permission name..."/>
      </div>
      <div class="form-group">
          <input type="submit" value="Update" class="btn btn-primary"/>
      </div>
  </form>

@endsection
