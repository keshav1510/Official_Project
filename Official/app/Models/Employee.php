<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Employee extends Model
{
    use HasFactory;
    use HasApiTokens, HasFactory;
    protected $table="Officials";
    protected $fillable=['Name','Mobile','Password','Designation','UserName'];
   
}
