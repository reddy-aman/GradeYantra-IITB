<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed', // Automatically hashes the password on save
    ];

    // Method to assign one or multiple roles
    public function assignUserRole($roles)
    {
        // Assign one or multiple roles to the user using Spatie's built-in assignRole method
        $this->assignRole($roles);
    }

    // Check if the user has a specific role
    public function hasRole(string $role): bool
    {
        return $this->roles()->where('name', $role)->exists();
    }

    // Define additional attributes or methods if needed
}
