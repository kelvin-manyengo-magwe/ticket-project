<?php
namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Subdepartment;
use App\Models\Department;
use App\Models\Ticket;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
     protected $table= 'users';

    protected $fillable = [
        'name','email','password','department_id','sub_department_id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function subdepartment() {
      return $this->belongsTo(Subdepartment::class, 'sub_department_id');
    }

    public function department() {
      return $this->belongsTo(Department::class, 'department_id');
    }

    public function tickets() {
      return $this->hasMany(Ticket::class);
    }

}
