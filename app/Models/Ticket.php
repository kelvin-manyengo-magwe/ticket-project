<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Department;
use App\Models\Subdepartment;

class Ticket extends Model
{
    use HasFactory;

    protected $guarded = [];  //for the mass assignment

    protected $table = 'tickets';

    protected $primaryKey= 'id';

    protected $fillable= [
      'reporter_name','location','mobile_no','priority','problem','user_id','department_id','sub_department_id','comments','due_date','ticket_image'
    ];

    //the relationships
    public function user() {
      return $this->belongsTo(User::class, 'user_id');
    }
    public function department() {
      return $this->belongsTo(Department::class, 'department_id');
    }
    public function subdepartment() {
      return $this->belongsTo(Subdepartment::class, 'sub_department_id');
    }
}
