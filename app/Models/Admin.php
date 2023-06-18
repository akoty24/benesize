<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasFactory, HasRoles;
    protected $guarded = [];
    protected $hidden = ['password', 'remember_token'];

    protected $guard = "admin";

    // Specify the table name explicitly if it's different from the default convention
    protected $table = 'admins';
}
