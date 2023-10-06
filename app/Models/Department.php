<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subdepartment;

class Department extends Model
{
    use HasFactory;

    protected $guarded= []; //mass assignment
    protected $table= 'departments';

    protected $primaryKey= 'id';
    protected $fillable= ['name'];

    public function subdepartment() {
      return $this->hasMany(Subdepartment::class);
    }
}
