<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $table= 'deposits';

    protected $fillable= ['amount','user_id'];
    use HasFactory;
}
