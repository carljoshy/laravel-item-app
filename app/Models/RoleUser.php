<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'role_user';

    protected $guarded = [];

    use HasFactory;
}
