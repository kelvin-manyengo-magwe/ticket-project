@extends('layouts.app')
  @section('content')
<style>

</style>

  <div class="row justify-content-center" style="margin-left: 20%;">
      <div class="col">
        <div class="row mb-5 pt-4">
          <div class="col"><h2>List of all users</h2></div>
          <div class="col">
            @can('create-user')
            <a href="/users/create" class="btn btn-small btn-success" style="float: right;" role="button">Create users <i class="bi bi-person-plus-fill"></i></a>
            @endcan
          </div>
        </div>

          <table class="table table-bordered">
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Email</th>
              <th>Created at</th>
              <th>Roles</th>
              <th style="width: 300px;">Permissions</th>
              <th style="width: 100px;">Tools</th>
            </tr>
            @foreach ($users as $user)
            <tr>
                <td>{{$user['id']}}</td>
                <td>{{$user['name']}}</td>
                <td>{{$user['email']}}</td>
                <td>{{$user->created_at}}<br/>({{$user->created_at->diffForHumans()}})</td>
                <td>
                    @foreach($roles as $role)
                      <span class="text-sm bg-warning badge">{{$role->name}}</span>
                    @endforeach
                </td>
                <td>
                    @foreach($user->getDirectPermissions() as $permission)
                      <span class="badge text-sm bg-info text-dark">{{  $permission->name }}</span>
                    @endforeach
                </td>
                <td>
                    @can('show-user')
                      <a href="/users/{{ $user['id'] }}"><i class="bi bi-eye"></i></a>&nbsp&nbsp&nbsp
                    @endcan
                    @can('edit-user')
                    <a href="/users/{{ $user['id'] }}/edit"><i class="bi bi-pencil-square"></i></a>
                    @endcan

                    @can('delete-user')
                    <form id="delete-form" action="{{ route('users.destroy', $user->id)}}" method="POST">
                  <!--  <form action="/users/{{ $user->id }}" method="post">-->
                      @method('DELETE')
                      @csrf

                      <button type="submit" style="background: none; border-width: 0px;" name="_method" onclick="event.preventDefault(); document.getElementById('delete-form').submit(); confirm('Do you wanna delete {{Auth::user()->name}} ?')"><i class="bi bi-trash"></i></button>

                  </form>
                  @endcan
                </td>
            </tr>
            @endforeach
          </table>

        <script>
        function deleteUser($user->id) {
          // Display a confirmation dialog to the user
          const confirmation = confirm('Are you sure you want to delete this user?');

          if (confirmation) {
            // User confirmed, send a POST request to delete the user
            fetch(`/users/${}`, {
              method: 'POST',
              headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}', // Include Laravel CSRF token
              },
              body: JSON.stringify({
                _method: 'DELETE', // Use the DELETE method override
                _token: '{{ csrf_token() }}', // Include Laravel CSRF token again
              }),
            })
              .then((response) => {
                if (response.ok) {
                  // User was deleted successfully, you can perform further actions here
                  alert('User deleted successfully');
                  window.location.reload(); // Reload the page or navigate to another page
                } else {
                  // Handle errors here, e.g., display an error message
                  alert('Failed to delete user');
                }
              })
              .catch((error) => {
                // Handle network errors here
                console.error('Network error:', error);
              });
          }
        }
      </script>
      </div>
  </div>

@endsection
