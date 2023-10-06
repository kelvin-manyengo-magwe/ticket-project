<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\Role;

class Permission extends Model
{
    use HasFactory;

    protected $table= 'permissions';

    protected $fillable= ['name','guard_name'];

  /*  public function roles() {

      return $this->belongsToMany(Role::class, 'role_permissions');
    } */
}
