@extends('layouts.app')

@section('content')

  <div class="container">
      <h2>Create new role</h2>
      @if($errors->any())
      <div class="alert alert-danger">
          @foreach($errors->all() as $error)
            <ul>
                <li>{{$error}}</li>
            </ul>
          @endforeach
      </div>
      @endif

    <form action="/roles" method="POST" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="form-group">
            <label class="label-control" for="name">Role</label>
            <input type="text" name="name" id="role_name" class="form-control" placeholder="role name..."/>
        </div>
        <div class="form-group">
            <label class="label-control" for="slug">Slug</label>
            <input type="text" id="role_slug" name="slug" class="form-control" placeholder="slug name..."/>
        </div>
        <div class="form-group mb-3">
            <label class="label-control" for="permission">Add permission</label>
            <input type="text" name="permission" class="form-control" placeholder="permission name..."/>
        </div>
        <div class="form-group">
            <input type="submit" value="Create" class="btn btn-primary"/>
        </div>
    </form>
  </div>
  @section('js_role_page')
    <script>
        $(document).ready(function() {
            $('#role_name').keyup(function(e) {
          var str= $('#role_name').val();
          str = str.replace(/\w+(?!$)/g, '-').toLowerCase();
          $('#role_slug').val(str);
          $('role_slug').attr('placeholder',str);

        });
      });
    </script>

  @endsection

@endsection
