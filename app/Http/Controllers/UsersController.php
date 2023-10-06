<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id','asc')->get();
        $roles= Role::all();

       return view('users.index', ['users' => $users, 'roles'=>$roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $permissions = Permission::all();
        return view('users.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //make the variable for store of model data
          $request->validate([  //for server side validation
            'name'=> 'required|max:255',
             'email'=> 'required|unique:users|email|max:255',
             'password'=> 'required|between:8,255|confirmed',
             'password_confirmation'=> 'required'
          ]);

        $user = new User;

        $user->name= $request->name;
        $user->email= $request->email;

        if($request->password != null) {
          $user->password= Hash::make($request->password);
        }
         
        $user->save();

        $user->syncPermissions($request->permissions);

      //  $User= User::findOrFail($userId);

        $selectedRole= $request->input('role');//get the selected role
        //$permission= $request->input('permissions'); get the selected permissison


          //$role= Role::findByName($selectedRole);
          $user->assignRole($selectedRole);


        return redirect('/users');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $permissions= Permission::all();
        $roles= Role::all();

        return view('users.show', ['user'=> $user, 'permissions' => $permissions, 'roles'=>$roles]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $permissions = Permission::all();
        //return view('users.edit', ['user'=> $user]);
        return view('users.edit', compact(['user','permissions']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;

        if($request->password != null) {
          $user->password = Hash::make($request->password);
        }

      //  dd($request->password);
      $user->save() ;

      $user->syncPermissions($request->permissions);

      return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        //when deleted it will revoke permissions to the user
        $user->revokePermissionsTo($user->permissions);
        return redirect('/users');
    }
}
