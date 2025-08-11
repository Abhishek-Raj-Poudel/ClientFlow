<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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


    protected static function booted()
    {
        static::creating(function ($company) {
            $baseSlug = Str::slug($company->name);
            $i = 1;

            while (Company::where('slug', $baseSlug)->exists()) {
                $baseSlug = $baseSlug . '-' . $i;
                $i++;
            }

            $company->slug = $baseSlug;
        });
    }


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
