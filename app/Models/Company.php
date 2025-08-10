<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'country',
        'zip',
    ];



    // Ownership: one company owns many users via users.company_id (foreign key)
    public function ownerUsers()
    {
        return $this->hasMany(User::class, 'company_id');
    }

    // Memberships: many-to-many via pivot table 'company_user'
    public function memberUsers()
    {
        return $this->belongsToMany(User::class, 'company_user');
    }
}
