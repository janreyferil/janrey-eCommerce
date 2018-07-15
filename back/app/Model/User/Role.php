<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

use Keygen\Keygen;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = [
        'name'
    ];

    public function users() {
        return $this->belongsToMany(User::class);
    }
}
