<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;

class Subdepartment extends Model
{
    use HasFactory;

    protected $guarded= []; //mass assignment
    protected $table= 'sub_departments';

    protected $fillable= ['name','department_id'];

    public function department() {
      return $this->belongsTo(Department::class, 'department_id');
    }
}
